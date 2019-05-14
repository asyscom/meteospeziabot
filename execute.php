<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}

foreach(file("https://www.meteospezia.com/rete/felettino.txt") as $riga){
$presenza=explode(" ",$riga); // IL SEPARATORE E’ IL CARATTERE “|”
$data=$presenza[‘0’];
$temp=$presenza[‘2’];
//echo "<br /><br />Signor: ".$dati_personali."<br />Presenza: ".$data_ora;
}
//$ricco = "https://www.meteospezia.com/rete/felettino.txt";
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
