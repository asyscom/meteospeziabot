<?php

  $botToken = "659309900:AAGL0fAz8iCwFpkD8SL-qvFrk7TIFzQzbjc";
  $website = "https://api.telegram.org/bot".$botToken;
  $updates = file_get_contents("php://input");
  $updates = json_decode($update, TRUE);
   
  $chatID = $updates['message']['chat']['id'];
  $text = $updates['message']['from']['username'];
  
  sendMessage($chatID, $text);
  
  function sendMessage($chatID,$message)
  {
  $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatID."&text=".urlencode($message);
  file_get_contents($url);
  }
  
  
?>
