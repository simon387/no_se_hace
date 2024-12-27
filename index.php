<?php
// Verifica se l'intestazione X-Forwarded-For è presente
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	// Se presente, prendi il primo IP (nel caso di più proxy)
	$ipAddress = strtok($_SERVER['HTTP_X_FORWARDED_FOR'], ',');
} else {
	// Altrimenti prendi l'IP direttamente da REMOTE_ADDR
	$ipAddress = $_SERVER['REMOTE_ADDR'];
}

// Visualizza l'indirizzo IP
// echo "L'indirizzo IP del client è: " . $ipAddress;


$file = fopen('ip.log', 'a+');
fwrite($file, $ipAddress . "\r\n");

header("Location: https://www.google.it/");
die();
