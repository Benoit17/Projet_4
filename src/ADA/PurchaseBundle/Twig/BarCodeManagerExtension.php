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

    // Twig va exécuter cette méthode pour savoir quelle(s) fonction(s) ajoute notre service
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('getBarCode', array($this, 'BarCodeGenerate')),
        );
    }

    // La méthode getName() identifie votre extension Twig, elle est obligatoire
    public function getName()
    {
        return 'BarCodeManager';
    }
}



