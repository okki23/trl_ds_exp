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

	public function get_origin(){
		$endpoint = 'http://119.110.72.234/api/v1/city/origin'; 
		$access_token = $this->input->post('access_token');   
		$getter = $endpoint.'?access_token='.$access_token; 
		$response = file_get_contents($getter,true);  
		echo $response; 
	}

	public function get_destination_cities(){
		$endpoint = 'http://119.110.72.234/api/v1/city/destination/'; 
		$access_token = $this->input->post('access_token');  
		$origin = $this->input->post('origin');   
		$getter = $endpoint.$origin.'?access_token='.$access_token; 
		$response = file_get_contents($getter,true);  
		echo $response; 
	}

	public function get_destination_by_service(){
		$endpoint = 'http://119.110.72.234/api/v1/city/destinationByService/'; 
		$access_token = $this->input->post('access_token');  
		$origin = $this->input->post('origin');   
		$service_type = $this->input->post('service_type');   
		$getter = $endpoint.$origin.'/'.$service_type.'?access_token='.$access_token; 
		$response = file_get_contents($getter,true);  
		echo $response; 
	} 
	public function get_tarif_option(){
		$endpoint = 'http://119.110.72.234/api/v1/tariff/options/'; 
		$access_token = $this->input->post('access_token');   
		$from = $this->input->post('from');  
		$from = str_replace(' ', '%20', $from);    
		$to = $this->input->post('to');   
		$to = str_replace(' ', '%20', $to);
		$weight = $this->input->post('weight');   
		$getter = $endpoint.$from.'/'.$to.'/'.$weight.'?access_token='.$access_token;  
		$response = file_get_contents($getter,true);  
		echo $response; 
	}
 
	public function get_tarif_specific_service(){
		$endpoint = 'http://119.110.72.234/api/v1/tariff/calculate/'; 
		$access_token = $this->input->post('access_token');   
		$from = $this->input->post('from');  
		$from = str_replace(' ', '%20', $from);    
		$to = $this->input->post('to');   
		$to = str_replace(' ', '%20', $to);
		$weight = $this->input->post('weight'); 
		$service_type = $this->input->post('service_type');   
		$getter = $endpoint.$from.'/'.$to.'/'.$service_type.'/'.$weight.'?access_token='.$access_token; 
	 
		$response = file_get_contents($getter,true);  
		echo $response; 
	}

	public function get_info_status(){
		$endpoint = 'http://119.110.72.234/api/v1/shipment/'; 
		$access_token = $this->input->post('access_token');   
		$no_resi = $this->input->post('no_resi');   
		$getter = $endpoint.$no_resi.'?access_token='.$access_token; 
		$response = file_get_contents($getter,true);  
		echo $response; 
	}

	public function get_info_zipcode(){
		$endpoint = 'http://119.110.72.234/api/v1/city/name/'; 
		$access_token = $this->input->post('access_token');   
		$zipcode = $this->input->post('zipcode');   
		$getter = $endpoint.$zipcode.'?access_token='.$access_token; 
		$response = file_get_contents($getter,true);  
		echo $response; 
	}

	public function get_received_status(){
		$endpoint = 'http://119.110.72.234/api/v1/shipment/'; 
		$access_token = $this->input->post('access_token');   
		$no_resi = $this->input->post('no_resi');   
		$getter = $endpoint.$no_resi.'/status_received?access_token='.$access_token;  
		$response = file_get_contents($getter,true);  
		echo $response; 
	}

	 
}


