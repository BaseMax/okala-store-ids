<?php
set_time_limit(0);

$storeId = 2000;
$token = "Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6IjEzRjRF...";

while ($storeId < 10400) {
    $url = "https://apigateway.okala.com/api/Lucifer/v1/LegacyStores/GetStoreDetailWithoutDelivery?Latitude=35.737156785003556&longitude=51.41540956014044&StoreId=$storeId";

    $headers = [
        "Accept: application/json, text/plain, */*",
        "Accept-Language: en-US,en;q=0.5",
        "Accept-Encoding: gzip, deflate, br, zstd",
        "Referer: https://www.okala.com/",
        "X-Correlation-Id: ea733816-6500-4ba0-971a-90dda919e8c7",
        "session-id: 53e06004-666d-4ec8-9a5d-a36826ced64f",
        "idfa: null",
        "metrix_user_id: null",
        "ui-version: 2.0",
        "source: okala",
        "Origin: https://www.okala.com",
        "Sec-Fetch-Dest: empty",
        "Sec-Fetch-Mode: cors",
        "Sec-Fetch-Site: same-site",
        "advertising_id: ",
        "Authorization: $token",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200) {
        $json = json_decode($response, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $data = $json['data'] ?? [];
            if (isset($data['storeId']) && $data['storeId'] != 0) {
                file_put_contents("store-ids.txt", $data['storeId'] . PHP_EOL, FILE_APPEND | LOCK_EX);
                echo "✅ [$storeId] ذخیره شد<br>\n";
            } else {
                echo "⛔ [$storeId] نامعتبر<br>\n";
            }
        } else {
            echo "❌ [$storeId] خطای JSON: " . json_last_error_msg() . "<br>\n";
        }
    } else {
        echo "❌ [$storeId] HTTP Error: $httpCode<br>\n";
    }

    $storeId++;
    usleep(300000);
}
