<?php

namespace ADA\PurchaseBundle\BarCode;

use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use ADA\PurchaseBundle\Session\SessionManager;

class BarCodeManager
{
    private $sessionManager;

    public function __construct(SessionManager $sessionManager)
    {
        $this->sessionManager = $sessionManager;
    }

    public function getBarCode()
    {
        $text = $this->sessionManager->getSessionTicket()->getBookingCode();
        $barcode = new BarcodeGenerator();
        $barcode->setText($text);
        $barcode->setType(BarcodeGenerator::Code128);
        $barcode->setScale(2);
        $barcode->setThickness(25);
        $barcode->setFontSize(10);
        $code = $barcode->generate();

        echo '<img src="data:image/png;base64,'.$code.'" />';

    }

}