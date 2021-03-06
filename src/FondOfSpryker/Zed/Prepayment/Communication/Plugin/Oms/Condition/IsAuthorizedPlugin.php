<?php

namespace FondOfSpryker\Zed\Prepayment\Communication\Plugin\Oms\Condition;

use FondOfSpryker\Shared\Prepayment\PrepaymentConstants;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Oms\Dependency\Plugin\Condition\ConditionInterface;

/**
 * @method \FondOfSpryker\Zed\Prepayment\Communication\PrepaymentCommunicationFactory getFactory()
 * @method \FondOfSpryker\Zed\Prepayment\Business\PrepaymentFacadeInterface getFacade()
 */
class IsAuthorizedPlugin extends AbstractPlugin implements ConditionInterface
{
    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem $orderItem
     *
     * @return bool
     */
    public function check(SpySalesOrderItem $orderItem): bool
    {
        $lastName = $orderItem->getOrder()->getLastName();

        return ($lastName !== PrepaymentConstants::LAST_NAME_FOR_INVALID_TEST);
    }
}
