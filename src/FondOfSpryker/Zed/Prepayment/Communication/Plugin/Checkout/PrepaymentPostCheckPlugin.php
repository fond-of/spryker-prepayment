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
 * @method \FondOfSpryker\Zed\Prepayment\PrepaymentConfig getConfig()
 */
class PrepaymentPostCheckPlugin extends AbstractPlugin implements CheckoutPostCheckPluginInterface
{
    public const ERROR_CODE_PAYMENT_FAILED = 'payment failed';

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer, CheckoutResponseTransfer $checkoutResponseTransfer)
    {
        if (!$this->isAuthorizationApproved($quoteTransfer)) {
            $checkoutErrorTransfer = new CheckoutErrorTransfer();
            $checkoutErrorTransfer
                ->setErrorCode(self::ERROR_CODE_PAYMENT_FAILED)
                ->setMessage('Something went wrong with your payment. Try again!');

            $checkoutResponseTransfer->addError($checkoutErrorTransfer);
            $checkoutResponseTransfer->setIsSuccess(false);
        }

        return $checkoutResponseTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isAuthorizationApproved(QuoteTransfer $quoteTransfer)
    {
        $quoteTransfer->requireBillingAddress();

        $billingAddress = $quoteTransfer->getBillingAddress();
        $billingAddress->requireLastName();

        return ($billingAddress->getLastName() !== PrepaymentConstants::LAST_NAME_FOR_INVALID_TEST);
    }
}
