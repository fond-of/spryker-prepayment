<?php

namespace FondOfSpryker\Zed\Prepayment\Business;

use FondOfSpryker\Zed\Prepayment\Business\Model\Payment\Refund;
use FondOfSpryker\Zed\Prepayment\Business\Model\Payment\RefundInterface;
use FondOfSpryker\Zed\Prepayment\Dependency\Facade\PrepaymentToRefundFacadeInterface;
use FondOfSpryker\Zed\Prepayment\PrepaymentDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\Prepayment\PrepaymentConfig getConfig()
 */
class PrepaymentBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\Prepayment\Business\Model\Payment\RefundInterface
     */
    public function createRefund(): RefundInterface
    {
        return new Refund(
            $this->getRefundFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\Prepayment\Dependency\Facade\PrepaymentToRefundFacadeInterface
     */
    protected function getRefundFacade(): PrepaymentToRefundFacadeInterface
    {
        return $this->getProvidedDependency(PrepaymentDependencyProvider::FACADE_REFUND);
    }
}
