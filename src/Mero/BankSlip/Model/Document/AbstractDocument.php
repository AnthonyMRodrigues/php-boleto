<?php

namespace Mero\BankSlip\Model\Document;

abstract class AbstractDocument
{
    /**
     * @var string Number
     */
    protected $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * Return the number of document.
     *
     * @return string Number
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * Define the number of document.
     *
     * @param string $number Number
     *
     * @return AbstractDocument
     */
    public function setNumber(string $number): AbstractDocument
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Validate if this document has a valid number.
     *
     * @return bool
     */
    abstract public function validate(): bool;

    /**
     * Return the formatted number of document.
     *
     * @return string Formatted document number
     */
    abstract public function getFormattedNumber(): string;

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getFormattedNumber();
    }


}