 <?php
 
 include 'index.php';

 function tourA1($trtPriceLTCEUR,$trtPriceLTCBTC, $trtPriceBTCEUR, $x, $chatId ){

  $apiKey = "";
  $apiSecret = ""; 

  $priceLTCEUR = $trtPriceLTCEUR['asks'][$x]['price'];
  $amountLTCEUR = $trtPriceLTCEUR['asks'][$x]['amount'];

  $message1 = "Offerta \n Prezzo:".$priceBTCEUR."\n Amount:".$amountBTCEUR".";
  inviaMessaggio($chatId, $message1);
  //richiestaOffertatrtLTCEUR($priceLTCEUR,$amountLTCEUR,$apiKey,$apiSecret);


  $priceLTCBTC = $trtPriceLTCBTC['bids'][$x]['price'];
  $amountLTCBTC = $trtPriceLTCBTC['bids'][$x]['amount'];

  $message2 = "Offerta \n Prezzo:".$priceBTCEUR."\n Amount:".$amountBTCEUR".";
  inviaMessaggio($chatId, $message2);
  //richiestaOffertatrtLTCBTC($priceLTCBTC,$amountLTCBTC,$apiKey,$apiSecret);


  $priceBTCEUR = $trtPriceBTCEUR['bids'][$x]['price'];
  $amountBTCEUR = $trtPriceBTCEUR['bids'][$x]['amount'];

  $message3 = "Offerta \n Prezzo:".$priceBTCEUR."\n Amount:".$amountBTCEUR".";
  inviaMessaggio($chatId, $message3);
  //richiestaOffertatrtBTCEUR($priceBTCEUR,$amountBTCEUR,$apiKey,$apiSecret);

}

?>