<?php
/*
 * Purpose: Returns an array of all defined functions
 * Example:   
 *   <?php
 *   function myrow($id, $data)
 *   {
 *       return "<tr><th>$id</th><td>$data</td></tr>\n";
 *   }
 *   
 *   $arr = get_defined_functions();
 *   
 *   print_r($arr);
 *   ?>
 * 
 * Output:   
 *   Array
 *   (
 *       [internal] => Array
 *           (
 *               [0] => zend_version
 *               [1] => func_num_args
 *               [2] => func_get_arg
 *               [3] => func_get_args
 *               [4] => strlen
 *               [5] => strcmp
 *               [6] => strncmp
 *               ...
 *               [750] => bcscale
 *               [751] => bccomp
 *           )
 *   
 *       [user] => Array
 *           (
 *               [0] => myrow
 *           )
 *   
 *   )
 */
function get_defined_functions() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Return &true; if the given function has been defined
 * Example:   
 *   <?php
 *   if (function_exists('imap_open')) {
 *       echo "IMAP functions are available.<br />\n";
 *   } else {
 *       echo "IMAP functions are not available.<br />\n";
 *   }
 *   ?>
 * 
 * Output: 
 */
function function_exists(String $function_name) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Verify that the contents of a variable can be called as a function
 * Example:   
 *   <?php
 *   //  How to check a variable to see if it can be called
 *   //  as a function.
 *   
 *   //
 *   //  Simple variable containing a function
 *   //
 *   
 *   function someFunction() 
 *   {
 *   }
 *   
 *   $functionVariable = 'someFunction';
 *   
 *   var_dump(is_callable($functionVariable, false, $callable_name));  // bool(true)
 *   
 *   echo $callable_name, "\n";  // someFunction
 *   
 *   //
 *   //  Array containing a method
 *   //
 *   
 *   class someClass {
 *   
 *     function someMethod() 
 *     {
 *     }
 *   
 *   }
 *   
 *   $anObject = new someClass();
 *   
 *   $methodVariable = array($anObject, 'someMethod');
 *   
 *   var_dump(is_callable($methodVariable, true, $callable_name));  //  bool(true)
 *   
 *   echo $callable_name, "\n";  //  someClass::someMethod
 *   
 *   ?>
 * 
 * Output:   array($SomeObject, 'MethodName')
 */
function is_callable(Any $v, Boolean $syntax = false, String &$name = null) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Call a user function given with an array of parameters
 * Example:   
 *   <?php
 *   function foobar($arg, $arg2) {
 *       echo __FUNCTION__, " got $arg and $arg2\n";
 *   }
 *   class foo {
 *       function bar($arg, $arg2) {
 *           echo __METHOD__, " got $arg and $arg2\n";
 *       }
 *   }
 *   
 *   
 *   // Call the foobar() function with 2 arguments
 *   call_user_func_array("foobar", array("one", "two"));
 *   
 *   // Call the $foo->bar() method with 2 arguments
 *   $foo = new foo;
 *   call_user_func_array(array($foo, "bar"), array("three", "four"));
 *   ?>
 * 
 * Output:   
 *   foobar got one and two
 *   foo::bar got three and four
 */
function call_user_func_array(Variant $function, VariantVec $params) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Call a user function given by the first parameter
 * Example:   
 *   <?php
 *   error_reporting(E_ALL);
 *   function increment(&$var)
 *   {
 *       $var++;
 *   }
 *   
 *   $a = 0;
 *   call_user_func('increment', $a);
 *   echo $a."\n";
 *   
 *   call_user_func_array('increment', array(&$a)); // You can use this instead before PHP 5.3
 *   echo $a."\n";
 *   ?>
 * 
 * Output:   
 *   0
 *   1
 */
function call_user_func(Variant $function) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
 $args = func_num_args(); // fake code to say variable #args
 
}

/*
 * Purpose: Create an anonymous (lambda-style) function
 * Example:   
 *   <?php
 *   $newfunc = create_function('$a,$b', 'return "ln($a) + ln($b) = " . log($a * $b);');
 *   echo "New anonymous function: $newfunc\n";
 *   echo $newfunc(2, M_E) . "\n";
 *   // outputs
 *   // New anonymous function: lambda_1
 *   // ln(2) + ln(2.718281828459) = 1.6931471805599
 *   ?>
 * 
 * Output:   
 *   Using the first array of anonymous functions
 *   parameters: 2.3445, M_PI
 *   some trig: -1.6291725057799
 *   a hypotenuse: 3.9199852871011
 *   b*a^2 = 4.8103313314525
 *   min(b^2+a, a^2,b) = 8.6382729035898
 *   ln(a/b) = 0.27122299212594
 *   
 *   Using the second array of anonymous functions
 *   ** "Twas the night" and "Twas brilling and the slithy toves"
 *   ** Look the same to me! (looking at the first 3 chars)
 *   CRCs: -725381282 , 1908338681
 *   similar(a,b) = 11(45.833333333333%)
 */
function create_function(String $args, String $code) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Return an item from the argument list
 * Example:   
 *   <?php
 *   function foo()
 *   {
 *        $numargs = func_num_args();
 *        echo "Number of arguments: $numargs<br />\n";
 *        if ($numargs >= 2) {
 *            echo "Second argument is: " . func_get_arg(1) . "<br />\n";
 *        }
 *   }
 *   
 *   foo (1, 2, 3);
 *   ?>
 * 
 * Output:   
 *   'Second arg'
 */
function func_get_arg(Int32 $arg_num) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Returns an array comprising a function's argument list
 * Example:   
 *   <?php
 *   function foo()
 *   {
 *       $numargs = func_num_args();
 *       echo "Number of arguments: $numargs<br />\n";
 *       if ($numargs >= 2) {
 *           echo "Second argument is: " . func_get_arg(1) . "<br />\n";
 *       }
 *       $arg_list = func_get_args();
 *       for ($i = 0; $i < $numargs; $i++) {
 *           echo "Argument $i is: " . $arg_list[$i] . "<br />\n";
 *       }
 *   }
 *   
 *   foo(1, 2, 3);
 *   ?>
 * 
 * Output:   
 *   Number of arguments: 3<br />
 *   Second argument is: 2<br />
 *   Argument 0 is: 1<br />
 *   Argument 1 is: 2<br />
 *   Argument 2 is: 3<br />
 */
function func_get_args() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Returns the number of arguments passed to the function
 * Example:   
 *   <?php
 *   function foo()
 *   {
 *       $numargs = func_num_args();
 *       echo "Number of arguments: $numargs\n";
 *   }
 *   
 *   foo(1, 2, 3);   
 *   ?>
 * 
 * Output:   
 *   Number of arguments: 3
 */
function func_num_args() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

function register_postsend_function(Variant $function) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
 $args = func_num_args(); // fake code to say variable #args
 
}

/*
 * Purpose: Register a function for execution on shutdown
 * Example:   
 *   <?php
 *   function shutdown()
 *   {
 *       // This is our shutdown function, in 
 *       // here we can do any last operations
 *       // before the script is complete.
 *   
 *       echo 'Script executed with success', PHP_EOL;
 *   }
 *   
 *   register_shutdown_function('shutdown');
 *   ?>
 * 
 * Output: 
 */
function register_shutdown_function(Variant $function) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
 $args = func_num_args(); // fake code to say variable #args
 
}

function register_cleanup_function(Variant $function) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
 $args = func_num_args(); // fake code to say variable #args
 
}

/*
 * Purpose: Register a function for execution on each tick
 * Example:   
 *   <?php
 *   // using a function as the callback
 *   register_tick_function('my_function', true);
 *   
 *   // using an object->method
 *   $object = new my_class();
 *   register_tick_function(array(&$object, 'my_method'), true);
 *   ?>
 * 
 * Output: 
 */
function register_tick_function(Variant $function) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
 $args = func_num_args(); // fake code to say variable #args
 
}

/*
 * Purpose: De-register a function for execution on each tick
 * Example: 
 * 
 * Output: 
 */
function unregister_tick_function(Variant $function_name) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

