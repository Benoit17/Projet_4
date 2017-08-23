<?php
namespace Tests\ADA\PurchaseBundle\Entity;

use ADA\PurchaseBundle\Entity\Customer;
use PHPUnit\Framework\TestCase;


class CustomerTest extends TestCase
{
    public function testGetAge()
    {
        $age = New Customer();
        $age->getBirthDate(new \DateTime("1989/03/19"));
        $result = $age->getAge();

        $this->assertEquals(28, $result);
    }
}