<?php

namespace Mero\BankSlip\Model;

class BankSlip
{
    /**
     * @var int Bank number
     */
    protected $bankNumber;

    /**
     * @var Title Title information
     */
    protected $title;

    /**
     * @var Agent Buyer information
     */
    protected $buyer;

    /**
     * @var Agent Recipient information
     */
    protected $recipient;

    /**
     * @var string Bar code
     */
    protected $barCode;

    /**
     * @var string Digitable line
     */
    protected $digitableLine;

    /**
     * Return the bank number.
     *
     * @return int Bank number
     */
    public function getBankNumber(): int
    {
        return $this->bankNumber;
    }

    /**
     * Define the bank number.
     *
     * @param int $bankNumber Bank number
     *
     * @return BankSlip
     */
    public function setBankNumber(int $bankNumber): BankSlip
    {
        $this->bankNumber = $bankNumber;
        return $this;
    }

    /**
     * Return the title information.
     *
     * @return Title Title
     */
    public function getTitle(): Title
    {
        return $this->title;
    }

    /**
     * Define the title information.
     *
     * @param Title $title Title
     *
     * @return BankSlip
     */
    public function setTitle(Title $title): BankSlip
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Return the buyer information.
     *
     * @return Agent Buyer
     */
    public function getBuyer(): Agent
    {
        return $this->buyer;
    }

    /**
     * Define the buyer information.
     *
     * @param Agent $buyer Buyer
     *
     * @return BankSlip
     */
    public function setBuyer(Agent $buyer): BankSlip
    {
        $this->buyer = $buyer;
        return $this;
    }

    /**
     * Return the recipient information.
     *
     * @return Agent Recipient
     */
    public function getRecipient(): Agent
    {
        return $this->recipient;
    }

    /**
     * Define the recipient information.
     *
     * @param Agent $recipient Recipient
     *
     * @return BankSlip
     */
    public function setRecipient(Agent $recipient): BankSlip
    {
        $this->recipient = $recipient;
        return $this;
    }

    /**
     * Return the bar code.
     *
     * @return string Bar code
     */
    public function getBarCode(): string
    {
        return $this->barCode;
    }

    /**
     * Define the bar code.
     *
     * @param string $barCode Bar code
     *
     * @return BankSlip
     */
    public function setBarCode(string $barCode): BankSlip
    {
        $this->barCode = $barCode;
        return $this;
    }

    /**
     * Return the digitable line.
     *
     * @return string Digitable line
     */
    public function getDigitableLine(): string
    {
        return $this->digitableLine;
    }

    /**
     * Define the digitable line.
     *
     * @param string $digitableLine Digitable line
     *
     * @return BankSlip
     */
    public function setDigitableLine(string $digitableLine): BankSlip
    {
        $this->digitableLine = $digitableLine;
        return $this;
    }
}
