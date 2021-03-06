<?php

namespace FondOfSpryker\Zed\Prepayment\Business;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\Prepayment\Business\PrepaymentBusinessFactory getFactory()
 */
class PrepaymentFacade extends AbstractFacade implements PrepaymentFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem[] $salesOrderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $salesOrderEntity
     *
     * @return void
     */
    public function refund(array $salesOrderItems, SpySalesOrder $salesOrderEntity): void
    {
        $this->getFactory()->createRefund()->refund($salesOrderItems, $salesOrderEntity);
    }
}
