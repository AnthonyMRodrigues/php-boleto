<?php

namespace Mero\BankSlip\Model;

class Title
{
    /**
     * @var \DateTime Expire date
     */
    protected $expireDate;

    /**
     * @var float Amount
     */
    protected $amount;

    /**
     * @var string Our number
     */
    protected $ourNumber;

    /**
     * @var string Instructions
     */
    protected $instructions;

    /**
     * Title constructor.
     * @param \DateTime $expireDate Expire date
     * @param float $amount Amount
     * @param string $ourNumber Our number
     * @param string $instructions Instructions
     */
    public function __construct(\DateTime $expireDate, float $amount, string $ourNumber, string $instructions)
    {
        $this->expireDate = $expireDate;
        $this->amount = $amount;
        $this->ourNumber = $ourNumber;
        $this->instructions = $instructions;
    }

    /**
     * Return the expire date of title.
     *
     * @return \DateTime Expire date
     */
    public function getExpireDate(): \DateTime
    {
        return $this->expireDate;
    }

    /**
     * Return the amount of title.
     *
     * @return float Amount
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Return the our number of title.
     *
     * @return string Our number
     */
    public function getOurNumber(): string
    {
        return $this->ourNumber;
    }

    /**
     * Return the instructions of title.
     *
     * @return string Instructions
     */
    public function getInstructions(): string
    {
        return $this->instructions;
    }
}
