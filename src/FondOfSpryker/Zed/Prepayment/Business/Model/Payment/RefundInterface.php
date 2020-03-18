<?php

namespace FondOfSpryker\Zed\Prepayment\Business\Model\Payment;

use Orm\Zed\Sales\Persistence\SpySalesOrder;

interface RefundInterface
{
    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem[] $salesOrderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $salesOrderEntity
     *
     * @return void
     */
    public function refund(array $salesOrderItems, SpySalesOrder $salesOrderEntity): void;
}
