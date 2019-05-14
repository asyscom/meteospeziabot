<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}

//$ricco = fopen ("https://www.meteospezia.com/rete/felettino.txt", "w");

$nomefile="https://www.meteospezia.com/rete/felettino.txt";
$apro=fopen($nomefile,"r");
$leggo=fread($apro,filesize($nomefile));
fclose($apro);
$arrparole=explode(" ",$leggo);
$data=$arrparole[0];
$seconda=$arrparole[1];
$temp=$arrparole[2];
//$ricco = "file";
//$gestione = fopen($ricco, “w”);

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
	$response = "Ciao $firstname, benvenuto! la temperatura a Riccò del Golfo  è $temp";
}
elseif($text=="domanda 1")
{
	$response = "risposta 1";
}
elseif($text=="domanda 2")
{
	$response = "risposta 2";
}
else
{
	$response = "Comando non valido!";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
