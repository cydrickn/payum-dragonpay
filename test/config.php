<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';


use Payum\Core\PayumBuilder;
use Cydrickn\DragonPay\DragonPayGatewayFactory;
use Payum\Core\Request\Capture;
use Payum\Core\Model\Payment;

$payumBuilder = new PayumBuilder();
$payumBuilder->addGatewayFactory('dragonpay', new DragonPayGatewayFactory([]));
$payumBuilder->addDefaultStorages();
$payumBuilder->addGateway('dragonpay', [
    'factory' => 'dragonpay',
    'merchantId' => '',
    'merchantPassword' => '',
    'sandbox' => true,
]);

$payum = $payumBuilder->getPayum();
$storage = $payum->getStorage(Payment::class);