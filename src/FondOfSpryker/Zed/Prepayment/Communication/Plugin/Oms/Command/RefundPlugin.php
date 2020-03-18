<?php

namespace FondOfSpryker\Zed\Prepayment\Communication\Plugin\Oms\Command;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandByOrderInterface;

/**
 * @method \FondOfSpryker\Zed\Prepayment\Business\PrepaymentFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\Prepayment\Communication\PrepaymentCommunicationFactory getFactory()
 */
class RefundPlugin extends AbstractPlugin implements CommandByOrderInterface
{
    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem[] $salesOrderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $orderEntity
     * @param \Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject $data
     *
     * @return void
     */
    public function run(array $salesOrderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data): void
    {
        $this->getFacade()->refund($salesOrderItems, $orderEntity);
    }
}
