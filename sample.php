<?php

require_once(__DIR__ . "/vendor/autoload.php");

use Pixelbin\Platform\PixelbinClient;
use Pixelbin\Platform\PixelbinConfig;

$config = new PixelbinConfig([
    "domain" => "https://api.pixelbin.io",
    "apiSecret" => "API_TOKEN",
]);

$pixelbin = new PixelbinClient($config);

// Sync method call
try {
    $result = $pixelbin->assets->fileUpload(file: fopen(__DIR__ . "/1.jpeg", "r"));
    #use result
    print_r($result);
} catch (Exception $e) {
    print_r($e->getMessage());
}

// Async method call
try {
    $result = $pixelbin->assets->fileUploadAsync(
        file: fopen(__DIR__ . "/1.jpeg", "r"),
        path: "testdir/"
    );
    // use result
    print_r($result);
} catch (Exception $e) {
    print_r($e->getMessage());
}
