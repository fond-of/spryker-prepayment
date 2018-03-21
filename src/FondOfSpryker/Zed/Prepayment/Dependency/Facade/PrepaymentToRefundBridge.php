<?php

namespace FondOfSpryker\Zed\Prepayment\Dependency\Facade;

use Generated\Shared\Transfer\RefundTransfer;
use Orm\Zed\Sales\Persistence\SpySalesOrder;

class PrepaymentToRefundBridge implements PrepaymentToRefundInterface
{
    /**
     * @var \Spryker\Zed\Refund\Business\RefundFacadeInterface
     */
    protected $refundFacade;

    /**
     * @param \Spryker\Zed\Refund\Business\RefundFacadeInterface $refundFacade
     */
    public function __construct($refundFacade)
    {
        $this->refundFacade = $refundFacade;
    }

    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem[] $salesOrderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $salesOrderEntity
     *
     * @return \Generated\Shared\Transfer\RefundTransfer
     */
    public function calculateRefund(array $salesOrderItems, SpySalesOrder $salesOrderEntity)
    {
        return $this->refundFacade->calculateRefund($salesOrderItems, $salesOrderEntity);
    }

    /**
     * @param \Generated\Shared\Transfer\RefundTransfer $refundTransfer
     *
     * @return bool
     */
    public function saveRefund(RefundTransfer $refundTransfer)
    {
        return $this->refundFacade->saveRefund($refundTransfer);
    }
}
