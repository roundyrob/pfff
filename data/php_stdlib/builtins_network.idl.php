<?php
/*
 * Purpose:    Get the Internet host name corresponding to a given IP address
 * Example:   
 *   <?php
 *   $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
 *   
 *   echo $hostname;
 *   ?>
 * 
 * Output: 
 */
function gethostbyaddr(String $ip_address) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Get the IPv4 address corresponding to a given Internet host name
 * Example:   
 *   <?php
 *   $ip = gethostbyname('www.example.com');
 *   
 *   echo $ip;
 *   ?>
 * 
 * Output: 
 */
function gethostbyname(String $hostname) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose:    Get a list of IPv4 addresses corresponding to a given Internet host
 *    name
 * Example:   
 *   <?php
 *   $hosts = gethostbynamel('www.example.com');
 *   print_r($hosts);
 *   ?>
 * 
 * Output:   
 *   Array
 *   (
 *       [0] => 192.0.34.166
 *   )
 */
function gethostbynamel(String $hostname) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Get protocol number associated with protocol name
 * Example:   
 *   <?php
 *   $protocol = 'tcp';
 *   $get_prot = getprotobyname($protocol);
 *   if ($get_prot == -1) {
 *       echo 'Invalid Protocol';
 *   } else {
 *       echo 'Protocol #' . $get_prot;
 *   }
 *   ?>
 * 
 * Output: 
 */
function getprotobyname(String $name) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Get protocol name associated with protocol number
 * Example: 
 * 
 * Output: 
 */
function getprotobynumber(Int32 $number) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Get port number associated with an Internet service and protocol
 * Example:   
 *   <?php
 *   $services = array('http', 'ftp', 'ssh', 'telnet', 'imap',
 *   'smtp', 'nicname', 'gopher', 'finger', 'pop3', 'www');
 *   
 *   foreach ($services as $service) {
 *       $port = getservbyname($service, 'tcp');
 *       echo $service . ": " . $port . "<br />\n";
 *   }
 *   ?>
 * 
 * Output: 
 */
function getservbyname(String $service, String $protocol) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Get Internet service which corresponds to port and protocol
 * Example: 
 * 
 * Output: 
 */
function getservbyport(Int32 $port, String $protocol) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Converts a packed internet address to a human readable representation
 * Example:   
 *   <?php
 *   $packed = chr(127) . chr(0) . chr(0) . chr(1);
 *   $expanded = inet_ntop($packed);
 *   
 *   /* Outputs: 127.0.0.1  * / 
 *   echo $expanded;
 *   
 *   $packed = str_repeat(chr(0), 15) . chr(1);
 *   $expanded = inet_ntop($packed);
 *   
 *   /* Outputs: ::1  * / 
 *   echo $expanded;
 *   ?>
 * 
 * Output: 
 */
function inet_ntop(String $in_addr) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Converts a human readable IP address to its packed in_addr representation
 * Example:   
 *   <?php
 *   $in_addr = inet_pton('127.0.0.1');
 *    
 *   $in6_addr = inet_pton('::1');
 *   ?>
 * 
 * Output: 
 */
function inet_pton(String $address) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Converts a string containing an (IPv4) Internet Protocol dotted address into a proper address
 * Example:   
 *   <?php
 *   $ip = gethostbyname('www.example.com');
 *   $out = "The following URLs are equivalent:<br />\n";
 *   $out .= 'http://www.example.com/, http://' . $ip . '/, and http://' . sprintf("%u", ip2long($ip)) . "/<br />\n";
 *   echo $out;
 *   ?>
 * 
 * Output: 
 */
function ip2long(String $ip_address) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Converts an (IPv4) Internet network address into a string in Internet standard dotted format
 * Example: 
 * 
 * Output: 
 */
function long2ip(Int32 $proper_address) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: &Alias;  <function>checkdnsrr</function>
 * Example: 
 * 
 * Output: 
 */
function dns_check_record(String $host, String $type = null_string) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Check DNS records corresponding to a given Internet host name or IP address
 * Example: 
 * 
 * Output: 
 */
function checkdnsrr(String $host, String $type = null_string) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Fetch DNS Resource Records associated with a hostname
 * Example:   
 *   <?php
 *   $result = dns_get_record("php.net");
 *   print_r($result);
 *   ?>
 * 
 * Output:   
 *   Array
 *   (
 *       [0] => Array
 *           (
 *               [host] => php.net
 *               [type] => MX
 *               [pri] => 5
 *               [target] => pair2.php.net
 *               [class] => IN
 *               [ttl] => 6765
 *           )
 *   
 *       [1] => Array
 *           (
 *               [host] => php.net
 *               [type] => A
 *               [ip] => 64.246.30.37
 *               [class] => IN
 *               [ttl] => 8125
 *           )
 *   
 *   )
 */
function dns_get_record(String $hostname, Int32 $type = -1, VariantMap &$authns = null, VariantMap &$addtl = null) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: &Alias;  <function>getmxrr</function>
 * Example: 
 * 
 * Output: 
 */
function dns_get_mx(String $hostname, VariantMap &$mxhosts, VariantMap &$weights = null) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Get MX records corresponding to a given Internet host name
 * Example: 
 * 
 * Output: 
 */
function getmxrr(String $hostname, VariantMap &$mxhosts, VariantMap &$weight = null) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Open Internet or Unix domain socket connection
 * Example:   
 *   <?php
 *   $fp = fsockopen("www.example.com", 80, $errno, $errstr, 30);
 *   if (!$fp) {
 *       echo "$errstr ($errno)<br />\n";
 *   } else {
 *       $out = "GET / HTTP/1.1\r\n";
 *       $out .= "Host: www.example.com\r\n";
 *       $out .= "Connection: Close\r\n\r\n";
 *       fwrite($fp, $out);
 *       while (!feof($fp)) {
 *           echo fgets($fp, 128);
 *       }
 *       fclose($fp);
 *   }
 *   ?>
 * 
 * Output: 
 */
function fsockopen(String $hostname, Int32 $port = -1, Int32 &$errnum = null, String &$errstr = null, Double $timeout = 0.0) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Open persistent Internet or Unix domain socket connection
 * Example: 
 * 
 * Output: 
 */
function pfsockopen(String $hostname, Int32 $port = -1, Int32 &$errnum = null, String &$errstr = null, Double $timeout = 0.0) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: &Alias;  <function>stream_get_meta_data</function>
 * Example: 
 * 
 * Output: 
 */
function socket_get_status(Resource $stream) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: &Alias;  <function>stream_set_blocking</function>
 * Example: 
 * 
 * Output: 
 */
function socket_set_blocking(Resource $stream, Int32 $mode) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: &Alias;  <function>stream_set_timeout</function>
 * Example: 
 * 
 * Output: 
 */
function socket_set_timeout(Resource $stream, Int32 $seconds, Int32 $microseconds = 0) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Send a raw HTTP header
 * Example:   
 *   <html>
 *   <?php
 *   /* This will give an error. Note the output
 *    * above, which is before the header() call  * / 
 *   header('Location: http://www.example.com/');
 *   ?>
 * 
 * Output: 
 */
function header(String $str, Boolean $replace = true, Int32 $http_response_code = 0) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Returns a list of response headers sent (or ready to send)
 * Example:   
 *   <?php
 *   
 *   /* setcookie() will add a response header on its own  * / 
 *   setcookie('foo', 'bar');
 *   
 *   /* Define a custom response header
 *      This will be ignored by most clients  * / 
 *   header("X-Sample-Test: foo");
 *   
 *   /* Specify plain text content in our response  * / 
 *   header('Content-type: text/plain');
 *   
 *   /* What headers are going to be sent?  * / 
 *   var_dump(headers_list());
 *   
 *   ?>
 * 
 * Output:   
 *   array(4) {
 *     [0]=>
 *     string(23) "X-Powered-By: PHP/5.1.3"
 *     [1]=>
 *     string(19) "Set-Cookie: foo=bar"
 *     [2]=>
 *     string(18) "X-Sample-Test: foo"
 *     [3]=>
 *     string(24) "Content-type: text/plain"
 *   }
 *   
 */
function headers_list() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Checks if or where headers have been sent
 * Example:   
 *   <?php
 *   
 *   // If no headers are sent, send one
 *   if (!headers_sent()) {
 *       header('Location: http://www.example.com/');
 *       exit;
 *   }
 *   
 *   // An example using the optional file and line parameters, as of PHP 4.3.0
 *   // Note that $filename and $linenum are passed in for later use.
 *   // Do not assign them values beforehand.
 *   if (!headers_sent($filename, $linenum)) {
 *       header('Location: http://www.example.com/');
 *       exit;
 *   
 *   // You would most likely trigger an error here.
 *   } else {
 *   
 *       echo "Headers already sent in $filename on line $linenum\n" .
 *             "Cannot redirect, for now please click this <a " .
 *             "href=\"http://www.example.com\">link</a> instead\n";
 *       exit;
 *   }
 *   
 *   ?>
 * 
 * Output: 
 */
function headers_sent(String &$file = null, Int32 &$line = null) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Send a cookie
 * Example:   
 *   <?php
 *   $value = 'something from somewhere';
 *   
 *   setcookie("TestCookie", $value);
 *   setcookie("TestCookie", $value, time()+3600);  /* expire in 1 hour  * / 
 *   setcookie("TestCookie", $value, time()+3600, "/~rasmus/", ".example.com", 1);
 *   ?>
 * 
 * Output:   
 *   three : cookiethree
 *   two : cookietwo
 *   one : cookieone
 */
function setcookie(String $name, String $value = null_string, Int32 $expire = 0, String $path = null_string, String $domain = null_string, Boolean $secure = false, Boolean $httponly = false) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Send a cookie without urlencoding the cookie value
 * Example: 
 * 
 * Output: 
 */
function setrawcookie(String $name, String $value = null_string, Int32 $expire = 0, String $path = null_string, String $domain = null_string, Boolean $secure = false, Boolean $httponly = false) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Initializes all syslog related variables
 * Example:   
 *   <?php
 *   // Check if syslog variables already is defined
 *   if(!get_cfg_var('define_syslog_variables'))
 *   {
 *       define_syslog_variables();
 *   }
 *   
 *   // Open the log
 *   openlog('', $LOG_ODELAY, $LOG_MAIL | $LOG_USER);
 *   
 *   // Continue script ...
 *   ?>
 * 
 * Output: 
 */
function define_syslog_variables() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Open connection to system logger
 * Example: 
 * 
 * Output: 
 */
function openlog(String $ident, Int32 $option, Int32 $facility) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Close connection to system logger
 * Example: 
 * 
 * Output: 
 */
function closelog() {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

/*
 * Purpose: Generate a system log message
 * Example:   
 *   <?php
 *   // open syslog, include the process ID and also send
 *   // the log to standard error, and use a user defined
 *   // logging mechanism
 *   openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);
 *   
 *   // some code
 *   
 *   if (authorized_client()) {
 *       // do something
 *   } else {
 *       // unauthorized client!
 *       // log the attempt
 *       $access = date("Y/m/d H:i:s");
 *       syslog(LOG_WARNING, "Unauthorized client: $access {$_SERVER['REMOTE_ADDR']} ({$_SERVER['HTTP_USER_AGENT']})");
 *   }
 *   
 *   closelog();
 *   ?>
 * 
 * Output: 
 */
function syslog(Int32 $priority, String $message) {
 // THIS IS AUTOGENERATED BY builtins_php.ml
  
}

