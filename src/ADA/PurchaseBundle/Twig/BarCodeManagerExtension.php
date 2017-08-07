<?php

namespace ADA\PurchaseBundle\Twig;

use ADA\PurchaseBundle\BarCode\BarCodeManager;

class BarCodeManagerExtension extends \Twig_Extension
{
    /**
     * @var BarCodeManager
     */
    private $barCodeManager;

    public function __construct(BarCodeManager $barCodeManager)
    {
        $this->barCodeManager = $barCodeManager;
    }

    public function BarCodeGenerate()
    {
        return $this->barCodeManager->getBarCode();
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('getBarCode', array($this, 'BarCodeGenerate')),
        );
    }
    
    public function getName()
    {
        return 'BarCodeManager';
    }
}



