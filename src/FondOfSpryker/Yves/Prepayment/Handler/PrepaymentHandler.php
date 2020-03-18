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
    public function addPaymentToQuote(QuoteTransfer $quoteTransfer): QuoteTransfer
    {
        $this->setPaymentProviderAndMethod($quoteTransfer);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    protected function setPaymentProviderAndMethod(QuoteTransfer $quoteTransfer): void
    {
        $quoteTransfer->getPayment()
            ->setPaymentProvider(PrepaymentConstants::PROVIDER_NAME)
            ->setPaymentMethod(PrepaymentConstants::PAYMENT_METHOD_PREPAYMENT);
    }
}
