<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Texp extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		// $this->load->model('texp/mtexp');
	}
	public function index()
	{
		 
	}

	public function auth($endpoint,$method,$arraybody,$content_type){
		$start_curl = curl_init(); //1

		//cek method
		switch ($method){
			case "POST":
			   curl_setopt($start_curl, CURLOPT_POST, 1); //2
			   if ($arraybody)
				  curl_setopt($start_curl, CURLOPT_POSTFIELDS, $arraybody); //3
			   break;
			case "PUT":
			   curl_setopt($start_curl, CURLOPT_CUSTOMREQUEST, "PUT");
			   if ($arraybody)
				  curl_setopt($start_curl, CURLOPT_POSTFIELDS, $arraybody);			 					
			   break;
			default:
			   if ($arraybody)
				  $url = sprintf("%s?json=%s", $endpoint, http_build_query($jsonData));
		 }
		
		curl_setopt($start_curl, CURLOPT_URL, $endpoint);//4  
		curl_setopt($start_curl, CURLOPT_HTTPHEADER, array( 
		   'Content-Type:'.$content_type,
		));//5
		curl_setopt($start_curl, CURLOPT_RETURNTRANSFER, 1);//6
	 
		// EXECUTE:
		curl_exec($start_curl);
		// curl_getinfo($start_curl, CURLINFO_HTTP_CODE);
		// //$httCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		// curl_close($start_curl);
	}

	public function hit_api(){
		$endpoint = 'http://119.110.72.234/api/oauth/access_token';
		$method = 'POST';
		$content_type = 'application/x-www-form-urlencoded';
		$arraybody = array('grant_type'=>'password',
						'client_id'=>'d4ea1895de65af78f67da2645e9db9c4',
						'client_secret'=>'0a3fe885763d8f4ecb48fca75cd771f6',
						'username'=>'ASTRAGRAPHIA',
						'password'=>'5ae683a356a4a');

		$exec = $this->auth($endpoint,$method,$arraybody,$content_type);
		var_dump($exec);
	}
}
