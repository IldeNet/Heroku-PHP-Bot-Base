<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$var = file_get_contents("php://input");
$var = json_decode($var,true);
$chat_id = $var['message']['chat']['id'];
$text = $var['message']['text'];
$msg = strtolower($text);
$msg = trim($msg);
$token = "551082423:AAG9pkYJCW-4BctGLst4PtXLk2u9-GK8vPk"; 

function sendMessage($chat_id,$text)
{
	global $token;
    $api    = "https://api.telegram.org/bot$token/";
    $method = "sendMessage";
    $params = "?chat_id=$chat_id&text=" . urlencode($text);
  
  	$url = $api . $method . $params;
    $result = file_get_contents($url);
  	return $result;
}
function sendMessageWithKeyboard($chat_id,$text,$reply_markup)
{
	global $token;
    $api    = "https://api.telegram.org/bot$token/";
    $method = "sendMessage";
    $params = "?chat_id=$chat_id&text=" . urlencode($text);
    $params .= "&reply_markup=" . json_encode($reply_markup);
  
  	$url = $api . $method . $params;
    $result = file_get_contents($url);
  	return $result;
}
function sendPhoto($chat_id,$photo)
{
	global $token;
    $api    = "https://api.telegram.org/bot$token/";
    $method = "sendPhoto";
    $params = "?chat_id=$chat_id&photo=" . urlencode($text);
  
  	$url = $api . $method . $params;
    $result = file_get_contents($url);
  	return $result;
}


$keyboard_button = array( ['Button 1','Button 2'] );
$keyboard = array(
	'keyboard'			=>	$keyboard_button,
	'resize_keyboard'	=>	true,
);

if ( $text == '/start' ) 
{
	$message = "🙋🏼‍♂️ HOLA! Este bot fue creado para ayudar a grupos de clash of clans ⚔️, actualmente solo está disponible para uso privado por problemas de mantenimiento ⚙️. Si necesitas contactar con el administrador o alguna mejora que aportar, contacte con @ildenet. \n\n This bot was created to support the Clash of clans
If you need to contact the administrator or any improvements you can make, contact @ildenet.";
//	echo sendMessageWithKeyboard($chat_id,$message,$keyboard);
	echo sendMessage($chat_id,$message);
}
/*
if ( $text == 'Button 1' ) 
{
	$message = "Result From Button 1";
	echo sendMessage($chat_id,$message);
}

if ( $text == 'Button 2' ) 
{
	$message = "Result From Button 2";
	sendMessage($chat_id,$message);
}
*/
if (strpos($msg,'bot') !== false) 
{
	$message = "El bot 🤖 se encuentra actualmente en mantenimiento 🛠. Disculpe las molestias";
	echo sendMessage($chat_id,$message);
}
if (strpos($msg,'foto') !== false) 
{
	$photo = curl_file_create('/images/datos/aceleracion.png', 'image/png');
	echo sendMessage($chat_id,$photo);
}
if(strpos($text,'/links') !== false)
{
if (strpos($text,'youtu.be') !== false){$links = str_replace("/links https://youtu.be/","", $text);}
if (strpos($text,'www.youtube.com') !== false){$links = str_replace("/links https://www.youtube.com/watch?v=","", $text);}
$i = 1;
$videoid = $links;
$apikey = 'AIzaSyCMXVS-BqDSoKD5W4UhKZ9OqXV2-CrhUWk'; // change this
$json = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?id=' . $videoid . '&key=' . $apikey . '&part=snippet'),true);
$string = $json['items'][0]['snippet']['description'];
preg_match_all('#CC[^%]++[\w\--;%]++#', $string, $match); // busca castillos del clan + aldeas
if ($match[0] == false) {preg_match_all('#\bhttps?://link.clashofclans[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $string, $match);} // busca solo aldeas
foreach ($match[0] as &$valor) {

$texto = $i.". ".$valor."\n\n";
$message .= $texto;
$i++;
}
echo sendMessage($chat_id,$message);
}

?>
