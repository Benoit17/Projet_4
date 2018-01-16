<?php

namespace ADA\PurchaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Customer
 *
 * @ORM\Table(name="ada_customer")
 * @ORM\Entity(repositoryClass="ADA\PurchaseBundle\Repository\CustomerRepository")
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Assert\NotBlank(
     *     message = "form.empty"
     * )
     * 
     * @Assert\Length(
     *      min = 2,
     *      minMessage ="form.nameMin"
     * )
     *
     * @Assert\Regex(
     *     pattern = "/\d/",
     *     match = false,
     *     message = "form.nameNumber"
     * )
     *
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     *
     * @Assert\NotBlank(
     *     message = "form.empty"
     * )
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "form.firstnameMin"
     * )
     * @Assert\Regex(
     *     pattern = "/\d/",
     *     match = false,
     *     message = "form.firstnameNumber"
     * )
     * 
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     *
     * @Assert\NotBlank(
     *     message = "form.empty"
     * )
     *
     */
    private $country;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="date")
     *
     * @Assert\NotBlank(
     *     message = "form.empty"
     * )
     * 
     */
    private $birthDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="reduce", type="boolean")
     * 
     */
    private $reduce;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firsName
     *
     * @param string $firstName
     *
     * @return Customer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Customer
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Customer
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set reduce
     *
     * @param boolean $reduce
     *
     * @return Customer
     */
    public function setReduce($reduce)
    {
        $this->reduce = $reduce;

        return $this;
    }

    /**
     * Get reduce
     *
     * @return bool
     */
    public function getReduce()
    {
        return $this->reduce;
    }

    public function getAge()
    {
        $age = $this->getBirthDate()->diff(new \DateTime());

        return $age->y;
    }

    public function getPrice()
    {
        if ($this->getReduce() === true)
        {
            return $price = 10;
        }
        elseif ($this->getAge() < 4)
        {
            return $price = 0;
        }
        elseif ($this->getAge() >= 4 AND $this->getAge() < 12)
        {
            return $price = 8;
        }
        elseif ($this->getAge() >= 12 AND $this->getAge() < 60)
        {
            return $price = 16;
        }
         elseif ($this->getAge() > 60)
        {
            return $price = 12;
        }
    }
}
