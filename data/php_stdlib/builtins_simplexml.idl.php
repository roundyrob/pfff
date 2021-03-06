<?php
function simplexml_load_string(String $data, String $class_name = "SimpleXMLElement", Int64 $options = 0, String $ns = "", Boolean $is_prefix = false) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function simplexml_load_file(String $filename, String $class_name = "SimpleXMLElement", Int64 $options = 0, String $ns = "", Boolean $is_prefix = false) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Retrieve array of errors
 * Example:   
 *   <?php
 *   
 *   libxml_use_internal_errors(true);
 *   
 *   $xmlstr = <<< XML
 *   <?xml version='1.0' standalone='yes'?>
 *   <movies>
 *    <movie>
 *     <titles>PHP: Behind the Parser</title>
 *    </movie>
 *   </movies>
 *   XML;
 *   
 *   $doc = simplexml_load_string($xmlstr);
 *   $xml = explode("\n", $xmlstr);
 *   
 *   if (!$doc) {
 *       $errors = libxml_get_errors();
 *   
 *       foreach ($errors as $error) {
 *           echo display_xml_error($error, $xml);
 *       }
 *   
 *       libxml_clear_errors();
 *   }
 *   
 *   
 *   function display_xml_error($error, $xml)
 *   {
 *       $return  = $xml[$error->line - 1] . "\n";
 *       $return .= str_repeat('-', $error->column) . "^\n";
 *   
 *       switch ($error->level) {
 *           case LIBXML_ERR_WARNING:
 *               $return .= "Warning $error->code: ";
 *               break;
 *            case LIBXML_ERR_ERROR:
 *               $return .= "Error $error->code: ";
 *               break;
 *           case LIBXML_ERR_FATAL:
 *               $return .= "Fatal Error $error->code: ";
 *               break;
 *       }
 *   
 *       $return .= trim($error->message) .
 *                  "\n  Line: $error->line" .
 *                  "\n  Column: $error->column";
 *   
 *       if ($error->file) {
 *           $return .= "\n  File: $error->file";
 *       }
 *   
 *       return "$return\n\n--------------------------------------------\n\n";
 *   }
 *   
 *   ?>
 * 
 * Output:   
 *     <titles>PHP: Behind the Parser</title>
 *   ----------------------------------------------^
 *   Fatal Error 76: Opening and ending tag mismatch: titles line 4 and title
 *     Line: 4
 *     Column: 46
 *   
 *   --------------------------------------------
 */
function libxml_get_errors() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Retrieve last error from libxml
 * Example: 
 * 
 * Output: 
 */
function libxml_get_last_error() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Clear libxml error buffer
 * Example: 
 * 
 * Output: 
 */
function libxml_clear_errors() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Disable libxml errors and allow user to fetch error information as needed
 * Example:   
 *   <?php
 *   
 *   // enable user error handling
 *   var_dump(libxml_use_internal_errors(true));
 *   
 *   // load the document
 *   $doc = new DOMDocument;
 *   
 *   if (!$doc->load('file.xml')) {
 *       foreach (libxml_get_errors() as $error) {
 *           // handle errors here
 *       }
 *   
 *       libxml_clear_errors();
 *   }
 *   
 *   ?>
 * 
 * Output:   
 *   bool(false)
 */
function libxml_use_internal_errors(Variant $use_errors = null_variant) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Set the streams context for the next libxml document load or write
 * Example:   
 *   <?php
 *   
 *   $opts = array(
 *       'http' => array(
 *           'user_agent' => 'PHP libxml agent',
 *       )
 *   );
 *   
 *   $context = stream_context_create($opts);
 *   libxml_set_streams_context($context);
 *   
 *   // request a file through HTTP
 *   $doc = DOMDocument::load('http://www.example.com/file.xml');
 *   
 *   ?>
 * 
 * Output: 
 */
function libxml_set_streams_context(Resource $streams_context) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

