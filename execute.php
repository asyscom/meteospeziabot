<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}



//felettino
$felettino = file_get_contents('http://www.meteospezia.com/rete/felettino.txt');	
$arrparole = explode(" ",$felettino);
$dataR = $arrparole[0];
$oraR = $arrparole[1];
$tempR = $arrparole[2];
//mazzetta
$mazzetta = file_get_contents('http://www.meteospezia.com/rete/mazzetta.txt');	
$arrparole = explode(" ",$mazzetta);
$dataM = $arrparole[0];
$oraM = $arrparole[1];
$tempM = $arrparole[2];

// assegno alle seguenti variabili il contenuto ricevuto da Telegram
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
// pulisco il messaggio ricevuto togliendo eventuali spazi prima e dopo il testo
$text = trim($text);
// converto tutti i caratteri alfanumerici del messaggio in minuscolo
$text = strtolower($text);
// mi preparo a restitutire al chiamante la mia risposta che è un oggetto JSON
// imposto l'header della risposta
header("Content-Type: application/json");
// la mia risposta è un array JSON composto da chat_id, text, method
// chat_id mi consente di rispondere allo specifico utente che ha scritto al bot
// text è il testo della risposta
$parameters = array('chat_id' => $chatId, "text" => $text);
// method è il metodo per l'invio di un messaggio (cfr. API di Telegram)
$parameters["method"] = "sendMessage";
// imposto la inline keyboard
$keyboard = ['inline_keyboard' => [[['text' =>  'mazzetta', 'callback_data' => 'alle $oraM la temperatura a Mazzetta  è di  $tempM °C']]]];
$parameters["reply_markup"] = json_encode($keyboard, true);
echo json_encode($parameters);



