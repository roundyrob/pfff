
type ('a, 'b) transformer = 
  'a -> 'b -> 
  Metavars_php.metavars_binding list

val transform_e_e :
  Ast_php.expr -> Ast_php.expr -> Metavars_php.metavars_binding -> unit

(* 
val match_e_e : (Ast_php.expr, Ast_php.expr) matcher
val match_v_v : (Ast_php.lvalue, Ast_php.lvalue) matcher 
*)

