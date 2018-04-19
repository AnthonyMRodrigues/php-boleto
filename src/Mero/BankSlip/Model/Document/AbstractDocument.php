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
        $this->validate();
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
     * Validate if this document has a valid number.
     */
    abstract protected function validate();

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
