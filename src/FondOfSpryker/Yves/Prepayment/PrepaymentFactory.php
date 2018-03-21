<?php

namespace FondOfSpryker\Yves\Prepayment;

use FondOfSpryker\Yves\Prepayment\Form\DataProvider\PrepaymentFormDataProvider;
use FondOfSpryker\Yves\Prepayment\Form\PrepaymentSubForm;
use FondOfSpryker\Yves\Prepayment\Handler\PrepaymentHandler;
use Spryker\Yves\Kernel\AbstractFactory;

class PrepaymentFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Yves\Prepayment\Form\PrepaymentSubForm
     */
    public function createPrepaymentForm()
    {
        return new PrepaymentSubForm();
    }

    /**
     * @return \FondOfSpryker\Yves\Prepayment\Form\DataProvider\PrepaymentFormDataProvider
     */
    public function createPrepaymentFormDataProvider()
    {
        return new PrepaymentFormDataProvider();
    }

    /**
     * @return \FondOfSpryker\Yves\Prepayment\Handler\PrepaymentHandler
     */
    public function createPrepaymentHandler()
    {
        return new PrepaymentHandler();
    }
}
