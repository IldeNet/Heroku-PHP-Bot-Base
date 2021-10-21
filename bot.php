<?php


$var = file_get_contents("php://input");
$var = json_decode($var,true);
$chat_id = $var['message']['chat']['id'];
$text = $var['message']['text'];
$tipochat = $var->message->chat->type;
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

$keyboard_button = array( ['Button 1','Button 2'] );
$keyboard = array(
	'keyboard'			=>	$keyboard_button,
	'resize_keyboard'	=>	true,
);

if ( $text == '/start' ) 
{
	$message = "Este bot fue creado para ayudar a grupos de clash of clans, actualmente solo está disponible para uso privado por problemas de mantenimiento. Si necesitas contactar con el administrador o alguna mejora que aportar, contacte con @ildenet. \n\n This bot was created to support the Clash of clans\n
If you need to contact the administrator or any improvements you can make, contact @ildenet.";
//	echo sendMessageWithKeyboard($chat_id,$message,$keyboard);
	echo sendMessageWithKeyboard($chat_id,$message);
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
if (strpos($text,'bot') !== false) 
{
	$message = "El bot se encuentra actualmente en mantenimiento. ";
	echo sendMessage($chat_id,$message);
}
if($tipochat == 'private')
	{
	$curl = curl_init();
	$accesstoken = "2b2a75dfdefe40afad8c0e31d2db12c2";
	$headr = array();
	$headr[] = 'Content-type: application/json';
	$header[] = 'Authorization:Bearer '.$accesstoken;
	$query = str_replace(" ","%20", $msg);
	curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.dialogflow.com/v1/query?v=20170712&query='.$query.'&lang=es&sessionId=dc25e853-d0f5-5121-2957-6cfe3e0badd3&timezone=Europe/Madrid',
    CURLOPT_HTTPHEADER => $header
	));
	$result = json_decode(curl_exec($curl));
	$message = $result->result->fulfillment->speech;
	curl_close($curl);
	echo sendMessage($chat_id,$message);
	}

?>
