
<?php

include 'callExchange.php';
include 'askbid.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$botoken="";
$website="https://api.telegram.org/bot".$botoken;

$update = file_get_contents('php://input');
$update = json_decode($update,TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$telegramUsername = $update['message']['from']['username'];
$messageId = $update['message']['message_id'];
$message_name = $update['message']['chat']['first_name'];

switch($message){  
 case ( $message === '/help'):
 help($chatId);
 break;            
 case ( $message === '/show_spread'):
 spread($chatId);
 break;

 default:
 $messaggio = "Inserici un comando";
 inviaMessaggio($chatId,$messaggio);
 break;
}


  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function help($chatId){

 $messaggio = "AutoSpreadBot ricerca nei seguenti exchange l'esistenza di uno spread profittevole tra questi per eventuali offerte in automatico.";
 inviaMessaggio($chatId,$messaggio);
}

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function spread($chatId){

//  $finish = false;

  //do{
      //chiamate agli orderbook dei vari mercati
    $trtPriceLTCBTC = callTrtLTCBTC();
    $trtPriceLTCEUR = callTrtLTCEUR();
    $trtPriceBTCEUR = callTrtBTCEUR();

     //dichiaro array per ask e bid dei vari mercati
    $askLTCBTC = array();
    $bidLTCBTC = array();

    $askLTCEUR = array();
    $bidLTCEUR = array();

    $askBTCEUR = array();
    $bidBTCEUR = array();
     // ciclo ask e bid di ogni mercato e salvo i valori nei rispettivi array
     //ask/bid BTCLTC price
    $askLTCBTC = askBTCLTC($trtPriceLTCBTC, $askLTCBTC);
    $bidLTCBTC = bidBTCLTC($trtPriceLTCBTC, $bidLTCBTC);

     //ask/bid LTCEUR price

    $askLTCEUR = askLTCEUR($trtPriceLTCEUR, $askLTCEUR);
    $bidLTCEUR = bidLTCEUR($trtPriceLTCEUR, $bidLTCEUR);

     //ask/bid EURBTC price
    $askBTCEUR = askLTCEUR($trtPriceBTCEUR, $askBTCEUR );
    $bidBTCEUR = bidBTCEUR($trtPriceBTCEUR, $bidBTCEUR );

    $numAskLTCEUR = count($askLTCEUR);
    $numABidLTCBTC = count($bidLTCBTC);
    $numABidBTCEUR =  count($bidBTCEUR);

    $index = min($numAskLTCEUR,$numABidLTCBTC,$numABidBTCEUR);

    $balanceEUR = 10000;
  //$balanceEUR = getBalanceEUR();

    for($x = 0; $x < $index; $x++){

      if( (((($bidLTCBTC[$x] * $bidBTCEUR[$x]) /  $askLTCEUR[$x]) -1 ) * 100) > 0.4){

        $volumeMinimoComune = min($trtPriceLTCBTC['bids'][$x]['amount'],$trtPriceBTCEUR['bids'][$x]['amount'],$trtPriceLTCEUR['asks'][$x]['price']);

        if( $volumeMinimoComune > 0.005){
              
          if($balanceEUR >  ($askLTCEUR[$x] * $trtPriceLTCEUR['asks'][$x]['amount'])){

           tourA1($trtPriceLTCEUR,$trtPriceLTCBTC, $trtPriceBTCEUR, $x, $chatId);
          // $finish = true;
         }
       }
     }
     else
     {
        $messaggioStart = "GIRO NUMERO ".$x.":";
        inviaMessaggio($chatId,$messaggioStart);

        $priceLTCEUR = $trtPriceLTCEUR['asks'][$x]['price'];
        $amountLTCEUR = $trtPriceLTCEUR['asks'][$x]['amount'];

        $message1 = "\nOfferta \n Prezzo:".$priceLTCEUR." EUR\n Amount:".$amountLTCEUR." LTC.";
        inviaMessaggio($chatId, $message1);

        //esempio: compro 0.11 litecoin a 56.35 euro
        $priceLTCBTC = $trtPriceLTCBTC['bids'][$x]['price'];
        $amountLTCBTC = $trtPriceLTCBTC['bids'][$x]['amount'];
        //vendo 0.11 litecoin a 0.016 bitcoin solo se 0.11 è maggiore dell'amount di ltc
        $message2 = "\nOfferta \n Prezzo:".$priceLTCBTC." BTC\n Amount:".$amountLTCEUR." LTC.";
        inviaMessaggio($chatId, $message2);

        //vendo i bitcoin per gli euro
        $priceBTCEUR = $trtPriceBTCEUR['bids'][$x]['price'];
        $amountBTCEUR = $trtPriceBTCEUR['bids'][$x]['amount'];

        $message3 = "\nOfferta \n Prezzo:".$priceBTCEUR." EUR\n Amount:".$amountLTCEUR * $priceLTCBTC." BTC.";
        inviaMessaggio($chatId, $message3);

        $gain = (((($bidLTCBTC[$x] * $bidBTCEUR[$x]) /  $askLTCEUR[$x]) -1 ) * 100);
        $messaggioGain = "".$gain;
        inviaMessaggio($chatId,$messaggioGain);
      }

   }
// } while($finish == false);
 

 $messaggio = "Caro diario......Anche oggi ho perso tutto.. :)";
 inviaMessaggio($chatId,$messaggio);
}

  ////////////////////////////////////////////////////////////////////////////////////////////////////////

function inviaMessaggio($chatId,$message){
 $urltel="$GLOBALS[website]/sendMessage?chat_id=$chatId&text=$message";
 file_get_contents($urltel);
}

  ////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
