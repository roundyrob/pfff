(*s: test_analyze_php.ml *)
open Common

module Ast = Ast_php

module Db = Database_php
module Cg = Callgraph_php

module V = Visitor_php

(*****************************************************************************)
(* Helpers *)
(*****************************************************************************)
(*s: function ast_of_file *)
let ast_of_file file =
  Parse_php.parse_program file
(*e: function ast_of_file *)

(* The default way to analyze a set of PHP files is to first build
 * a database containing information about the code (stored internally
 * using Berkeley DB), e.g. with ./pfff_db ~/www -metapath /tmp/pfff_db,
 * and then run different analysis on this database, e.g. with
 * ./pfff_misc -deadcode_analysis /tmp/pfff_db.
 * In our testing code we want to test some of our analysis without
 * requiring to have a directory with a set of files, or some space on
 * disk to store the database. This small wrapper allows to build
 * a database in memory from a give set of files, usually temporary
 * files built with tmp_php_file_from_string() below.
 *)
let db_of_files_or_dirs files_or_dirs =

  (* prj is normally used in GUI to display files relative to a specific
   * project base. Here we want to analyze a set of adhoc files or multiple
   * dirs so there is no base so we use /
   *)
  let prj = Database_php.Project ("/", None) in

  let php_files =
    Lib_parsing_php.find_php_files_of_dir_or_files files_or_dirs
    |> List.map Common.relative_to_absolute
  in
  let db =
    Database_php_build.create_db
      ~db_support:Database_php.Mem
      ~files:(Some php_files)
      prj
  in
  db




(*****************************************************************************)
(* Subsystem testing, no db *)
(*****************************************************************************)

let test_type_php file =
  let asts = ast_of_file file in

  let env = ref (Hashtbl.create 101) in
  let asts = asts +> List.map (fun ast ->
      Typing_php.annotate_toplevel env ast
    )
  in

  Sexp_ast_php.show_expr_info := true;
  pr (Sexp_ast_php.string_of_program asts);
  ()

let test_typing_weak_php file =
  let asts = ast_of_file file in
  asts +> List.iter (fun ast ->
    let xs = Typing_weak_php.extract_fields_per_var ast in
    pr2_gen xs
  )

let test_check_php file =
  raise Todo

let test_scope_php file =
  let asts = ast_of_file file in

  Check_variables_php.check_and_annotate_program
    ~find_entity:None
    asts;

  Sexp_ast_php.show_expr_info := true;
  pr (Sexp_ast_php.string_of_program asts);
  ()


let test_idl_to_php file =
  let asts = ast_of_file file in
  let idl_entries =
    Builtins_php.ast_php_to_idl asts
  in
  idl_entries +> List.iter (fun idl ->
    let s = Builtins_php.idl_entry_to_php_fake_code idl in
    pr s
  )

let test_visit2_php file =
  let (ast2,_stat) = Parse_php.parse file in
  let ast = Parse_php.program_of_program2 ast2 in

  let v = Visitor2_php.mk_visitor { Visitor2_php.default_visitor with
    Visitor_php.klvalue = (fun (k, vx) e ->
      match fst e with
      | Ast_php.FunCallSimple (callname, args) ->
          let s = Ast_php.name callname in
          pr2 ("calling: " ^ s);

      | _ -> k e
    );
  } 
  in
  v.Visitor2_php.vorigin (Ast.Program ast)


let test_xdebug_dumpfile file =
  file +> Xdebug.iter_dumpfile (fun acall ->
    (* pr2 s *)
    ()
  )

let test_parse_phpunit_json file =

  let json = Json_in.load_json file in
  let tr = Phpunit.test_results_of_json json in
  Phpunit.final_report tr

let test_php_xdebug file =
  let trace_file = Common.new_temp_file "xdebug" ".xt" in
  let php = Xdebug.php_cmd_with_xdebug_on ~trace_file () in
  let cmd = spf "%s %s" php file in
  pr2 (spf "executing: %s" cmd);
  Common.command2 cmd;
  trace_file +> Xdebug.iter_dumpfile ~show_progress:false (fun call ->
    let caller = call.Xdebug.f_call in
    let str = Callgraph_php.s_of_kind_call caller in
    let file = call.Xdebug.f_file in
    let line = call.Xdebug.f_line in
    pr (spf "%s:%d: %s" file line str);
  )



let test_type_xdebug_php file =
  let (d,b,e) = Common.dbe_of_filename file in
  assert(e = "php");
  let trace_file = Common.filename_of_dbe (d,b,"xt") in
  (* todo? remove pre-existing trace file ? because xdebug by default appends *)
  pr2 (spf "xdebug trace file in %s" trace_file);
  let cmd = Xdebug.php_cmd_with_xdebug_on ~trace_file () in
  let cmd = spf "%s %s" cmd file in
  pr2 (spf "executing: %s" cmd);
  Common.command2 cmd;

  let h = Hashtbl.create 101 in

  trace_file +> Xdebug.iter_dumpfile ~show_progress:true (fun call ->
    (* quite close to Database_php_build.index_db_xdebug *)

    let caller = call.Xdebug.f_call in
    let params = call.Xdebug.f_params in
    let ret = call.Xdebug.f_return in

    let str = Callgraph_php.s_of_kind_call caller in

    let tparams =
      params +> List.map Typing_trivial_php.type_of_expr in
    let tret =
      match ret with
      | None -> [Type_php.Unknown]
      | Some e -> Typing_trivial_php.type_of_expr e
    in
    let ft = [Type_php.Function (tparams +> List.map(fun t -> Some t), tret)] in

    h +> Common.hupdate_default str
      ~update:(fun old -> Typing_trivial_php.union_type old ft)
      ~default:(fun () -> ft);
  );
  h +> Common.hash_to_list +> List.iter (fun (s, t) ->
    pr2 (spf "%s -> %s" s (Type_php.string_of_phptype t));
  );
  ()

let test_phpdoc dir =
  let files = Phpmanual_xml.find_functions_reference_of_dir dir in
  files +> List.iter (fun file ->
    let _func = Phpmanual_xml.function_name_of_xml_filename file in
    (* pr2 (spf "%s\n %s" func file); *)
    try
      let _xml = Phpmanual_xml.parse_xml file in
      ()
    with exn ->
      pr2 (spf "PB in %s" file);
  )

let test_php_serialize file =
  let s = Common.read_file file in
  let php = Php_serialize.parse_string s in
  let v = Php_serialize.vof_php php in
  let s = Ocaml.string_of_v v in
  pr2 s


(*s: test_cfg_php *)
let test_cfg_php file =
  let (ast2,_stat) = Parse_php.parse file in
  let ast = Parse_php.program_of_program2 ast2 in
  ast |> List.iter (function
  | Ast_php.FuncDef def ->
      (try
        let flow = Controlflow_build_php.cfg_of_func def in
        Controlflow_php.display_flow flow;
      with Controlflow_build_php.Error err ->
        Controlflow_build_php.report_error err
      )
  | _ -> ()
  )

(*e: test_cfg_php *)
(*s: test_cyclomatic_php *)
let test_cyclomatic_php file =
  let (ast2,_stat) = Parse_php.parse file in
  let ast = Parse_php.program_of_program2 ast2 in
  ast |> List.iter (function
  | Ast_php.FuncDef def ->
      let name = Ast_php.name def.Ast_php.f_name in
      let n = Cyclomatic_php.cyclomatic_complexity_func ~verbose:true def in
      pr2 (spf "cyclomatic complexity for function %s is %d" name n);
  | Ast_php.ClassDef def ->
      let class_stmts = Ast_php.unbrace def.Ast_php.c_body in
      let class_name = Ast_php.name def.Ast_php.c_name in
      class_stmts |> List.iter (function
      | Ast_php.Method def ->
          let method_name = Ast_php.name def.Ast_php.m_name in
          let n = Cyclomatic_php.cyclomatic_complexity_method ~verbose:true def
          in
          pr2 (spf "cyclomatic complexity for method %s::%s is %d"
                  class_name method_name n);
      | Ast_php.ClassConstants _ | Ast_php.ClassVariables _ ->
          ()
      | Ast_php.XhpDecl _ ->
          ()
      )
  | _ -> ()
  )
(*e: test_cyclomatic_php *)

(* todo: adapt to PIL *)
let test_dfg_php file =
  let (ast2,_stat) = Parse_php.parse file in
  let ast = Parse_php.program_of_program2 ast2 in
  ast |> List.iter (function
  | Ast_php.FuncDef def ->
      (try
        let flow = Controlflow_build_php.cfg_of_func def in
        let mapping = Dataflow_php_liveness.liveness_analysis flow in
        pr2_gen mapping
        (* Controlflow_php.display_flow flow; *)
      with Controlflow_build_php.Error err ->
        Controlflow_build_php.report_error err
      )
  | _ -> ()
  )

let test_pil file =
  let ast = Parse_php.parse_program file in

  (* let's transform and print every expression *)
  let hooks = { V.default_visitor with
    (* old:
    V.kexpr = (fun (k, vx) e ->
      let instrs = Pil_build.linearize_expr e in
      instrs +> List.iter (fun instr ->
        pr2 (Pil.string_of_instr instr);
      );
    );
    *)
    V.kstmt = (fun (k, vx) st ->
      let stmts = Pil_build.linearize_stmt st in
      stmts +> List.iter (fun st ->
        pr2 (Meta_pil.string_of_stmt st)
      )
    );
  } in
  let v = V.mk_visitor hooks in
  v (Ast.Program ast)

let test_pretty_print_pil file =
  let ast = Parse_php.parse_program file in
  let v = V.mk_visitor { V.default_visitor with
    V.kstmt = (fun (k, vx) st ->
      let stmts = Pil_build.linearize_stmt st in
      stmts +> List.iter (fun st ->
        pr2 (Pretty_print_pil.string_of_stmt st)
      )
    );
  } in
  v (Ast.Program ast)

let test_cfg_pil file =
  let ast = Parse_php.parse_program file in
  ast |> List.iter (function
  | Ast_php.FuncDef def ->
      (try
         let pil = Pil_build.linearize_body (Ast.unbrace def.Ast.f_body) in
         let flow = Controlflow_build_pil.cfg_of_stmts pil in
         Controlflow_pil.display_flow flow;
      with Controlflow_build_pil.Error err ->
        Controlflow_build_pil.report_error err
      )
  | _ -> ()
  )

let test_dataflow_pil file =
  let ast = Parse_php.parse_program file in
  ast |> List.iter (function
  | Ast_php.FuncDef def ->
      (try
         let pil = Pil_build.linearize_body (Ast.unbrace def.Ast.f_body) in
         let flow = Controlflow_build_pil.cfg_of_stmts pil in

         let reach = Dataflow_pil.reaching_fixpoint flow in
         let liveness = Dataflow_pil.liveness_fixpoint flow in
         pr "Reaching:";
         Dataflow_pil.display_reaching_dflow flow reach;
         pr "Liveness:";
         Dataflow_pil.display_liveness_dflow flow liveness

      with Controlflow_build_pil.Error err ->
        Controlflow_build_pil.report_error err
      )
  | _ -> ()
  )

(* collect all variables in a function using the PIL visitor *)
let test_visitor_pil file =

  let ast = Parse_php.parse_program file in
  ast +> List.iter (function
  | Ast_php.FuncDef def ->
      let pil = Pil_build.linearize_body (Ast.unbrace def.Ast.f_body) in
      let funcname = Ast_php.name def.Ast_php.f_name in

      let h = Hashtbl.create 101 in
      let visitor = Visitor_pil.mk_visitor { Visitor_pil.default_visitor with
        Visitor_pil.kvar = (fun (k, _) var ->
          match var with
          | Pil.Var dname ->
              let s = Ast_php.dname dname in
              Hashtbl.replace h s true
          | _ -> k var
        );
      }
      in
      visitor (Controlflow_pil.StmtList pil);
      let vars = Common.hashset_to_list h in
      pr2 (spf "vars in function %s = %s" funcname (Common.join ", " vars));
  | _ -> ()
  )

(*****************************************************************************)
(* Subsystem testing that requires a db *)
(*****************************************************************************)

let test_dependencies_php metapath =
  Database_php.with_db ~metapath (fun db ->
    Dependencies_php.dir_to_dir_dependencies db
  )

let test_function_pointer_analysis metapath =
  Database_php.with_db ~metapath (fun db ->

    (* move more code in aliasing_function_php.ml ? *)
    let h = Hashtbl.create 101 in

    Database_php_build.iter_files_and_topids db "FPOINTER" (fun id file ->
      let ast = db.Db.defs.Db.toplevels#assoc id in
      let funcvars = Lib_parsing_php.get_all_funcvars_any (Ast.Toplevel ast) in
      funcvars +> List.iter (fun dvar ->
        pr2 dvar;
        let prefixes =
          Aliasing_function_php.finding_function_pointer_prefix dvar ast in
        prefixes +> List.iter (fun s ->
          pr2(spf " '%s'" s);
          Hashtbl.replace h s true;
        );
      )
    );
    pr2 "dangerous prefixes:";
    h +> Common.hashset_to_list +> List.iter pr2;
  )



let test_deadcode_php files_or_dirs =
  (* create database of code information, used by our deadcode global
   * analysis below
   *)
  let db = db_of_files_or_dirs files_or_dirs in

  let hooks_deadcode = { Deadcode_php.default_hooks with
    Deadcode_php.print_diff = true;
  } in
  let dead =
    Deadcode_php.finding_dead_functions hooks_deadcode db
  in
  pr_xxxxxxxxxxxxxxxxx();
  pr "Dead functions:";
  pr_xxxxxxxxxxxxxxxxx();
  dead +> List.iter (fun (s, id) ->
    pr (spf "%s at %s" s (Database_php.str_of_id id db));
  );

  Deadcode_php.deadcode_analysis hooks_deadcode db

let test_callgraph_php files_or_dirs =

  let db = db_of_files_or_dirs files_or_dirs in

  (* converting the callgraph stored as two assocs in the db
   * into a ograph_mutable that can be displayed with gv.
   *)
  let g = new Ograph_simple.ograph_mutable in

  db.Db.fullid_of_id#iter (fun (id, fullid) ->
    let node = Db.name_of_id id db in
    g#add_node id node
  );

  db.Db.fullid_of_id#iter (fun (id, _) ->
    try
      let callsites = Db.callees_of_id id db in
      callsites |> List.iter (fun (Callgraph_php.CallSite (id2, kind_call)) ->
        g#add_arc (id, id2) ();
      )
    with
     (* class id have no callees *)
     _ -> ()
  );
  Ograph_simple.print_ograph_generic
    ~str_of_key:(fun id ->
      let (Entity_php.Id i) = id in
      i_to_s i
    )
    ~str_of_node:(fun id node -> node)
    "/tmp/test_callgraph.dot"
    g;
  ()


(* topological sort of strongly connected components *)
let test_topo_sorted_strongly_connected_callgraph_php files_or_dirs =

  let db = db_of_files_or_dirs files_or_dirs in
  let str_of_key id = Db.complete_name_of_id id db in

  (* converting the callgraph stored as two assocs in the db
   * into something algorithms in ocamlgraph/ can work on
   *)
  let g = Graph_php.build_simple_callgraph db in
  Graph_php.display_with_gv g db;

  let scc, hscc = Graph.strongly_connected_components g in
  Graph.display_strongly_connected_components ~str_of_key hscc g;

  ()


let test_track_function_result function_name file =
  let db = db_of_files_or_dirs [file] in
  pr2 (spf "Tracking %s in %s" function_name file);
  let usage = Dataflow_php_array.track_function_result function_name db in
  Dataflow_php_array.print_usage usage;
  ()

(*---------------------------------------------------------------------------*)
(* Code rank stuff *)
(*---------------------------------------------------------------------------*)
let test_caller_rank metapath =
  Database_php.with_db ~metapath (fun db ->
    let res = Code_rank_php.build_naive_caller_ranks db in
    let xs = res.Code_rank_php.function_ranks#tolist in
    let sorted = Common.sort_by_val_lowfirst xs in

    sorted +> List.iter (fun (id, v) ->
      let s = Db.name_of_id id db in
      pr2 (spf "%s : %f" s v);
    );

  )
let test_code_rank metapath =
  Database_php.with_db ~metapath (fun db ->

    let res = Code_rank_php.build_code_ranks db in
    let xs = res.Code_rank_php.function_ranks#tolist in
    let sorted = Common.sort_by_val_lowfirst xs in

    sorted +> List.iter (fun (id, v) ->
      let s = Db.name_of_id id db in
      pr2 (spf "%s : %f" s v);
    );

  )

(*---------------------------------------------------------------------------*)
(* Includers/includees *)
(*---------------------------------------------------------------------------*)
let test_includers_php metapath file _depth =
  Database_php.with_db ~metapath (fun db ->
    let file = Common.realpath file in
    let xs = Db.includers_rec_of_file file db in
    xs |> List.iter pr;
  )

let test_includees_php metapath file depth =
  Database_php.with_db ~metapath (fun db ->
    let file = Common.realpath file in
    (*
    let xs = Db.includees_rec_of_file file db in
      xs |> List.iter pr;
    *)
    let g = Db.includees_graph_of_file ~depth_limit:(Some depth) file db in
    Graph.print_graph_generic
      ~str_of_key:(fun file ->
        Db.absolute_to_readable_filename file db
      )
      "/tmp/ocamlgraph.dot"
      g;
  )

(* printing not static include *)
let test_include_require file =
  let ast = ast_of_file file in

  let increqs = Include_require_php.top_increq_of_program ast in
  increqs |> List.iter (fun (inckind, tok, incexpr) ->
    match incexpr with
    | Include_require_php.SimpleVar _
    | Include_require_php.Other _ ->
        Lib_parsing_php.print_match [tok]
    | _ -> ()
  );
  ()

(*---------------------------------------------------------------------------*)
(* Code highlighting *)
(*---------------------------------------------------------------------------*)
let generate_html_php file =
  let file = Common.realpath file in
  let nblines = Common.cat file |> List.length in

  let db = db_of_files_or_dirs [file] in
  let xs = Htmlize_php.htmlize_pre file db in
  let xs' = Common.index_list_1 xs in
  xs' +> List.iter (fun (s, i) ->
    pr2 (spf "%d: %s" i s);
  );

  let nblines2 = List.length xs in

  if nblines2 <> nblines
  then failwith (spf "The number of lines differs, orig = %d <> %d"
                    nblines nblines2);
  ()


(*****************************************************************************)
(* Main entry for Arg *)
(*****************************************************************************)

(* Note that other files in this directory define some cmdline actions:
 *  - database_php_build.ml
 *
 *)

let actions () = [
    "-test_pil",  " <file>",
    Common.mk_action_1_arg test_pil;
    "-test_pretty_print_pil", " <file>",
    Common.mk_action_1_arg test_pretty_print_pil;
    "-cfg_pil",  " <file>",
    Common.mk_action_1_arg test_cfg_pil;
    "-dataflow_pil", " <file",
    Common.mk_action_1_arg test_dataflow_pil;
    "-visitor_pil", " <file",
    Common.mk_action_1_arg test_visitor_pil;

  (*s: test_analyze_php actions *)
    "-cfg_php",  " <file>",
    Common.mk_action_1_arg test_cfg_php;
  (*x: test_analyze_php actions *)
    "-cyclomatic_php", " <file>",
    Common.mk_action_1_arg test_cyclomatic_php;
  (*e: test_analyze_php actions *)

  "-type_php", " <file>",
  Common.mk_action_1_arg test_type_php;

  "-check_php", " <file>",
  Common.mk_action_1_arg test_check_php;

  "-scope_php", " <file>",
  Common.mk_action_1_arg test_scope_php;

  "-visit2_php", "   <file>",
    Common.mk_action_1_arg test_visit2_php;

  "-weak_php", " <file>",
  Common.mk_action_1_arg test_typing_weak_php;
  "-php_xdebug", " <file>",
  Common.mk_action_1_arg test_php_xdebug;
  "-type_xdebug_php", " <file>",
  Common.mk_action_1_arg test_type_xdebug_php;

  (* todo: adapt to PIL *)
  "-dfg_php",  " <file>",
    Common.mk_action_1_arg test_dfg_php;

  "-idl_to_php", " <file>",
  Common.mk_action_1_arg test_idl_to_php;

  "-deadcode_php", " <files_or_dirs>",
  Common.mk_action_n_arg test_deadcode_php;

  "-callgraph_php", " <files_or_dirs>",
  Common.mk_action_n_arg test_callgraph_php;

  "-callgraph_topo_scc_php", " <files_or_dirs>",
  Common.mk_action_n_arg test_topo_sorted_strongly_connected_callgraph_php;


  "-test_track_function_result", " <function> <db>",
  Common.mk_action_2_arg (test_track_function_result);

  "-test_caller_rank", "<db>",
  Common.mk_action_1_arg (test_caller_rank);
  "-test_code_rank", "<db>",
  Common.mk_action_1_arg (test_code_rank);

  "-test_phpdoc", " <dir>",
  Common.mk_action_1_arg test_phpdoc;
  "-test_php_serialize", " <file>",
  Common.mk_action_1_arg test_php_serialize;

  "-dependencies_php", " <metapath>",
  Common.mk_action_1_arg test_dependencies_php;

  "-function_pointer_analysis", "<db>",
  Common.mk_action_1_arg (test_function_pointer_analysis);

  "-includers_php", "<db> <file> <depth>",
  Common.mk_action_3_arg (test_includers_php);
  "-includees_php", "<db> <file> <depth>",
  Common.mk_action_3_arg (fun db file depth ->
    test_includees_php db file (s_to_i depth));

  "-php_to_html", "<file>",
  Common.mk_action_1_arg (generate_html_php);

  "-parse_xdebug_dumpfile", " <dumpfile>",
  Common.mk_action_1_arg test_xdebug_dumpfile;

  "-parse_phpunit_json", " <jsonfile>",
  Common.mk_action_1_arg test_parse_phpunit_json;

  "-include_require_static", " <file>",
  Common.mk_action_1_arg test_include_require;
]

(*e: test_analyze_php.ml *)
