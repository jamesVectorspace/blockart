<?php
// Will remove it later.

$mp3Url = $_GET['url'];

// Set the appropriate headers to allow CORS
header('Access-Control-Allow-Origin: *');
header('Content-Type: audio/mpeg');

// Proxy the request to the external server
readfile($mp3Url);
?>