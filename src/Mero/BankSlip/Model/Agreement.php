<?php

namespace Mero\BankSlip\Model;

class Agreement
{
    /**
     * @var string Agreement number
     */
    protected $agreementNumber;

    /**
     * @var string Wallet variation
     */
    protected $walletVariation;

    /**
     * @var string Wallet
     */
    protected $wallet;

    /**
     * @var Account Account information
     */
    protected $account;

    /**
     * Agreement constructor.
     * @param string $agreementNumber Agreement number
     * @param string $walletVariation Wallet variation
     * @param string $wallet Wallet
     * @param Account $account Account information
     */
    public function __construct(string $agreementNumber, string $walletVariation, string $wallet, Account $account)
    {
        $this->agreementNumber = $agreementNumber;
        $this->walletVariation = $walletVariation;
        $this->wallet = $wallet;
        $this->account = $account;
    }

    /**
     *
     * @return string Agreement number
     */
    public function getAgreementNumber(): string
    {
        return $this->agreementNumber;
    }

    /**
     * @return string
     */
    public function getWalletVariation(): string
    {
        return $this->walletVariation;
    }

    /**
     * @return string
     */
    public function getWallet(): string
    {
        return $this->wallet;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }
}
