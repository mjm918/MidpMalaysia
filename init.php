<?php
require __DIR__.'./PayPal-PHP-SDK/autoload.php';
include "DBHandler/config.php";
session_start();
//API
$api = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AYFw3hSZyoHRGRo-8wxBhEt7_0U9dZ6RYJ-dhOuljDLIfv-x04XvIdnc4pVwtDtrrCqB2zRvlseLLhMN',
        'EEafZboWf23RekIw6CO3bNBpVFsfyk9BR4gUXjpYORxoURZbSy68eANd1TLEhTt3Cv3S70XMUWrXg3X7'
    )
);
$api->setConfig([
    'mode'=>'sandbox',
    'http.ConnectionTimeOut'=>30,
    'log.LogEnabled'=>false,
    'log.FileName'=>'',
    'log.LogLevel'=>'FINE',
    'validation.level'=>'log'
]);
?>