<?php
$apiKey = 'xai-....'; // API KEY
$url = 'https://api.x.ai/v1/completions'; // ENDPOINT
$question = "hey grok how are u ?";
$data = [
    'prompt' => $question,
    'model' => 'grok-beta',
    'max_tokens' => 10000,
    'temperature' => 0
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $apiKey,
    'Content-Type: application/json'
]);

$response = curl_exec($ch);

if ($response === false) {
    //echo 'Curl error: ' . curl_error($ch);
} else {
  //  echo $response; 
}

curl_close($ch);


$article = json_decode($response,1);
$article = $article["choices"][0]["text"];
echo $article;
