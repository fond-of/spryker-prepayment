<?php

namespace FondOfSpryker\Zed\Prepayment\Business;

use Orm\Zed\Sales\Persistence\SpySalesOrder;

interface PrepaymentFacadeInterface
{
    /**
     * Specification:
     * - Calculate refund amount for given order items and order entity
     *
     * @api
     *
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem[] $salesOrderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $salesOrderEntity
     *
     * @return void
     */
    public function refund(array $salesOrderItems, SpySalesOrder $salesOrderEntity): void;
}
