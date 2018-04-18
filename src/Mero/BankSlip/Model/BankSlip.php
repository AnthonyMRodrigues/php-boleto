<?php

namespace Mero\BankSlip\Model;

class BankSlip
{
    /**
     * @var int Bank number
     */
    protected $bankNumber;

    /**
     * @var Agent Buyer information
     */
    protected $buyer;

    /**
     * @var Agent Recipient information
     */
    protected $recipient;
}
