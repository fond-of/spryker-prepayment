<?php

namespace FondOfSpryker\Zed\Prepayment\Communication\Plugin\Checkout;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Payment\Dependency\Plugin\Checkout\CheckoutSaveOrderPluginInterface;

/**
 * @method \FondOfSpryker\Zed\Prepayment\Communication\PrepaymentCommunicationFactory getFactory()
 * @method \FondOfSpryker\Zed\Prepayment\Business\PrepaymentFacadeInterface getFacade()
 */
class PrepaymentSaveOrderPlugin extends AbstractPlugin implements CheckoutSaveOrderPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return void
     */
    public function execute(QuoteTransfer $quoteTransfer, CheckoutResponseTransfer $checkoutResponseTransfer): void
    {
    }
}
