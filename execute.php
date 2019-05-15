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
	$response = "Ciao $firstname, benvenuto nel bot della rete di osservazione di MeteoSpezia.com! Per conoscere in tempo reale le informazioni sulle singlole località clicca su / in basso a destra e scegli quella che ti interessa.";
}
elseif($text=="/riccodelgolfo")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/felettino.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
	$umid = $arrparole[3];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	$tmax = $arrparole[26];
	$tmin = $arrparole[28];
	$tmaxora = $arrparole[27];
	$tminora = $arrparole[29];
	$velocitavento = $arrparole[12];
	$unitavento = $arrparole[13];
	$direzionevento = $arrparole[11];
	$pioggia = $arrparole[9];	
	    //$response = "Alle $ora la temperatura a Riccò del Golfo è di  $temp °C, \n la temperatura massima è stata di $tmax °C alle $tmaxora, \n la temperatura minima è stata di $tmin °C alle $tminora, il vento è $velocitavento $unitavento $direzionevento,  la pioggia caduta è di $pioggia mm";
	
	   $response = "Ecco la situazione a Riccò del Golfo:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento $unitavento $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/mazzetta")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/mazzetta.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
	$umid = $arrparole[3];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	$tmax = $arrparole[26];
	$tmin = $arrparole[28];
	$tmaxora = $arrparole[27];
	$tminora = $arrparole[29];
	$velocitavento = $arrparole[12];
	$unitavento = $arrparole[13];
	$direzionevento = $arrparole[11];
	$pioggia = $arrparole[9];	
	    $response = "Ecco la situazione a Mazzetta:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento $unitavento $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/corniglia")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/corniglia.txt');
        $arrparole = explode(" ",$sito);
        $data = $arrparole[0];
	$umid = $arrparole[3];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	$tmax = $arrparole[26];
	$tmin = $arrparole[28];
	$tmaxora = $arrparole[27];
	$tminora = $arrparole[29];
	$velocitavento = $arrparole[12];
	$unitavento = $arrparole[13];
	$direzionevento = $arrparole[11];
	$pioggia = $arrparole[9];
	    $response = "Ecco la situazione a Corniglia:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento $unitavento $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/viafratellirosselli")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/fratellirosselli.txt');
        $arrparole = explode("\n",$sito);
        $data = $arrparole[2];
	$umid = $arrparole[16];
        $ora = $arrparole[1];
        $temp = $arrparole[4];
	$tmax = $arrparole[5];
	$tmin = $arrparole[7];
	$tmaxora = $arrparole[6];
	$tminora = $arrparole[8];
	$velocitavento = $arrparole[34];
	$unitavento = km/h;
	$direzionevento = $arrparole[35];
	$pioggia = $arrparole[40];
	    $response = "Ecco la situazione in Via Fratelli Rosselli:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento km/h $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/lalizza")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/lalizza.txt');
        $arrparole = explode("\n",$sito);
        $data = $arrparole[2];
	$umid = $arrparole[16];
        $ora = $arrparole[1];
        $temp = $arrparole[4];
	$tmax = $arrparole[5];
	$tmin = $arrparole[7];
	$tmaxora = $arrparole[6];
	$tminora = $arrparole[8];
	$velocitavento = $arrparole[34];
	$unitavento = km/h;
	$direzionevento = $arrparole[35];
	$pioggia = $arrparole[40];
	    $response = "Ecco la situazione alla Lizza:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento km/h $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/levanto")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/levanto.txt');
        $arrparole = explode("\n",$sito);
        $data = $arrparole[2];
	$umid = $arrparole[16];
        $ora = $arrparole[1];
        $temp = $arrparole[4];
	$tmax = $arrparole[5];
	$tmin = $arrparole[7];
	$tmaxora = $arrparole[6];
	$tminora = $arrparole[8];
	$velocitavento = $arrparole[34];
	$unitavento = km/h;
	$direzionevento = $arrparole[35];
	$pioggia = $arrparole[40];
	    $response = "Ecco la situazione Levanto:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento km/h $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/ortonovo")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/ortonovo.txt');
        $arrparole = explode(" ",$sito);
         $data = $arrparole[0];
	$umid = $arrparole[3];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	$tmax = $arrparole[26];
	$tmin = $arrparole[28];
	$tmaxora = $arrparole[27];
	$tminora = $arrparole[29];
	$velocitavento = $arrparole[12];
	$unitavento = $arrparole[13];
	$direzionevento = $arrparole[11];
	$pioggia = $arrparole[9];
	    $response = "Ecco la situazione a Ortonovo:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento $unitavento $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/portolotti")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/portolotti.txt');
        $arrparole = explode("\n",$sito);
        $data = $arrparole[2];
	$umid = $arrparole[16];
        $ora = $arrparole[1];
        $temp = $arrparole[4];
	$tmax = $arrparole[5];
	$tmin = $arrparole[7];
	$tmaxora = $arrparole[6];
	$tminora = $arrparole[8];
	$velocitavento = $arrparole[34];
	$unitavento = km/h;
	$direzionevento = $arrparole[35];
	$pioggia = $arrparole[40];
	    $response = "Ecco la situazione a Portolotti:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento km/h $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/sanbenedetto")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/sanbenedetto.txt');
        $arrparole = explode("\n",$sito);
        $data = $arrparole[2];
	$umid = $arrparole[16];
        $ora = $arrparole[1];
        $temp = $arrparole[4];
	$tmax = $arrparole[5];
	$tmin = $arrparole[7];
	$tmaxora = $arrparole[6];
	$tminora = $arrparole[8];
	$velocitavento = $arrparole[34];
	$unitavento = km/h;
	$direzionevento = $arrparole[35];
	$pioggia = $arrparole[40];
	    $response = "Ecco la situazione a Sanbenedetto:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento km/h $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/sarzana")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/sarzana2.txt');
        $arrparole = explode("\n",$sito);
        $data = $arrparole[2];
	$umid = $arrparole[16];
        $ora = $arrparole[1];
        $temp = $arrparole[4];
	$tmax = $arrparole[5];
	$tmin = $arrparole[7];
	$tmaxora = $arrparole[6];
	$tminora = $arrparole[8];
	$velocitavento = $arrparole[34];
	$unitavento = km/h;
	$direzionevento = $arrparole[35];
	$pioggia = $arrparole[40];
	    $response = "Ecco la situazione a Sarzana:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento km/h $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/serra")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/serra.txt');
        $arrparole = explode(" ",$sito);
         $data = $arrparole[0];
	$umid = $arrparole[3];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	$tmax = $arrparole[26];
	$tmin = $arrparole[28];
	$tmaxora = $arrparole[27];
	$tminora = $arrparole[29];
	$velocitavento = $arrparole[12];
	$unitavento = $arrparole[13];
	$direzionevento = $arrparole[11];
	$pioggia = $arrparole[9];
	    $response = "Ecco la situazione alla Serra:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento $unitavento $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/valgraveglia")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/valgraveglia.txt');
        $arrparole = explode("\n",$sito);
        $data = $arrparole[2];
	$umid = $arrparole[16];
        $ora = $arrparole[1];
        $temp = $arrparole[4];
	$tmax = $arrparole[5];
	$tmin = $arrparole[7];
	$tmaxora = $arrparole[6];
	$tminora = $arrparole[8];
	$velocitavento = $arrparole[34];
	$unitavento = km/h;
	$direzionevento = $arrparole[35];
	$pioggia = $arrparole[40];
	    $response = "Ecco la situazione in Val Graveglia:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento km/h $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/viaxxsettembre")
{
	    $sito = file_get_contents('https://www.meteospezia.com/rete/viaxxsett.txt');
        $arrparole = explode("\n",$sito);
        $data = $arrparole[2];
	$umid = $arrparole[16];
        $ora = $arrparole[1];
        $temp = $arrparole[4];
	$tmax = $arrparole[5];
	$tmin = $arrparole[7];
	$tmaxora = $arrparole[6];
	$tminora = $arrparole[8];
	$velocitavento = $arrparole[34];
	$unitavento = km/h;
	$direzionevento = $arrparole[35];
	$pioggia = $arrparole[40];
	    $response = "Ecco la situazione in Via XX Settembre:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento km/h $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/varese")
{	
	    $sito = file_get_contents('https://www.meteospezia.com/rete/varese.txt');
        $arrparole = explode(" ",$sito);
         $data = $arrparole[0];
	$umid = $arrparole[3];
        $ora = $arrparole[1];
        $temp = $arrparole[2];
	$tmax = $arrparole[26];
	$tmin = $arrparole[28];
	$tmaxora = $arrparole[27];
	$tminora = $arrparole[29];
	$velocitavento = $arrparole[12];
	$unitavento = $arrparole[13];
	$direzionevento = $arrparole[11];
	$pioggia = $arrparole[9];
	    $response = "Ecco la situazione a Varese Ligure:
	        \n Temperatura: $temp °C
		\n Umidità: $umid %
                \n Temp. Max: $tmax °C alle $tmaxora
		\n Temp. Min: $tmin °C alle $tminora
		\n Vento: $velocitavento $unitavento $direzionevento
                \n Pioggia odierna: $pioggia mm";
}
elseif($text=="/prova")
	$menu[] = array("/mazzetta");
        $menu[] = array("VOCE TASTIERA 2", "VOCE TASTIERA 3");
        $menu[] = array("VOCE TASTIERA 5");

        $text = "Tastiera normale".
        Nascondi tastiera: /nascondi";
       sm($chatID, $text, $menu, '', false, false, false);
{
else
{
	$response = "Comando non valido!";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);


