
<?php


function callTrtBTCEUR(){

 $url = "https://api.therocktrading.com/v1/funds/BTCEUR/orderbook";
 $price = 0;
 $headers = array(
  "Content-Type: application/json"
  );
            //chiamata al server
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $callResult = curl_exec($ch);
 curl_close($ch);
            //decodifico risultato della chiamata in json
 $result = json_decode($callResult, true);

  // inviaMessaggio($chatId,"THE ROCK:".(string)$price);

 return $result;
}

function callTrtLTCBTC(){

 $url = "https://api.therocktrading.com/v1/funds/LTCBTC/orderbook";
 $price = 0;
 $headers = array(
  "Content-Type: application/json"
  );
            //chiamata al server
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $callResult = curl_exec($ch);
 curl_close($ch);
            //decodifico risultato della chiamata in json
 $result = json_decode($callResult, true);
  // inviaMessaggio($chatId,"THE ROCK:".(string)$price);

 return $result;
}

function callTrtLTCEUR(){

 $url = "https://api.therocktrading.com/v1/funds/LTCEUR/orderbook";
 $price = 0;
 $headers = array(
  "Content-Type: application/json"
  );
            //chiamata al server
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $callResult = curl_exec($ch);
 curl_close($ch);
            //decodifico risultato della chiamata in json
 $result = json_decode($callResult, true);
  // inviaMessaggio($chatId,"THE ROCK:".(string)$price);

 return $result;
}


function getBalanceEUR(){

       $apiKey="";
       $apiSecret="";

       $currency="EUR";

       $url="https://api.therocktrading.com/v1/balances/".$currency;

       $nonce=microtime(true)*10000;
       $signature=hash_hmac("sha512",$nonce.$url,$apiSecret);

       $headers=array(
         "Content-Type: application/json",
         "X-TRT-KEY: ".$apiKey,
         "X-TRT-SIGN: ".$signature,
         "X-TRT-NONCE: ".$nonce
       ); 

       $ch=curl_init();
       curl_setopt($ch,CURLOPT_URL,$url);
       curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
       $callResult=curl_exec($ch);
       curl_close($ch);

       $result=json_decode($callResult,true);

      return $result['balance'];
}

function getBalanceLTC(){

       $apiKey="";
       $apiSecret="";

       $currency="EUR";

       $url="https://api.therocktrading.com/v1/balances/".$currency;

       $nonce=microtime(true)*10000;
       $signature=hash_hmac("sha512",$nonce.$url,$apiSecret);

       $headers=array(
         "Content-Type: application/json",
         "X-TRT-KEY: ".$apiKey,
         "X-TRT-SIGN: ".$signature,
         "X-TRT-NONCE: ".$nonce
       ); 

       $ch=curl_init();
       curl_setopt($ch,CURLOPT_URL,$url);
       curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
       $callResult=curl_exec($ch);
       curl_close($ch);

       $result=json_decode($callResult,true);

       return $result['balance'];
}

function getBalanceBTC(){

  $apiKey="";
  $apiSecret="";

  $url="https://api.therocktrading.com/v1/balances";

  $nonce=microtime(true)*10000;
  $signature=hash_hmac("sha512",$nonce.$url,$apiSecret);

  $headers=array(
    "Content-Type: application/json",
    "X-TRT-KEY: ".$apiKey,
    "X-TRT-SIGN: ".$signature,
    "X-TRT-NONCE: ".$nonce
    );

  $ch=curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  $callResult=curl_exec($ch);
  curl_close($ch);

  $result=json_decode($callResult,true);

  return $result['balance'];
}


function richiestaOffertatrtLTCEUR($price,$amount,$apiKey,$apiSecret){

                $fund_id = "LTCEUR";
                $uri = "https://api.therocktrading.com/v1/funds/${fund_id}/orders";
                $side = "buy";
                
                $params = array (
                    "fund_id" => $fund_id,
                    "side" => $side,
                    "amount" => $amount,
                    "price" => $price 
                    );
                $nonce = microtime ( true ) * 10000;
                $signature = hash_hmac ( "sha512", $nonce . $uri, $apiSecret );
                $http = new http ();
                $headers = array (
                    "X-TRT-KEY" => $apiKey,
                    "X-TRT-SIGN" => $signature,
                    "X-TRT-NONCE" => $nonce 
                    );
                
                $options = [ 
                'http_errors' => false,
                'headers' => $headers,
                'json' => $params 
                ];
                
                return $http->post ( $uri, $options );
            }


function richiestaOffertatrtLTCBTC($price,$amount,$apiKey,$apiSecret){

                $fund_id = "LTCBTC";
                $uri = "https://api.therocktrading.com/v1/funds/${fund_id}/orders";
                $side = "sell";
                
                $params = array (
                    "fund_id" => $fund_id,
                    "side" => $side,
                    "amount" => $amount,
                    "price" => $price 
                    );
                $nonce = microtime ( true ) * 10000;
                $signature = hash_hmac ( "sha512", $nonce . $uri, $apiSecret );
                $http = new http ();
                $headers = array (
                    "X-TRT-KEY" => $apiKey,
                    "X-TRT-SIGN" => $signature,
                    "X-TRT-NONCE" => $nonce 
                    );
                
                $options = [ 
                'http_errors' => false,
                'headers' => $headers,
                'json' => $params 
                ];
                
                return $http->post ( $uri, $options );
            }

     function richiestaOffertatrtBTCEUR($price,$amount,$apiKey,$apiSecret){

                $fund_id = "BTCEUR";
                $uri = "https://api.therocktrading.com/v1/funds/${fund_id}/orders";
                $side = "sell";
                
                $params = array (
                    "fund_id" => $fund_id,
                    "side" => $side,
                    "amount" => $amount,
                    "price" => $price 
                    );
                $nonce = microtime ( true ) * 10000;
                $signature = hash_hmac ( "sha512", $nonce . $uri, $apiSecret );
                $http = new http ();
                $headers = array (
                    "X-TRT-KEY" => $apiKey,
                    "X-TRT-SIGN" => $signature,
                    "X-TRT-NONCE" => $nonce 
                    );
                
                $options = [ 
                'http_errors' => false,
                'headers' => $headers,
                'json' => $params 
                ];
                
                return $http->post ( $uri, $options );
            }

?>


