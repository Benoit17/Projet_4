<?php


namespace ADA\PurchaseBundle\Age;

use Symfony\Component\Validator\Constraints\DateTime;

class GetAge
{
    public function getAge(\DateTime $date)
    {
        $age = $date->diff(new \DateTime());
        return $age->y;
    }
}