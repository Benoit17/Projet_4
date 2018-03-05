<?php

namespace ADA\PurchaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Ticket
 *
 * @ORM\Table(name="ada_ticket")
 * @ORM\Entity(repositoryClass="ADA\PurchaseBundle\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\ManyToMany(targetEntity="ADA\PurchaseBundle\Entity\Customer", cascade={"persist"})
     * @ORM\JoinTable(name="ada_ticket_customer")
     */
    private $customers;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     *
     * @Assert\NotBlank(
     *     message = "form.empty"
     * )
     * * @Assert\Date(
     *     message = "form.date"
     * )
     * 
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="type", type="boolean")
     *
     * @Assert\NotNull(
     *     message = "form.type"
     * )
     * 
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     *
     * @Assert\NotBlank(
     *     message = "form.empty"
     * )
     * @Assert\Range(
     *     min = 1,
     *     max = 10,
     *     minMessage = "form.number",
     *     maxMessage = "form.number"
     * )
     *
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     *
     * @Assert\NotBlank(
     *     message = "form.empty"
     * )
     * @Assert\Email(
     *     message = "form.mail",
     *     checkMX = true
     * )
     *
     */
    private $email;

    /**
     * @var decimal
     *
     * @ORM\Column(name="total_price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $totalPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="booking_code", type="string", nullable=true)
     */
    private $bookingCode;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Ticket
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return Ticket
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return bool
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Ticket
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set emailConfirm
     *
     * @param string $em
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customers = new ArrayCollection();
    }

    /**
     * Add customer
     *
     * @param Customer $customer
     *
     * @return Ticket
     */
    public function addCustomer(Customer $customer)
    {
        $this->customers[] = $customer;

        return $this;
    }

    /**
     * Remove customer
     *
     * @param \ADA\PurchaseBundle\Entity\Customer $customer
     */
    public function removeCustomer(Customer $customer)
    {
        $this->customers->removeElement($customer);
    }

    /**
     * Get customers
     * @Assert\Valid()
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * Set totalPrice
     *
     * @param string $totalPrice
     *
     * @return Ticket
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get totalPrice
     *
     * @return string
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set bookingCode
     *
     * @param string $bookingCode
     *
     * @return Ticket
     */
    public function setBookingCode($bookingCode)
    {
        $this->bookingCode = $bookingCode;

        return $this;
    }

    /**
     * Get bookingCode
     *
     * @return string
     */
    public function getBookingCode()
    {
        return $this->bookingCode;
    }
}
