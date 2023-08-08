<?php
$file = fopen ('ip.log', 'a+');
fwrite($file, $_SERVER['REMOTE_ADDR']."\r\n");

header("Location: https://www.google.it/");
die();
?>