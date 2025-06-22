<?php

$response = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'box_id' => 28,
        'offer_id' => 5,
        'countryCode' => 'GB',
        'language' => 'en',
        'password' => 'qwerty12',
        'landingUrl' => $_SERVER['HTTP_HOST'],
        'ip' => file_get_contents('https://api.ipify.org') ?: $_SERVER['REMOTE_ADDR']
    ];

    $ch = curl_init('https://crm.belmar.pro/api/v1/addlead');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'token: ba67df6a-a17c-476f-8e95-bcdb75ed3958'
        ],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data)
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);
}
