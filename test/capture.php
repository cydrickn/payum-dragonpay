<?php

use Payum\Core\Request\Capture;
use Payum\Core\Reply\HttpRedirect;
use Payum\Core\Model\Token;
use Payum\Core\Gateway;

require __DIR__ . '/config.php';

/* @var $token Token */
$token = $payum->getHttpRequestVerifier()->verify($_REQUEST);
/* @var $gateway Gateway */
$gateway = $payum->getGateway($token->getGatewayName());

try {
    $gateway->execute(new Capture($token));
} catch (Payum\Core\Reply\HttpResponse $e) {
    
}