<?php
require __DIR__ . '/vendor/autoload.php';

use Endroid\QrCode\QrCode;

$qrCode = new QrCode('Me encanta codigonaranja.com');

header('Content-Type: '.$qrCode->getContentType());
echo $qrCode->writeString();

?>