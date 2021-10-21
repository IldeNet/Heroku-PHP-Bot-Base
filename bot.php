<?php


$var = file_get_contents("php://input");
$var = json_decode($var,true);
$chat_id = $var['message']['chat']['id'];
$text = $var['message']['text'];
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
	$message = "Hi There, Welcome...";
	echo sendMessageWithKeyboard($chat_id,$message,$keyboard);
}
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

?>
