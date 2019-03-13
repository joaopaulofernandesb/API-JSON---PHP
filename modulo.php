<?php

class HG_API {

private $key = null;
private $error = false;


function _construct ($key = null){

if (!empty($key)) $this->key = $key;

}

function request ( $endpoint = '', $params = array() ){
	$uri = "https://api.hgbrasil.com/".$endpoint."?key=" . $this->key . "&format=json";

	if (is_array($params)){
		foreach ($params as $key => $value) {
			if (empty($value)) continue;
			$uri .= $key . '=' . urldecode($value) . '&';
		}
		$uri = substr($uri, 0, -1);
		$response = @file_get_contents($uri);
		$this->error = false;
		return json_decode($response, true);
	}else{
		$this->error = true;
		return false;
	}
}

function is_error (){
	return $this->error;
}

function dolar_quotation(){
	$data = $this->request('finance/quotations');

	if(!empty($data) && is_array($data['results']['currencies']['USD'])){
		$this->error = false;
		return $data['results']['currencies']['USD'];
	}else{

		$this->error = true;
		return false;
	}
}


function eur_quotation(){
	$data = $this->request('finance/quotations');

	if(!empty($data) && is_array($data['results']['currencies']['EUR'])){
		$this->error = false;
		return $data['results']['currencies']['EUR'];
	}else{

		$this->error = true;
		return false;
	}
}

function btc_quotation(){
	$data = $this->request('finance/quotations');

	if(!empty($data) && is_array($data['results']['currencies']['BTC'])){
		$this->error = false;
		return $data['results']['currencies']['BTC'];
	}else{

		$this->error = true;
		return false;
	}
}

}


?>