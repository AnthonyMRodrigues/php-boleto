<?php

namespace Mero\BankSlip\Model;

class Account
{
    /**
     * @var string Agency number
     */
    protected $agencyNumber;

    /**
     * @var string Agency digit
     */
    protected $agencyDigit;

    /**
     * @var string Account
     */
    protected $accountNumber;

    /**
     * @var string Account digit
     */
    protected $accountDigit;

    /**
     * Account constructor.
     * @param string $agencyNumber Agency number
     * @param string $agencyDigit Agency digit
     * @param string $accountNumber Account number
     * @param string $accountDigit Account digit
     */
    public function __construct(string $agencyNumber, string $agencyDigit, string $accountNumber, string $accountDigit)
    {
        $this->agencyNumber = $agencyNumber;
        $this->agencyDigit = $agencyDigit;
        $this->accountNumber = $accountNumber;
        $this->accountDigit = $accountDigit;
    }

    /**
     * Return the agency number.
     *
     * @return string Agency number
     */
    public function getAgencyNumber(): string
    {
        return $this->agencyNumber;
    }

    /**
     * Return the agency digit.
     *
     * @return string Agency digit
     */
    public function getAgencyDigit(): string
    {
        return $this->agencyDigit;
    }

    /**
     * Return the account number.
     *
     * @return string Account number
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @return string
     */
    public function getAccountDigit(): string
    {
        return $this->accountDigit;
    }
}
