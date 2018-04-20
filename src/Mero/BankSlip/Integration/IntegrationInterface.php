<?php

namespace Mero\BankSlip\Integration;

use Mero\BankSlip\Model\BankSlip;

interface IntegrationInterface
{
    /**
     * Send register request to bank integration.
     *
     * @param BankSlip $bankSlip Bank slip
     *
     * @return BankSlip
     */
    public function register(BankSlip $bankSlip): BankSlip;
}
