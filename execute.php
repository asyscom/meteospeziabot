<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
//felettino
//$ricco = file_get_contents('http://www.meteospezia.com/rete/felettino.txt');
//$mazzetta = file_get_contents('http://www.meteospezia.com/rete/mazzetta.txt');
//$arrparole = explode(" ",$felettino);
//$data = $arrparole[0];
//$ora = $arrparole[1];
//$temp = $arrparole[2];
//mazzetta
//$mazzetta = file_get_contents('http://www.meteospezia.com/rete/mazzetta.txt');	
//$arrparole = explode(" ",$mazzetta);
//$dataM = $arrparole[0];
//$oraM = $arrparole[1];
//$tempM = $arrparole[2];
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
	$ricco = file_get_contents('http://www.meteospezia.com/rete/felettino.txt')
        $arrparole = explode(" ",$felettino);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	$response = "Alle $ora la temperatura a Riccò del Golfo è di  $temp °C";
}
elseif($text=="mazzetta")
{
	$response = "alle $oraM la temperatura a Mazzetta  è di  $tempM °C";
}
else
{
	$response = "Comando non valido!";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
