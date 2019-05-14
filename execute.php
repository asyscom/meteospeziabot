<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}



//felettino
$felettino = file_get_contents('http://www.meteospezia.com/rete/felettino.txt');	
$arrparole = explode(" ",$nomefile);
$dataR = $arrparole[0];
$oraR = $arrparole[1];
$tempR = $arrparole[2];
//mazzetta
$nomefile = file_get_contents('http://www.meteospezia.com/rete/mazzetta.txt');	
$arrparole = explode(" ",$nomefile);
$dataM = $arrparole[0];
$oraM = $arrparole[1];
$tempM = $arrparole[2];

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || $text=="ciao")
{
	$response = "Ciao $firstname, benvenuto!";
}
elseif($text=="/ricco del golfo")
{
	$response = "alle $oraR la temperatura a Riccò del Golfo  è di  $tempR °C";
}
elseif($text=="/mazzetta")
{
	$response = "alle $oraM la temperatura a Mazzetta  è di  $tempR °C";
}
else
{
	$response = "Comando non valido!";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
