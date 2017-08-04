<?php

namespace ADA\PurchaseBundle\BarCode;

use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

class BarCodeManager
{

    public function getBarCode()
    {
        $text = uniqid();
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