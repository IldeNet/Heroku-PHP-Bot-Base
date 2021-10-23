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
$urlweb = 'https://bot-telegram-php.herokuapp.com';
$apisc = 'authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImRlYjc3YmI5LTRkNmYtNDc2MS05YWFjLTQyOGJhNDZhOWZkZiIsImlhdCI6MTYzNTAyNzg4OSwic3ViIjoiZGV2ZWxvcGVyLzQ5NzIyODY1LWEwMGMtYjU2ZC04NjhhLWZhYjUzZGMyNjgwNSIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjUyLjE4LjgwLjQ4Il0sInR5cGUiOiJjbGllbnQifV19.U4iJRH1W93L9FDO4kyqwo-eYpyh7VvUej1qKqBAxh1R9LiLr95chWTcGrzZ6TSkKlEhTXBGKKvK-oJleTSvgiw';

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
function sendMessageHTML($chat_id,$text)
{
	global $token;
    $api    = "https://api.telegram.org/bot$token/";
    $method = "sendMessage";
    $params = "?chat_id=$chat_id&text=" . urlencode($text)."&parse_mode=html";
  
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
function sendPhoto($chat_id,$text)
{
	global $token;
    $api    = "https://api.telegram.org/bot$token/";
    $method = "sendPhoto";
    $params = "?chat_id=$chat_id&photo=" .urlencode($text);
  
  	$url = $api . $method . $params;
    $result = file_get_contents($url);
  	return $result;
}

if ( $text == '/start' ) 
{
	$message = "🙋🏼‍♂️ HOLA!!! Este bot fue creado para ayudar a grupos de clash of clans ⚔️, actualmente solo está disponible para uso privado por problemas de mantenimiento ⚙️. Si necesitas contactar con el administrador o alguna mejora que aportar, contacte con @ildenet. \n\n This bot was created to support the Clash of clans
If you need to contact the administrator or any improvements you can make, contact @ildenet.";
	echo sendMessage($chat_id,$message);
}
if ( $text == 'version' ) 
{
	$message = "Version 2.2 alojado en Heroku";
	echo sendMessage($chat_id,$message);
}
if (strpos($msg,'bot') !== false) 
{
	$message = "El bot 🤖 se encuentra actualmente en mantenimiento 🛠. Disculpe las molestias";
	echo sendMessage($chat_id,$message);
}
// DATOS EN IMAGENES
if (strpos($msg,'foto') !== false) 
{
	$photo = $urlweb."/images/datos/aceleracion.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'aceleracion')
{		
$photo = $urlweb."/images/datos/aceleracion.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'aguila')
{	
$photo = $urlweb."/images/datos/aguila.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'almacen elixir' || $msg == 'almacen de elixir')
{	
$photo = $urlweb."/images/datos/almacen elixir.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'almacen oro' || $msg == 'almacen de oro')
{	
$photo = $urlweb."/images/datos/almacen oro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'almacen oscuro' || $msg == 'almacen de oscuro')
{	
$photo = $urlweb."/images/datos/almacen oscuro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'antiaereo' || $msg == 'antiaerea')
{	
$photo = $urlweb."/images/datos/antiaerea.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'arquera' || $msg == 'arqueras')
{	
$photo = $urlweb."/images/datos/arquera.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'arrojapiedras')
{	
$photo = $urlweb."/images/datos/arrojapiedras.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'ayuntamiento')
{	
$photo = $urlweb."/images/datos/ayuntamiento.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'ballesta')
{	
$photo = $urlweb."/images/datos/ballesta.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'barbaro' ||$msg == 'barbaros')
{	
$photo = $urlweb."/images/datos/barbaro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'bebe dragon')
{	
$photo = $urlweb."/images/datos/bebe dragon.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'bomba')
{	
$photo = $urlweb."/images/datos/bomba.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'bomba aerea')
{	
$photo = $urlweb."/images/datos/bomba aerea.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'bruja' || $msg == 'brujas')
{	
$photo = $urlweb."/images/datos/bruja.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'cañon')
{	
$photo = $urlweb."/images/datos/canon.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'caldero')
{	
$photo = $urlweb."/images/datos/caldero.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'caldero oscuro')
{	
$photo = $urlweb."/images/datos/caldero oscuro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'campamento' || $msg == 'campamentos')
{	
$photo = $urlweb."/images/datos/campamento.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'castillo' || $msg == 'castillo del clan')
{	
$photo = $urlweb."/images/datos/castillo.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'catapulta')
{	
$photo = $urlweb."/images/datos/catapulta.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'cazadora' || $msg == 'cazadora de heroes')
{	
$photo = $urlweb."/images/datos/cazadora.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'clonacion')
{	
$photo = $urlweb."/images/datos/clonacion.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'cuartel' || $msg == 'cuarteles')
{	
$photo = $urlweb."/images/datos/cuartel.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'cuartel asedio')
{	
$photo = $urlweb."/images/datos/cuartel de asedio.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'cuartel oscuro')
{	
$photo = $urlweb."/images/datos/cuartel oscuro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'curacion')
{	
$photo = $urlweb."/images/datos/cura.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'destrozamuros')
{	
$photo = $urlweb."/images/datos/destrozamuros.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'dirigible')
{			
$photo = $urlweb."/images/datos/dirigible.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'dragon')
{	
$photo = $urlweb."/images/datos/dragon.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'dragon electrico')
{	
$photo = $urlweb."/images/datos/dragon electrico.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'duende')
{	
$photo = $urlweb."/images/datos/duende.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'duende furtivo')
{	
$photo = $urlweb."/images/datos/duendefurtivo.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'dragon infernal')
{	
$photo = $urlweb."/images/datos/dragoninfernal.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'esbirro' || $msg == 'esbirros')
{	
$photo = $urlweb."/images/datos/esbirro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'esqueletos')
{	
$photo = $urlweb."/images/datos/esqueletos.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'explosivo')
{	
$photo = $urlweb."/images/datos/explosivos.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'mina oro' || $msg == 'mina de oro')
{	
$photo = $urlweb."/images/datos/extractor oro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'extractor oscuro' || $msg == 'extractor de oscuro')
{	
$photo = $urlweb."/images/datos/extractor oscuro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'furia')
{	
$photo = $urlweb."/images/datos/furia.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'gigante' || $msg == 'gigantes')
{	
$photo = $urlweb."/images/datos/gigante.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'giga inferno')
{	
$photo = $urlweb."/images/datos/gigainferno.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'giga tesla')
{	
$photo = $urlweb."/images/datos/gigatesla.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'globo' || $msg == 'globos')
{	
$photo = $urlweb."/images/datos/globo.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'golem')
{
	
$photo = $urlweb."/images/datos/golem.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'golem hielo' || $msg == 'golem de hielo')
{
	
$photo = $urlweb."/images/datos/golem hielo.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'gran centinela' || $msg == 'guardian' || $msg == 'centinela')
{
	
$photo = $urlweb."/images/datos/centinela.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'hielo')
{
	
$photo = $urlweb."/images/datos/hielo.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'invisibilidad' || $msg == 'pocion invisible' || $msg == 'hechizo invisibilidad')
{
	
$photo = $urlweb."/images/datos/invisibilidad.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'laboratorio')
{
	
$photo = $urlweb."/images/datos/laboratorio.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'lanzarrocas')
{
	
$photo = $urlweb."/images/datos/lanzarrocas.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'lanzatroncos')
{
	
$photo = $urlweb."/images/datos/lanzatroncos.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'liga')
{
	
$photo = $urlweb."/images/datos/cwl.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'luchadora')
{
	
$photo = $urlweb."/images/datos/luchadora_real.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'mago' || $msg == 'magos')
{
	
$photo = $urlweb."/images/datos/mago.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'mina rastreo')
{
	
$photo = $urlweb."/images/datos/mina rastreo.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'minero' || $msg == 'mineros')
{
	
$photo = $urlweb."/images/datos/minero.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'montapuerco' || $msg == 'montapuercos')
{
	
$photo = $urlweb."/images/datos/montapuerco.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'mortero')
{
	
$photo = $urlweb."/images/datos/mortero.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'trampa muelle')
{
	
$photo = $urlweb."/images/datos/muelle.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'mercader' || $msg == 'mercado' || $msg == 'descuentos' || $msg == 'descuentos diarios')
{
	
$photo = $urlweb."/images/datos/descuentos.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'murcielagos')
{
	
$photo = $urlweb."/images/datos/murcielagos.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'muro' || $msg == 'muros')
{
	
$photo = $urlweb."/images/datos/muro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'pekka')
{
	
$photo = $urlweb."/images/datos/pekka.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'rayo')
{
	
$photo = $urlweb."/images/datos/rayo.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'recolector elixir' || $msg == 'recolector de elixir')
{
	
$photo = $urlweb."/images/datos/recolector elixir.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'reina arquera' || $msg == 'reina')
{
	
$photo = $urlweb."/images/datos/Reina Arquera.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'rey barbaro' || $msg == 'rey')
{
	
$photo = $urlweb."/images/datos/Rey Barbaro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'rompemuro' || $msg == 'rompemuros')
{
	
$photo = $urlweb."/images/datos/rompemuro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'sabueso')
{
	
$photo = $urlweb."/images/datos/sabueso.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'salto')
{
	
$photo = $urlweb."/images/datos/salto.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'sanadora' || $msg == 'sanadoras')
{
	
$photo = $urlweb."/images/datos/sanadora.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'soplador')
{
	
$photo = $urlweb."/images/datos/soplador.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'super arquera')
{
	
$photo = $urlweb."/images/datos/superarquera.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'super barbaro')
{
	
$photo = $urlweb."/images/datos/superbarbaro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'super bruja')
{
	
$photo = $urlweb."/images/datos/superbruja.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'super esbirro')
{
	
$photo = $urlweb."/images/datos/superesbirro.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'super gigante')
{
	
$photo = $urlweb."/images/datos/supergigante.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'super rompemuros')
{
	
$photo = $urlweb."/images/datos/superrompemuros.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'super valquiria')
{
	
$photo = $urlweb."/images/datos/supervalquiria.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'taller' || $msg == 'talleres')
{
	
$photo = $urlweb."/images/datos/taller.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'terremoto')
{
	
$photo = $urlweb."/images/datos/terremoto.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'tesla')
{
	
$photo = $urlweb."/images/datos/tesla.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'tienda')
{
	
$photo = $urlweb."/images/datos/tienda.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'tornado')
{
	
$photo = $urlweb."/images/datos/tornado.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'torre arquera' || $msg == 'torre de arquera' || $msg == 'torre de arqueras' || $msg == 'torre arqueras')
{
	
$photo = $urlweb."/images/datos/torre arquera.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'torre bombardera')
{
	
$photo = $urlweb."/images/datos/torre bombardera.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'torre inferno' || $msg == 'torre infierno')
{
	
$photo = $urlweb."/images/datos/torre inferno.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'torre magos' || $msg == 'torre mago' || $msg == 'torre de magos' || $msg == 'torre de mago')
{
	
$photo = $urlweb."/images/datos/torre magos.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'trampa esqueletos')
{
	
$photo = $urlweb."/images/datos/trampa esqueletos.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'valkiria' || $msg == 'valquiria' || $msg == 'valquirias')
{
	
$photo = $urlweb."/images/datos/valkiria.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'veneno')
{
	
$photo = $urlweb."/images/datos/veneno.png";
	echo sendPhoto($chat_id,$photo);
}
else if($msg == 'yeti')
{
	
$photo = $urlweb."/images/datos/yeti.png";
	echo sendPhoto($chat_id,$photo);
}
// ESCANER BASES VIDEOS YOUTUBE 
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
// USO DE API DESHABILITADO POR IP DINAMICA
// USANDO API CLASH OF CLANS
if($msg == 'top')
{
$message = "Opción deshabilitada a uso público.";
echo sendMessageHTML($chat_id,$message);
/*
$ch = curl_init();
        $headerArray = array (
            'Accept: application/json', $apisc
        );
        curl_setopt($ch, CURLOPT_URL, "https://api.clashofclans.com/v1/locations/32000218/rankings/clans?limit=10");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
        $result = curl_exec($ch);
        if(!curl_errno($ch) && !empty($result)) {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if($httpCode !== 200) echo json_encode($error);
            //else echo $result;
        } else echo json_encode($error);
		$data = json_decode($result, true);
		curl_close($ch);
		$message = "<b>Los 10 mejores clanes de España:</b>\n".$data['items'][0]['rank']." -- ".$data['items'][0]['name']." -- ".$data['items'][0]['clanPoints']."\n".$data['items'][1]['rank']." -- ".$data['items'][1]['name']." -- ".$data['items'][1]['clanPoints']."\n".$data['items'][2]['rank']." -- ".$data['items'][2]['name']." -- ".$data['items'][2]['clanPoints']."\n".$data['items'][3]['rank']." -- ".$data['items'][3]['name']." -- ".$data['items'][3]['clanPoints']."\n".$data['items'][4]['rank']." -- ".$data['items'][4]['name']." -- ".$data['items'][4]['clanPoints']."\n".$data['items'][5]['rank']." -- ".$data['items'][5]['name']." -- ".$data['items'][5]['clanPoints']."\n".$data['items'][6]['rank']." -- ".$data['items'][6]['name']." -- ".$data['items'][6]['clanPoints']."\n".$data['items'][7]['rank']." -- ".$data['items'][7]['name']." -- ".$data['items'][7]['clanPoints']."\n".$data['items'][8]['rank']." -- ".$data['items'][8]['name']." -- ".$data['items'][8]['clanPoints']."\n".$data['items'][9]['rank']." -- ".$data['items'][9]['name']." -- ".$data['items'][9]['clanPoints']."\n";
		echo sendMessageHTML($chat_id,$message);
*/
}
// JUGADOR API
if(strpos($text,'OpenPlayerProfile&tag=') !== false)
{
$comando = explode("=", $text);
$tag = "#".$comando[2];
$tag = urlencode($tag);
goto jugador;
}	
if(strpos($msg,'/jugador') !== false)
{
$tag = str_replace("/jugador ","", $text);
        if($tag[0] === '#') $tag = urlencode($tag);
		jugador:
$message = "Opción deshabilitada a uso público.";
echo sendMessageHTML($chat_id,$message);
/****************************************
        $ch = curl_init();
        $headerArray = array (
            'Accept: application/json', $apisc
        );
        curl_setopt($ch, CURLOPT_URL, "https://api.clashofclans.com/v1/players/".$tag);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
        $result = curl_exec($ch);
        if(!curl_errno($ch) && !empty($result)) {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if($httpCode !== 200) $response = $client->sendMessage(['chat_id' => $update->message->chat->id,	'text' => "Jugador no encontrado" ,'reply_to_message_id'=>$reply ]);
            else {
				$data = json_decode($result, true);
				if($data['heroes'][3]['level'] < 1) {$centinela = " ";	$maquina = $data['heroes'][2]['level'];	}
				else {	$centinela = $data['heroes'][2]['level'];	$maquina = $data['heroes'][3]['level'];	}
				if($data['heroes'][4]['level'] < 1) {$luchadora = " ";	}
				else {	$luchadora = $data['heroes'][4]['level'];	}
				if($data['townHallLevel'] <= 6){$Re=" ";$Ra=" "; $Gu=" "; $Lu=" ";} 
				if($data['townHallLevel'] == 7){$Re="/ 5";$Ra=" "; $Gu=" "; $Lu=" ";}
				if($data['townHallLevel'] == 8){$Re="/ 10";$Ra=" "; $Gu=" "; $Lu=" ";}
				if($data['townHallLevel'] == 9){$Re="/ 30";$Ra="/ 30"; $Gu=" "; $Lu=" ";}
				if($data['townHallLevel'] == 10){$Re="/ 40";$Ra="/ 40"; $Gu=" "; $Lu=" ";}
				if($data['townHallLevel'] == 11){$Re="/ 50";$Ra="/ 50"; $Gu="/ 20"; $Lu=" ";}
				if($data['townHallLevel'] == 12){$Re="/ 65";$Ra="/ 65"; $Gu="/ 40"; $Lu=" ";}
				if($data['townHallLevel'] == 13){$Re="/ 75";$Ra="/ 75"; $Gu="/ 50"; $Lu="/ 25";}
				if($data['townHallLevel'] == 14){$Re="/ 80";$Ra="/ 80"; $Gu="/ 55"; $Lu="/ 30";}
				if($data['builderHallLevel'] <= 4){$Mb=" ";} 
				if($data['builderHallLevel'] == 5){$Mb="/ 5";}
				if($data['builderHallLevel'] == 6){$Mb="/ 10";}
				if($data['builderHallLevel'] == 7){$Mb="/ 20";}
				if($data['builderHallLevel'] == 8){$Mb="/ 25";}
				if($data['builderHallLevel'] == 9){$Mb="/ 30";}				
				$urluser = 'https://link.clashofclans.com/?action=OpenPlayerProfile&tag='.urldecode($tag);
				if ($data['role'] == "leader"){$rol = "Líder";}
				if ($data['role'] == "coLeader"){$rol = "Colíder";}
				if ($data['role'] == "admin"){$rol = "Veterano";}
				if ($data['role'] == "member"){$rol = "Miembro";}
				foreach($data['achievements'] as $datos) {
				if ($datos['name'] == "Friend in Need") {$totaldonaciones = number_format($datos['value'], 0, ',', '.');}}
				$message = "🔍 Nombre: ".$data['name'] ."\n🏘 Clan: ".$data ['clan']['name']."\n📊 Nivel: ".$data ['clan']['clanLevel']."\n🎓 Rol: ".$rol."\n🔰 Exp: ".$data['expLevel']."\n👥 Tropas: 📤 ". $data ['donations']." 📥 ".$data ['donationsReceived']."\n📦 Donaciones totales:  ".$totaldonaciones."\n🏠 Ayuntamiento: ".$data['townHallLevel']."\n☁️ Liga: ".$data['league']['name']."\n🏆 Trofeos: ".$data['trophies']."\n🏆 Record: ".$data['bestTrophies']."\n⭐️ Estrellas guerra: ".$data['warStars']."\n⚔️ Ataques ganados: ".$data['attackWins']."\n🎉 Defensas ganadas: ".$data['defenseWins']."\n\n🤴 Rey: ".$data['heroes'][0]['level']." ".$Re."\n👸 Reina: ".$data['heroes'][1]['level']." ".$Ra."\n🧙 Centinela: ".$centinela." ".$Gu."\n🧝 Luchadora: ".$luchadora." ".$Lu."\n\n🏠 Aldea nocturna: ".$data['builderHallLevel']."\n🏆 Trofeos: ".$data['versusTrophies']."\n🏆 Record: ".$data['bestVersusTrophies']."\n⚔️ Ataques ganados: ".$data['versusBattleWins']."\n👨‍🚀 Máquina Bélica: ".$maquina." ".$Mb."\n".$urluser;
				echo sendMessageHTML($chat_id,$message);
				
				
}}
*/
}
// CLAN API 
if(strpos($text,'OpenClanProfile&tag=') !== false)
{
$comando = explode("=", $text);
$tag = "#".$comando[2];
$tag = urlencode($tag);
goto clan; 
}

if(strpos($msg,'/clan') !== false)
{
$tag = str_replace("/clan ","", $text);
    if($tag[0] === '#') $tag = urlencode($tag);
clan:
$message = "Opción deshabilitada a uso público.";
echo sendMessageHTML($chat_id,$message);
/***********************************************
	$ch = curl_init();
        $headerArray = array (
            'Accept: application/json', $apisc
        );
        curl_setopt($ch, CURLOPT_URL, "https://api.clashofclans.com/v1/clans/".$tag);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
        $result = curl_exec($ch);
        if(!curl_errno($ch) && !empty($result)) {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if($httpCode !== 200) {
				if($httpCode == 503) {$message = "Servidores en mantenimiento"; echo sendMessage($chat_id,$message);}
			else {$message ="clan no encontrado" ; echo sendMessage($chat_id,$message);}}
		
        else{			
		echo sendMessageHTML($chat_id,$result);
		$data = json_decode($result, true);
		$CWL = str_replace("League","", $data['warLeague']['name']);
		$urlclan = "https://link.clashofclans.com/?action=OpenClanProfile&tag=".urldecode($tag);
		$photo = $data['badgeUrls']['medium'];
		$message = "🔍 Nombre: ".$data["name"]."\n📜 Descripción: ".$data["description"]."\n📊 Nivel: ".$data["clanLevel"]."\n🏆 Trofeos: ".$data["clanPoints"]."\n🌎 Localización: ".$data["location"]["name"]."\n⭐️ Guerras ganadas: ".$data["warWins"]."\n🎉 Racha Victorias: ".$data ['warWinStreak']."\n🎖 Rango CWL: ".$CWL."\n⚔️ Miembros: ".$data ['members']."/50\n".$urlclan;
		echo sendPhoto($chat_id,$photo);
		echo sendMessageHTML($chat_id,$message);
}}

}
// BASES DE CLASHCHAMP
if($msg == 'base th14' || $msg == 'base th13' || $msg == 'base th12' || $msg == 'base th11' || $msg == 'base th10' || $msg == 'base th9' || $msg == 'base th8')
		{
		$base = str_replace("base th","", $msg);
		include('simple_html_dom.php');
		$url = 'https://www.clashchamps.com/i-need-a-base/?search_keyword=&search_village=0&search_player_townhalls='.$base.'&base_type=0&order_by=1&search_result_size=5';
		$html = file_get_html($url);
		foreach($html->find('img[style=overflow:hidden;height:240px;object-fit:contain;border-radius:10px;][src^=https://www.clashchamps.com]') as $e)
		echo $e->src . '<br>';
		foreach($html->find('img[style=overflow:hidden;height:240px;object-fit:contain;border-radius:10px;][src^=https://www.clashchamps.com]') as $e)
		echo $e->outertext . '<br>';

		$i=1;
		$ii=1;
		foreach ($html->find('div[id=searchResults]') as $e0) {
		foreach($e0->find('a[data-rel=lightbox-1]',1)->find('img[src^=https://www.clashchamps.com]') as $e1) {
		${"img".$i} = $e1->src;
		$i++;}
		foreach($e0->find('a[href*=OpenLayout]') as $e2) {
		${"link".$ii} = $e2->href;
		$ii++;}
		}
		$photo = $img1; $message = $link1;
		echo sendPhoto($chat_id,$photo);
		echo sendMessageHTML($chat_id,$message);
		$photo = $img2; $message = $link2;
		echo sendPhoto($chat_id,$photo);
		echo sendMessageHTML($chat_id,$message);
		$photo = $img3; $message = $link3;
		echo sendPhoto($chat_id,$photo);
		echo sendMessageHTML($chat_id,$message);
		$photo = $img4; $message = $link4;
		echo sendPhoto($chat_id,$photo);
		echo sendMessageHTML($chat_id,$message);
		$photo = $img5; $message = $link5;
		echo sendPhoto($chat_id,$photo);
		echo sendMessageHTML($chat_id,$message);		
		}
// CODIGO ALMACENADO
/*

$keyboard_button = array( ['Button 1','Button 2'] );
$keyboard = array(
	'keyboard'			=>	$keyboard_button,
	'resize_keyboard'	=>	true,
);


if ( $text == '/start' ) 
{
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
*/
?>
