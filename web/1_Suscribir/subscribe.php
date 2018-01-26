<?php

require("../phpMQTT.php");


$server = "10.1.104.22";     // change if necessary
$port = 1883;                     // change if necessary
//$username = "";                   // set your username
//$password = "";                   // set your password
$client_id = "phpMQTT-subscriber"; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if(!$mqtt->connect(true, NULL)) {
	exit(1);
}

$topics['datos'] = array("qos" => 0, "function" => "procmsg");
$mqtt->subscribe($topics, 0);

while($mqtt->proc()){
}

$mqtt->close();

function procmsg($topic, $msg){
		echo "Msg Recieved: " . date("r") . "\n";
		echo "Topic: {$topic}\n\n";
		echo "\t$msg\n\n";
// grabamos el mensaje en la base de datos
		file_get_contents( "http://127.0.0.1/web/1_Suscribir/grabaDato.php?value=$msg");
}
