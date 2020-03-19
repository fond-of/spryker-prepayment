<?php

namespace FondOfSpryker\Yves\Prepayment;

use FondOfSpryker\Shared\Prepayment\PrepaymentConstants;
use Spryker\Yves\Kernel\AbstractBundleConfig;

class PrepaymentConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getIban(): string
    {
        return $this->get(PrepaymentConstants::IBAN, '');
    }

    /**
     * @return string
     */
    public function getBic(): string
    {
        return $this->get(PrepaymentConstants::BIC, '');
    }

    /**
     * @return string
     */
    public function getAccountHolder(): string
    {
        return $this->get(PrepaymentConstants::ACCOUNT_HOLDER, '');
    }

    /**
     * @return string
     */
    public function getCustomText(): string
    {
        return $this->get(PrepaymentConstants::CUSTOM_TEXT, '');
    }
}
