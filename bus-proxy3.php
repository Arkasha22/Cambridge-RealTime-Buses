<?php
// bus-proxy.php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if (!isset($_GET['boundingBox'])) {
    http_response_code(400);
    echo json_encode(["error" => "Missing boundingBox"]);
    exit;
}

$boundingBox = urlencode($_GET['boundingBox']);
$apiKey = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';

$url = "https://data.bus-data.dft.gov.uk/api/v1/datafeed/?api_key=$apiKey&boundingBox=$boundingBox";

$response = file_get_contents($url);

if ($response === FALSE) {
    http_response_code(500);
    echo json_encode(["error" => "Failed to fetch bus data"]);
    exit;
}

echo $response;
?>

