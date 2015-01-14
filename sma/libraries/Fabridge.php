<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Fabridge
{

	private $COMPANY_NO = "0" ;
	private $REST_USER  = "admin";
	private $REST_PWD   = "12345";



	public function __construct()
	{
		log_message('debug', "Fabridge Class Initialized");
	}

	
	//fa bridge open function
	public function open($method="g", $action, $record="", $filter=false, $data=false) {

		$url = REST_URL . "/$action/$record";
		if ($filter) $url .= "/$filter";

		# headers and data (this is API dependent, some uses XML)
		$headers = array();

		/* 
		// optional headers
		$headers[] = "Accept: application/json";
		$headers[] = "Content-Type: application/json";
		*/

		$headers[] = "X_company: "  . $this->COMPANY_NO;
		$headers[] = "X_user: "     . $this->REST_USER;
		$headers[] = "X_password: " . $this->REST_PWD;

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
				curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query()$data);
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
}

?>
