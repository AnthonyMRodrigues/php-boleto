<?php

namespace Mero\BankSlip\Integration;

use Mero\BankSlip\Model\BankSlip;

interface IntegrationInterface
{
    /**
     * @param BankSlip $bankSlip Bank slip
     *
     * @return BankSlip
     */
    public function register(BankSlip $bankSlip): BankSlip;
}
