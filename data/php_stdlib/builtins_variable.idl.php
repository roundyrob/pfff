<?php
/*
 * Purpose:    Finds out whether a variable is a boolean
 * Example:   
 *   <?php
 *   $a = false;
 *   $b = 0;
 *   
 *   // Since $a is a boolean, it will return true
 *   if (is_bool($a) === true) {
 *       echo "Yes, this is a boolean";
 *   }
 *   
 *   // Since $b is not a boolean, it will return false
 *   if (is_bool($b) === false) {
 *       echo "No, this is not a boolean";
 *   }
 *   ?>
 * 
 * Output: 
 */
function is_bool(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Find whether the type of a variable is integer
 * Example:   
 *   <?php
 *   if (is_int(23)) {
 *       echo "is integer\n";
 *   } else {
 *       echo "is not an integer\n";
 *   }
 *   var_dump(is_int(23));
 *   var_dump(is_int("23"));
 *   var_dump(is_int(23.5));
 *   var_dump(is_int(true));
 *   ?>
 * 
 * Output:   
 *   is integer
 *   bool(true)
 *   bool(false)
 *   bool(false)
 *   bool(false)
 */
function is_int(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: &Alias;  <function>is_int</function>
 * Example: 
 * 
 * Output: 
 */
function is_integer(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: &Alias;  <function>is_int</function>
 * Example: 
 * 
 * Output: 
 */
function is_long(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: &Alias;  <function>is_float</function>
 * Example: 
 * 
 * Output: 
 */
function is_double(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Finds whether the type of a variable is float
 * Example:   
 *   <?php
 *   if (is_float(27.25)) {
 *       echo "is float\n";
 *   } else {
 *       echo "is not float\n";
 *   }
 *   var_dump(is_float('abc'));
 *   var_dump(is_float(23));
 *   var_dump(is_float(23.5));
 *   var_dump(is_float(1e7));  //Scientific Notation
 *   var_dump(is_float(true));
 *   ?>
 * 
 * Output:   
 *   is float
 *   bool(false)
 *   bool(false)
 *   bool(true)
 *   bool(true)
 *   bool(false)
 */
function is_float(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Finds whether a variable is a number or a numeric string
 * Example:   
 *   <?php
 *   $tests = array(
 *           "42", 
 *           1337, 
 *           "1e4", 
 *           "not numeric", 
 *           Array(), 
 *           9.1
 *           );
 *   
 *   foreach ($tests as $element) {
 *       if (is_numeric($element)) {
 *           echo "'{$element}' is numeric", PHP_EOL;
 *       } else {
 *           echo "'{$element}' is NOT numeric", PHP_EOL;
 *       }
 *   }
 *   ?>
 * 
 * Output:   
 *   '42' is numeric
 *   '1337' is numeric
 *   '1e4' is numeric
 *   'not numeric' is NOT numeric
 *   'Array' is NOT numeric
 *   '9.1' is numeric
 */
function is_numeric(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: &Alias;  <function>is_float</function>
 * Example: 
 * 
 * Output: 
 */
function is_real(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Find whether the type of a variable is string
 * Example:   
 *   <?php
 *   if (is_string("23")) {
 *       echo "is string\n";
 *   } else {
 *       echo "is not an string\n";
 *   }
 *   var_dump(is_string('abc'));
 *   var_dump(is_string("23"));
 *   var_dump(is_string(23.5));
 *   var_dump(is_string(true));
 *   ?>
 * 
 * Output:   
 *   is string
 *   bool(true)
 *   bool(true)
 *   bool(false)
 *   bool(false)
 */
function is_string(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Finds whether a variable is a scalar
 * Example:   
 *   <?php
 *   function show_var($var) 
 *   {
 *       if (is_scalar($var)) {
 *           echo $var;
 *       } else {
 *           var_dump($var);
 *       }
 *   }
 *   $pi = 3.1416;
 *   $proteins = array("hemoglobin", "cytochrome c oxidase", "ferredoxin");
 *   
 *   show_var($pi);
 *   show_var($proteins)
 *   
 *   ?>
 * 
 * Output:   
 *   3.1416
 *   array(3) {
 *     [0]=>
 *     string(10) "hemoglobin"
 *     [1]=>
 *     string(20) "cytochrome c oxidase"
 *     [2]=>
 *     string(10) "ferredoxin"
 *   }
 */
function is_scalar(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Finds whether a variable is an array
 * Example:   
 *   <?php
 *   $yes = array('this', 'is', 'an array');
 *   
 *   echo is_array($yes) ? 'Array' : 'not an Array';
 *   echo "\n";
 *   
 *   $no = 'this is a string';
 *   
 *   echo is_array($no) ? 'Array' : 'not an Array';
 *   ?>
 * 
 * Output:   
 *   Array
 *   not an Array
 */
function is_array(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Finds whether a variable is an object
 * Example:   
 *   <?php
 *   // Declare a simple function to return an 
 *   // array from our object
 *   function get_students($obj)
 *   {
 *       if (!is_object($obj)) {
 *           return false;
 *       }
 *   
 *       return $obj->students;
 *   }
 *   
 *   // Declare a new class instance and fill up 
 *   // some values
 *   $obj = new stdClass();
 *   $obj->students = array('Kalle', 'Ross', 'Felipe');
 *   
 *   var_dump(get_students(null));
 *   var_dump(get_students($obj));
 *   ?>
 * 
 * Output: 
 */
function is_object(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Finds whether a variable is a resource
 * Example:   
 *   <?php
 *   
 *   $db_link = @mysql_connect('localhost', 'mysql_user', 'mysql_pass');
 *   if (!is_resource($db_link)) {
 *       die('Can\'t connect : ' . mysql_error());
 *   }
 *   
 *   ?>
 * 
 * Output: 
 */
function is_resource(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Finds whether a variable is &null;
 * Example:   
 *   <?php
 *   
 *   error_reporting(E_ALL);
 *   
 *   $foo = NULL;
 *   var_dump(is_null($inexistent), is_null($foo));
 *   
 *   ?>
 * 
 * Output:   
 *   Notice: Undefined variable: inexistent in ...
 *   bool(true)
 *   bool(true)
 */
function is_null(Any $var) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Get the type of a variable
 * Example:   
 *   <?php
 *   
 *   $data = array(1, 1., NULL, new stdClass, 'foo');
 *   
 *   foreach ($data as $value) {
 *       echo gettype($value), "\n";
 *   }
 *   
 *   ?>
 * 
 * Output:   
 *   integer
 *   double
 *   NULL
 *   object
 *   string
 */
function gettype(Any $v) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Returns the resource type
 * Example:   
 *   <?php
 *   // prints: mysql link
 *   $c = mysql_connect();
 *   echo get_resource_type($c) . "\n";
 *   
 *   // prints: file
 *   $fp = fopen("foo", "w");
 *   echo get_resource_type($fp) . "\n";
 *   
 *   // prints: domxml document
 *   $doc = new_xmldoc("1.0");
 *   echo get_resource_type($doc->doc) . "\n";
 *   ?>
 * 
 * Output: 
 */
function get_resource_type(Resource $handle) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Get the integer value of a variable
 * Example:   
 *   <?php
 *   echo intval(42);                      // 42
 *   echo intval(4.2);                     // 4
 *   echo intval('42');                    // 42
 *   echo intval('+42');                   // 42
 *   echo intval('-42');                   // -42
 *   echo intval(042);                     // 34
 *   echo intval('042');                   // 42
 *   echo intval(1e10);                    // 1410065408
 *   echo intval('1e10');                  // 1
 *   echo intval(0x1A);                    // 26
 *   echo intval(42000000);                // 42000000
 *   echo intval(420000000000000000000);   // 0
 *   echo intval('420000000000000000000'); // 2147483647
 *   echo intval(42, 8);                   // 42
 *   echo intval('42', 8);                 // 34
 *   echo intval(array());                 // 0
 *   echo intval(array('foo', 'bar'));     // 1
 *   ?>
 * 
 * Output: 
 */
function intval(Any $v, Int64 $base = 10) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: &Alias;  <function>floatval</function>
 * Example: 
 * 
 * Output: 
 */
function doubleval(Any $v) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Get float value of a variable
 * Example:   
 *   <?php
 *   $var = '122.34343The';
 *   $float_value_of_var = floatval($var);
 *   echo $float_value_of_var; // 122.34343
 *   ?>
 * 
 * Output: 
 */
function floatval(Any $v) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Get string value of a variable
 * Example:   
 *   <?php
 *   class StrValTest
 *   {
 *       public function __toString()
 *       {
 *           return __CLASS__;
 *       }
 *   }
 *   
 *   // Prints 'StrValTest'
 *   echo strval(new StrValTest);
 *   ?>
 * 
 * Output: 
 */
function strval(Any $v) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Set the type of a variable
 * Example:   
 *   <?php
 *   $foo = "5bar"; // string
 *   $bar = true;   // boolean
 *   
 *   settype($foo, "integer"); // $foo is now 5   (integer)
 *   settype($bar, "string");  // $bar is now "1" (string)
 *   ?>
 * 
 * Output: 
 */
function settype(Variant &$var, String $type) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Prints human-readable information about a variable
 * Example:   
 *   <pre>
 *   <?php
 *   $a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x', 'y', 'z'));
 *   print_r ($a);
 *   ?>
 *   </pre>
 * 
 * Output:   
 *   <pre>
 *   Array
 *   (
 *       [a] => apple
 *       [b] => banana
 *       [c] => Array
 *           (
 *               [0] => x
 *               [1] => y
 *               [2] => z
 *           )
 *   )
 *   </pre>
 */
function print_r(Any $expression, Boolean $ret = false) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Outputs or returns a parsable string representation of a variable
 * Example:   
 *   <?php
 *   $a = array (1, 2, array ("a", "b", "c"));
 *   var_export($a);
 *   ?>
 * 
 * Output:   
 *   array (
 *     0 => 1,
 *     1 => 2,
 *     2 => 
 *     array (
 *       0 => 'a',
 *       1 => 'b',
 *       2 => 'c',
 *     ),
 *   )
 */
function var_export(Any $expression, Boolean $ret = false) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Dumps information about a variable
 * Example:   
 *   <?php
 *   $a = array(1, 2, array("a", "b", "c"));
 *   var_dump($a);
 *   ?>
 * 
 * Output:   
 *   array(3) {
 *     [0]=>
 *     int(1)
 *     [1]=>
 *     int(2)
 *     [2]=>
 *     array(3) {
 *       [0]=>
 *       string(1) "a"
 *       [1]=>
 *       string(1) "b"
 *       [2]=>
 *       string(1) "c"
 *     }
 *   }
 */
function var_dump(Any $expression) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
 $args = func_num_args(); // fake code to say variable #args
 
}

/*
 * Purpose: Dumps a string representation of an internal zend value to output
 * Example:   
 *   <?php
 *   $var1 = 'Hello World';
 *   $var2 = '';
 *   
 *   $var2 =& $var1;
 *   
 *   debug_zval_dump(&$var1);
 *   ?>
 * 
 * Output:   
 *   &string(11) "Hello World" refcount(3)
 */
function debug_zval_dump(Any $variable) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Generates a storable representation of a value
 * Example:   
 *   <?php
 *   // $session_data contains a multi-dimensional array with session
 *   // information for the current user.  We use serialize() to store
 *   // it in a database at the end of the request.
 *   
 *   $conn = odbc_connect("webdb", "php", "chicken");
 *   $stmt = odbc_prepare($conn,
 *         "UPDATE sessions SET data = ? WHERE id = ?");
 *   $sqldata = array (serialize($session_data), $_SERVER['PHP_AUTH_USER']);
 *   if (!odbc_execute($stmt, $sqldata)) {
 *       $stmt = odbc_prepare($conn,
 *        "INSERT INTO sessions (id, data) VALUES(?, ?)");
 *       if (!odbc_execute($stmt, $sqldata)) {
 *           /* Something went wrong..  * / 
 *       }
 *   }
 *   ?>
 * 
 * Output: 
 */
function serialize(Any $value) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Creates a PHP value from a stored representation
 * Example:   
 *   <?php
 *   // Here, we use unserialize() to load session data to the
 *   // $session_data array from the string selected from a database.
 *   // This example complements the one described with serialize().
 *   
 *   $conn = odbc_connect("webdb", "php", "chicken");
 *   $stmt = odbc_prepare($conn, "SELECT data FROM sessions WHERE id = ?");
 *   $sqldata = array($_SERVER['PHP_AUTH_USER']);
 *   if (!odbc_execute($stmt, $sqldata) || !odbc_fetch_into($stmt, $tmp)) {
 *       // if the execute or fetch fails, initialize to empty array
 *       $session_data = array();
 *   } else {
 *       // we should now have the serialized data in $tmp[0].
 *       $session_data = unserialize($tmp[0]);
 *       if (!is_array($session_data)) {
 *           // something went wrong, initialize to empty array
 *           $session_data = array();
 *       }
 *   }
 *   ?>
 * 
 * Output: 
 */
function unserialize(String $str) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Returns an array of all defined variables
 * Example:   
 *   <?php
 *   $b = array(1, 1, 2, 3, 5, 8);
 *   
 *   $arr = get_defined_vars();
 *   
 *   // print $b
 *   print_r($arr["b"]);
 *   
 *   /* print path to the PHP interpreter (if used as a CGI)
 *    * e.g. /usr/local/bin/php  * / 
 *   echo $arr["_"];
 *   
 *   // print the command-line parameters if any
 *   print_r($arr["argv"]);
 *   
 *   // print all the server vars
 *   print_r($arr["_SERVER"]);
 *   
 *   // print all the available keys for the arrays of variables
 *   print_r(array_keys(get_defined_vars()));
 *   ?>
 * 
 * Output: 
 */
function get_defined_vars() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Import GET/POST/Cookie variables into the global scope
 * Example:   
 *   <?php
 *   // This will import GET and POST vars
 *   // with an "rvar_" prefix
 *   import_request_variables("gp", "rvar_");
 *   
 *   echo $rvar_foo;
 *   ?>
 * 
 * Output: 
 */
function import_request_variables(String $types, String $prefix = "") {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Import variables into the current symbol table from an array
 * Example:   
 *   <?php
 *   
 *   /* Suppose that $var_array is an array returned from
 *      wddx_deserialize  * / 
 *   
 *   $size = "large";
 *   $var_array = array("color" => "blue",
 *                      "size"  => "medium",
 *                      "shape" => "sphere");
 *   extract($var_array, EXTR_PREFIX_SAME, "wddx");
 *   
 *   echo "$color, $size, $shape, $wddx_size\n";
 *   
 *   ?>
 * 
 * Output:   
 *   blue, large, sphere, medium
 */
function extract(VariantMap $var_array, Int32 $extract_type = EXTR_OVERWRITE, String $prefix = "") {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

