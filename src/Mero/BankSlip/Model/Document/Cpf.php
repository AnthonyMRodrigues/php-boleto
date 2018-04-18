<?php

namespace Mero\BankSlip\Model\Document;

class Cpf extends AbstractDocument
{
    /**
     * @inheritDoc
     */
    public function validate(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getFormattedNumber(): string
    {
        return preg_replace(
            "/([0-9]{3})([0-9]{3})([0-9]{3})([0-9]{2})/",
            "$1.$2.$3-$4",
            preg_replace('/[^0-9]/', '', $this->number)
        );
    }
}
