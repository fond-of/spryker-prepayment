<?php

namespace FondOfSpryker\Zed\Prepayment\Business;

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
    public function createRefund()
    {
        return new Refund(
            $this->getRefundFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\Prepayment\Dependency\Facade\PrepaymentToRefundInterface
     */
    protected function getRefundFacade()
    {
        return $this->getProvidedDependency(PrepaymentDependencyProvider::FACADE_REFUND);
    }
}
