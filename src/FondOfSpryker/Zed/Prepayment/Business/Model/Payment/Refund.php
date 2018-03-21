<?php

namespace FondOfSpryker\Zed\Prepayment\Business\Model\Payment;

use FondOfSpryker\Zed\Prepayment\Dependency\Facade\PrepaymentToRefundInterface;
use Generated\Shared\Transfer\RefundTransfer;
use Orm\Zed\Sales\Persistence\SpySalesOrder;

class Refund implements RefundInterface
{
    /**
     * @var \FondOfSpryker\Zed\Prepayment\Dependency\Facade\PrepaymentToRefundInterface
     */
    protected $refundFacade;

    /**
     * @param \FondOfSpryker\Zed\Prepayment\Dependency\Facade\PrepaymentToRefundInterface $refundFacade
     */
    public function __construct(PrepaymentToRefundInterface $refundFacade)
    {
        $this->refundFacade = $refundFacade;
    }

    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem[] $salesOrderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $salesOrderEntity
     *
     * @return void
     */
    public function refund(array $salesOrderItems, SpySalesOrder $salesOrderEntity)
    {
        $refundTransfer = $this->refundFacade->calculateRefund($salesOrderItems, $salesOrderEntity);
        $paymentRefundResult = $this->refundPayment($refundTransfer);

        if ($paymentRefundResult) {
            $this->refundFacade->saveRefund($refundTransfer);
        }
    }

    /**
     * This is just a fake method, in a normal environment you would call your facade and trigger the refund process.
     *
     * @param \Generated\Shared\Transfer\RefundTransfer $refundTransfer
     *
     * @return bool
     */
    protected function refundPayment(RefundTransfer $refundTransfer)
    {
        return ($refundTransfer->getAmount() > 0);
    }
}
