<?php

namespace FondOfSpryker\Yves\Prepayment\Handler;

use FondOfSpryker\Shared\Prepayment\PrepaymentConstants;
use Generated\Shared\Transfer\QuoteTransfer;

class PrepaymentHandler
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function addPaymentToQuote(QuoteTransfer $quoteTransfer)
    {
        $this->setPaymentProviderAndMethod($quoteTransfer);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    protected function setPaymentProviderAndMethod(QuoteTransfer $quoteTransfer)
    {
        $quoteTransfer->getPayment()
            ->setPaymentProvider(PrepaymentConstants::PAYMENT_PROVIDER)
            ->setPaymentMethod(PrepaymentConstants::PAYMENT_METHOD_PREPAYMENT);
    }
}
