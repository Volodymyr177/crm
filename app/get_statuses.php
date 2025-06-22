<?php
$rows = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $from = str_replace('T', ' ', $_POST['date_from']);
    $to = str_replace('T', ' ', $_POST['date_to']);

    $body = [
        'date_from' => $from,
        'date_to' => $to,
        'page' => 0,
        'limit' => 100
    ];

    $ch = curl_init('https://crm.belmar.pro/api/v1/getstatuses');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'token: ba67df6a-a17c-476f-8e95-bcdb75ed3958'
        ],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($body)
    ]);
    $res = curl_exec($ch);
    curl_close($ch);

    $res = json_decode($res, true);
    if (!empty($res['data'])) {
        if (is_string($res['data'])) {
            $rows = json_decode($res['data'], true) ?: [];
        } elseif (is_array($res['data'])) {
            $rows = $res['data'];
        }
    }
}

