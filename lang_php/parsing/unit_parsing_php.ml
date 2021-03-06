open Common

open Ast_php
module Ast = Ast_php

open OUnit

module Flag = Flag_parsing_php

(*****************************************************************************)
(* Unit tests *)
(*****************************************************************************)

let assert_no_parser_error ast = 
  assert_bool "bad: have a NotParsedCorrectly" 
    (List.for_all (function NotParsedCorrectly _ -> false | _ -> true) ast);
  ()

let unittest =
  "parsing_php" >::: [

    (* The PHP parser does not return an exception when a PHP file contains
     * an error, to allow some form of error recovery by not stopping 
     * at the first mistake. Instead it returns a NotParsedCorrectly 
     * AST toplevel element for parts of the code that were not parsed.
     * Here we check that correctly formed code do not contain such 
     * NotParsedCorrectly element.
     *)
    "parsing regular code" >:: (fun () ->
      let ast = Parse_php.program_of_string "echo 1+2;" in
      assert_no_parser_error ast;
    );

    (* Check that bad code contain a NotParsedCorrectly element. *)
    "rejecting bad code" >:: (fun () ->
      Flag_parsing_php.show_parsing_error := false;
      let ast = Parse_php.program_of_string "echo 1+" in
      assert_bool "bad: should have a NotParsedCorrectly" 
        (List.exists (function NotParsedCorrectly _ -> true | _ -> false) ast)
    );

    (* The PHP parser now understand PHP code containing XHP elements.
     * In the past pfff would call a preprocessor before parsing a file. By
     * setting this preprocessor to "xhpize", the XHP command line 
     * preprocessor, we could then parse the regular preprocessed code.
     * Now pfff can directly parse XHP code.
     *)
    "parsing xhp code" >:: (fun () ->
      (* old: Flag_parsing_php.pp_default := Some "xhpize"; *)

      let ast = Parse_php.program_of_string "return <x:frag />;"  in
      assert_no_parser_error ast;

      let ast = Parse_php.program_of_string "return $this->foo()[2];"  in
      assert_no_parser_error ast;
    );


    (* XHP is mainly a preprocessor to allow embbeding HTML-like tags in
     * PHP. It also fixes some limitations of the original PHP grammar 
     * regarding array access. You can do foo()['fld'] in XHP, which is 
     * not allowed in PHP (for stupid reasons IMHO).
     * The pfff PHP parser does not handle XHP tags but can handle 
     * this syntactic sugar at least.
     *)
    "parsing xhp fn_idx sugar code" >:: (fun () ->

      let ast = Parse_php.program_of_string "return foo()[2];"  in
      assert_no_parser_error ast;

      (* If the rule is added in the wrong place in the grammar, then
       * the previous test will work but not this one.
       *)
      let _ast = Parse_php.program_of_string "return $this->foo()[2];"  in
      OUnit.skip_if true "grammar extension for XHP incomplete";
      (*assert_no_parser_error ast;*)
    );

    (* Check that the visitor implementation correctly visit all AST 
     * subelements, even when they are deep inside the AST tree (e.g. 
     * sub-sub expressions inside parenthesis).
     *)
    "visitor" >:: (fun () ->
      let ast = Parse_php.program_of_string "echo 1+2+(3+4);" in

      let cnt = ref 0 in
      (* This is very tricky. See docs/manual/Parsing_php.pdf section 
       * 2.1.2 for a tutorial on visitors in OCaml. *)
      let hooks = { Visitor_php.default_visitor with
        Visitor_php.kexpr = (fun (k, _) e ->
          match Ast.untype e with
          | Sc _ -> incr cnt
          | _ -> k e
        )
      }
      in
      let visitor = Visitor_php.mk_visitor hooks in
      visitor (Program ast);
      assert_equal 4 !cnt ;
    );

    "checking column numbers" >:: (fun () ->
      
      (* See bug reported by dreiss, because the lexer had a few todos
       * regarding objects. *)
      let e = Parse_php.expr_of_string "$o->foo" in
      match Ast.untype e with
      | Lv v ->
          (match Ast.untype v with
          | ObjAccessSimple (v, tok, name) ->
              let info = Ast.info_of_name name in
              assert_equal 4 (Ast.col_of_info info)
          | _ -> 
              assert_failure "not good AST"
          )
      | _ ->
          assert_failure "not good AST"
    );

    "parsing sgrep expressions" >:: (fun () ->
      
      let e = Parse_php.expr_of_string "debug_rlog(1)" in
      assert_bool "should not generate an error" true;
      let e = Parse_php.expr_of_string "debug_rlog(X)" in
      assert_bool "should not generate an error" true;
      let e = Parse_php.expr_of_string "debug_rlog(X, 0)" in
      assert_bool "should not generate an error" true;

      (try 
        let e = 
          Common.save_excursion Flag.show_parsing_error false (fun () ->
            Parse_php.expr_of_string "debug_rlog(X, 0" 
          ) 
        in
        assert_failure "should generate an error"
      with exn ->
        ()
      );
        

    );


  (* todo: 
   *  - unparser is identity when do no modif
   *  - ? sexp and json output
   *  - ? correctness of Ast (too many cases)
   *)

  ]

(*****************************************************************************)
(* Main entry for Arg *)
(*****************************************************************************)
let actions () = [
    "-unittest_parsing", "   ", 
    Common.mk_action_0_arg (fun () -> OUnit.run_test_tt unittest |> ignore);
]
