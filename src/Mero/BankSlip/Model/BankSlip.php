<?php

namespace Mero\BankSlip\Model;

class BankSlip
{
    /**
     * @var int Bank number
     */
    protected $bankNumber;

    /**
     * @var Agreement Agreement information
     */
    protected $agreement;

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
     * BankSlip constructor.
     * @param int $bankNumber
     * @param Agreement $agreement
     * @param Title $title
     * @param Agent $buyer
     * @param Agent $recipient
     * @param string $barCode
     * @param string $digitableLine
     */
    public function __construct(
        int $bankNumber,
        Agreement $agreement,
        Title $title,
        Agent $buyer,
        Agent $recipient,
        string $barCode,
        string $digitableLine
    ) {
        $this->bankNumber = $bankNumber;
        $this->agreement = $agreement;
        $this->title = $title;
        $this->buyer = $buyer;
        $this->recipient = $recipient;
        $this->barCode = $barCode;
        $this->digitableLine = $digitableLine;
    }

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
     * Return the agreement information.
     *
     * @return Agreement Agreement
     */
    public function getAgreement(): Agreement
    {
        return $this->agreement;
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
     * Return the buyer information.
     *
     * @return Agent Buyer
     */
    public function getBuyer(): Agent
    {
        return $this->buyer;
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
     */
    public function setBarCode(string $barCode)
    {
        $this->barCode = $barCode;
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
     */
    public function setDigitableLine(string $digitableLine)
    {
        $this->digitableLine = $digitableLine;
    }
}
