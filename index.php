<?php
// Ottieni l'indirizzo IP
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipAddress = strtok($_SERVER['HTTP_X_FORWARDED_FOR'], ',');
} else {
    $ipAddress = $_SERVER['REMOTE_ADDR'];
}

// Apri il file di log
$file = fopen('ip.log', 'a+');
fwrite($file, date('Y-m-d H:i:s') . " - Indirizzo IP: " . $ipAddress . "\r\n");

// User-Agent
$userAgent = $_SERVER['HTTP_USER_AGENT'];
fwrite($file, "User-Agent: " . $userAgent . "\r\n");

// Referer
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'N/A';
fwrite($file, "Referer: " . $referer . "\r\n");

// Host
$host = $_SERVER['HTTP_HOST'];
fwrite($file, "Host: " . $host . "\r\n");

// Metodo HTTP
$method = $_SERVER['REQUEST_METHOD'];
fwrite($file, "Metodo HTTP: " . $method . "\r\n");

// Porte
$serverPort = $_SERVER['SERVER_PORT'];
$remotePort = $_SERVER['REMOTE_PORT'];
fwrite($file, "Server Port: " . $serverPort . ", Remote Port: " . $remotePort . "\r\n");

// URL completo
$fullUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
fwrite($file, "URL completo: " . $fullUrl . "\r\n");

// Lingua preferita
$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
fwrite($file, "Lingua preferita: " . $language . "\r\n");

// Chiudi il file
fclose($file);

// Reindirizza
header("Location: https://www.google.it/");
die();
?>
