<?php
function fb_set_opcode(Int32 $opcode, String $callback) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_reset_opcode(Int32 $opcode) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_thrift_serialize(Variant $thing) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_thrift_unserialize(String $thing, Boolean &$success) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_config_coredump(Boolean $enabled, Int32 $limit) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_debug_rlog(Variant $err, Int32 $include_flags = -1, Int32 $type = -1, Variant $headers = null_variant) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_backtrace(Variant $exception = null_variant) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_render_wrapped(String $text, Int32 $linelen = 26, String $head = "<span>", String $tail = "</span><wbr></wbr><span class=\"word_break\"></span>") {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_add_included_file(String $filepath) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_request_timers() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_get_ape_version() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_rename_function(String $orig_func_name, String $new_func_name) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_utf8ize(String &$input) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_call_user_func_safe(Variant $function) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
 $args = func_num_args(); // fake code to say variable #args
 
}

function fb_call_user_func_safe_return(Variant $function, Variant $def) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
 $args = func_num_args(); // fake code to say variable #args
 
}

function fb_call_user_func_array_safe(Variant $function, VariantVec $params) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_get_derived_classes(String $filename, String $basecls) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function hotprofiler_enable(Int32 $level) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function hotprofiler_disable() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function phprof_enable(Int32 $flags = 0) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function phprof_disable() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_load_local_databases(VariantMap $servers) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_parallel_query(VariantMap $sql_map, Int32 $max_thread = 50, Boolean $combine_result = true, Boolean $retry_query_on_fail = true, Int32 $connect_timeout = -1, Int32 $read_timeout = -1, Boolean $timeout_in_ms = false) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_crossall_query(String $sql, Int32 $max_thread = 50, Boolean $retry_query_on_fail = true, Int32 $connect_timeout = -1, Int32 $read_timeout = -1, Boolean $timeout_in_ms = false) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fql_set_static_data_10(StringVec $tables, VariantMap $functions) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fql_static_data_set_10() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fql_parse_10(String $query) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fql_multiparse_10(StringMap $query) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_start_mcproxy(String $conf_server, String $conf_key) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function fb_run_mcproxy() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

