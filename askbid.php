<?php

//BTCLTC(

function askBTCLTC($trtPriceLTCBTC ,$askBTCLTC){
	
	$countaskLTCBTC = count($trtPriceLTCBTC['asks']);
	for ($x = 0; $x < $countaskLTCBTC; $x++) {
		$askLTCBTC[$x] = floatval($trtPriceLTCBTC['asks'][$x]['price']);
	}
	return $askLTCBTC;
}

function bidBTCLTC($trtPriceLTCBTC ,$bidLTCBTC){
	

	$countbidLTCBTC = count($trtPriceLTCBTC['bids']);


	for ($x = 0; $x < $countbidLTCBTC; $x++) {
		$bidLTCBTC[$x] = floatval($trtPriceLTCBTC['bids'][$x]['price']);
	}
	return $bidLTCBTC;
}

//LTCEUR

function askLTCEUR($trtPriceLTCEUR ,$askLTCEUR){
	
	$countaskLTCEUR = count($trtPriceLTCEUR['asks']);
	for ($x = 0; $x < $countaskLTCEUR; $x++) {
		$askLTCEUR[$x] = floatval($trtPriceLTCEUR['asks'][$x]['price']);
	}
	return $askLTCEUR;
}

function bidLTCEUR($trtPriceLTCEUR ,$bidLTCEUR){
	
	$countbidLTCEUR = count($trtPriceLTCEUR['bids']);

	for ($x = 0; $x < $countbidLTCEUR; $x++) {
		$bidLTCEUR[$x] = floatval($trtPriceLTCEUR['bids'][$x]['price']); 
	}
	return $bidLTCEUR;
}

//EURBTC


function askBTCEUR($trtPriceBTCEUR ,$askBTCEUR){
	
	$countaskBTCEUR = count($trtPriceBTCEUR['asks']);
	for ($x = 0; $x < $countaskBTCEUR; $x++) {
		$askBTCEUR[$x] = floatval($trtPriceBTCEUR['asks'][$x]['price']);
	}
	return $askBTCBTC;
}

function bidBTCEUR($trtPriceBTCEUR ,$bidBTCEUR){
	
	$countbidBTCEUR = count($trtPriceBTCEUR['bids']);

	for ($x = 0; $x < $countbidBTCEUR; $x++) {
		$bidBTCEUR[$x] = floatval($trtPriceBTCEUR['bids'][$x]['price']); 
	}
	return $bidBTCEUR;
}


?>