<?php

use Payum\Core\Model\Payment;

require __DIR__ . '/config.php';

/* @var $payment Payment */
$payment = $storage->create();
$payment->setNumber('000001');
$payment->setTotalAmount('100.00');
$payment->setCurrencyCode('PHP');
$payment->setDescription('My order description');
$payment->setClientEmail('cydrick.dev@gmail.com');

$storage->update($payment);

$captureToken = $payum->getTokenFactory()->createCaptureToken('dragonpay', $payment, 'done.php');

header("Location: " . $captureToken->getTargetUrl());