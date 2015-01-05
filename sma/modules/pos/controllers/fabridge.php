<?php
/*
FrontAccounting Bridge Function
Ref: http://singletonio.blogspot.in/2009/07/simple-php-rest-client-using-curl.html
Author: Ap.Muthu
Website: http://www.apmuthu.com
Release Date: 2012-11-28
*/

define("REST_URL",   "http://fa.local/modules/api");
define("MAIN_URL",   "http://fa.local/");
define("COMPANY_NO", "0");
define("REST_USER",  "admin");
define("REST_PWD",   "1234566");

function fa_bridge($method="g", $action, $record="", $filter=false, $data=false) {

$url = REST_URL . "/$action/$record";
if ($filter) $url .= "/$filter";

# headers and data (this is API dependent, some uses XML)
$headers = array();

/* 
// optional headers
$headers[] = "Accept: application/json";
$headers[] = "Content-Type: application/json";
*/

$headers[] = "X_company: "  . COMPANY_NO;
$headers[] = "X_user: "     . REST_USER;
$headers[] = "X_password: " . REST_PWD;

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_HEADER, 0);
curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

switch($method) {

	case 'g':
		break;

	case 'p':
		
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
		break;

	case 't':
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
		break;

	case 'd':
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
		break;
}

// grab URL and pass it to the variable and not browser
ob_start();
curl_exec($handle);
$content = ob_get_contents(); 
ob_end_clean(); 
$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

// close cURL resource, and free up system resources
curl_close($handle);

$content = ($code == "200") ? json_decode($content, true) : false;

return $content;
}

?>
