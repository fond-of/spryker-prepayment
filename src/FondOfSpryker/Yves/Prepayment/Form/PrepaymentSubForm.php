<?php

namespace FondOfSpryker\Yves\Prepayment\Form;

use FondOfSpryker\Shared\Prepayment\PrepaymentConstants;
use Generated\Shared\Transfer\PaymentTransfer;

class PrepaymentSubForm extends AbstractSubForm
{
    /**
     * @return string
     */
    protected function getTemplatePath()
    {
        return PrepaymentConstants::PROVIDER_NAME . '/' . PrepaymentConstants::PAYMENT_METHOD_PREPAYMENT;
    }

    /**
     * @return string
     */
    public function getPropertyPath()
    {
        return PaymentTransfer::PREPAYMENT_PREPAYMENT;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return PaymentTransfer::PREPAYMENT_PREPAYMENT;
    }
}
