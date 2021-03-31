<?php
/**
 * author 	: Okki Setyawan
 * email 	: okkisetyawan@gmail.com
 * github	: github.com/okki23
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Texp extends CI_Controller { 

	public function __construct(){
		parent::__construct(); 
	}
	
	public function index()
	{
		echo 'welcome'; 
	}
 
	public function req_access_token(){ 

		$username = $this->input->post('username'); 
		$password = $this->input->post('password');  
		$client_id = $this->input->post('client_id'); 
		$client_secret = $this->input->post('client_secret');  
		$endpoint = 'http://119.110.72.234/api/oauth/access_token'; 
		$content_type = 'application/x-www-form-urlencoded';
		
		$arraybody = array('grant_type'=>'password',
						'client_id'=>$client_id,
						'client_secret'=>$client_secret,
						'username'=>$username,
						'password'=>$password);

						$curl = curl_init();
						curl_setopt_array($curl, array(
							CURLOPT_URL => $endpoint,
							CURLOPT_RETURNTRANSFER => true, // return the transfer as a string of the return value
							CURLOPT_TIMEOUT => 0,   // The maximum number of seconds to allow cURL functions to execute.
							CURLOPT_POST => true,   // This line must place before CURLOPT_POSTFIELDS
							CURLOPT_HTTPHEADER, $content_type,
							CURLOPT_POSTFIELDS => $arraybody // Data that will send
						)); 
						$response = curl_exec($curl);  
		echo $response;
	}
}


