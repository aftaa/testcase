<?php

namespace back;

const URL = 'https://www.cbr-xml-daily.ru/daily_json.js';

$inputJson = file_get_contents(URL);
$inputJson = json_decode($inputJson);


$currencies = $inputJson->Valute;

$outputJson = (object)[
    'header' => [
        'id',
        'name',
    ],
    'data'   => [

    ],
];

foreach ($currencies as $currency) {
    $outputJson->data[] = [
        $currency->NumCode,
        $currency->Name,
    ];
}

$outputJson = json_encode($outputJson, JSON_UNESCAPED_UNICODE);

echo $outputJson;
