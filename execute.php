<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}

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
	    $sito = file_get_contents('https://www.meteospezia.com/rete/felettino.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	    $response = "Alle $ora la temperatura a Riccò del Golfo è di  $temp °C";
}
elseif($text=="/mazzetta")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/mazzetta.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	    $response = "alle $ora la temperatura a Mazzetta  è di  $temp °C";
}
elseif($text=="/corniglia")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/corniglia.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	    $response = "alle $ora la temperatura a Corniglia  è di  $temp °C";
}
elseif($text=="/via fratelli rosselli")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/fratellirosselli.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	    $response = "alle $ora la temperatura in Via Fratelli Rosselli  è di  $temp °C";
}
elseif($text=="/la lizza")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/lalizza.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	    $response = "alle $ora la temperatura alla Lizza  è di  $temp °C";
}
elseif($text=="/levanto")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/levanto.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	    $response = "alle $ora la temperatura a Levanto  è di  $temp °C";
}
elseif($text=="/ortonovo")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/ortonovo.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	    $response = "alle $ora la temperatura al Ortonovo  è di  $temp °C";
}
elseif($text=="/portolotti")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/portolotti.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	    $response = "alle $ora la temperatura al Portolotti è di  $temp °C";
}
elseif($text=="/sanbenedetto")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/sanbenedetto.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	    $response = "alle $ora la temperatura a San Benedetto  è di  $temp °C";
}
elseif($text=="/sarzana")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/sarzana2.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	    $response = "alle $ora la temperatura a Sarzana  è di  $temp °C";
}
elseif($text=="/serra")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/serra.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	    $response = "alle $ora la temperatura alla Serra  è di  $temp °C";
}
else
{
	$response = "Comando non valido!";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
