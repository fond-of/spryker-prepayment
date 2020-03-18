<?php

namespace FondOfSpryker\Zed\Prepayment\Communication\Plugin\Checkout;

use FondOfSpryker\Shared\Prepayment\PrepaymentConstants;
use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Payment\Dependency\Plugin\Checkout\CheckoutPostCheckPluginInterface;

/**
 * @method \FondOfSpryker\Zed\Prepayment\Business\PrepaymentFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\Prepayment\Communication\PrepaymentCommunicationFactory getFactory()
 */
class PrepaymentPostCheckPlugin extends AbstractPlugin implements CheckoutPostCheckPluginInterface
{
    public const ERROR_CODE_PAYMENT_FAILED = 'payment failed';

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return void
     */
    public function execute(QuoteTransfer $quoteTransfer, CheckoutResponseTransfer $checkoutResponseTransfer): void
    {
        if ($this->isAuthorizationApproved($quoteTransfer)) {
            return;
        }

        $checkoutErrorTransfer = (new CheckoutErrorTransfer())->setErrorCode(self::ERROR_CODE_PAYMENT_FAILED)
            ->setMessage('Something went wrong with your payment. Try again!');

        $checkoutResponseTransfer->addError($checkoutErrorTransfer)
            ->setIsSuccess(false);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isAuthorizationApproved(QuoteTransfer $quoteTransfer): bool
    {
        $quoteTransfer->requireBillingAddress();

        $billingAddress = $quoteTransfer->getBillingAddress();

        $billingAddress->requireLastName();

        return $billingAddress->getLastName() !== PrepaymentConstants::LAST_NAME_FOR_INVALID_TEST;
    }
}
