<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}

function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
	}

//$ricco = fopen ("https://www.meteospezia.com/rete/felettino.txt", "w");

//$nomefile = "https://www.meteospezia.com/rete/mazzetta.txt";
$nomefile = get_data('https://www.meteospezia.com/rete/felettino.txt');	
//$nomefile = "mazzetta.txt";
$apro = fopen($nomefile,"r");
$leggo = fread($apro,filesize($nomefile));
fclose($apro);
$arrparole = explode(" ",$leggo);
$data = $arrparole[0];
$ora = $arrparole[1];
$temp = $arrparole[2];
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
	$response = "Ciao $firstname, benvenuto! alle $ora la temperatura a Riccò del Golfo  è di  $temp °C";
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
