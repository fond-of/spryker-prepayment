<?php

namespace FondOfSpryker\Yves\Prepayment;

use FondOfSpryker\Yves\Prepayment\Form\DataProvider\PrepaymentFormDataProvider;
use FondOfSpryker\Yves\Prepayment\Form\PrepaymentSubForm;
use FondOfSpryker\Yves\Prepayment\Handler\PrepaymentHandler;
use Spryker\Yves\Kernel\AbstractFactory;

/**
 * @method \FondOfSpryker\Yves\Prepayment\PrepaymentConfig getConfig()
 */
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

    /**
     * @return array
     */
    public function createAdditionalFormVars()
    {
        return [
            'iban' => $this->getConfig()->getIban(),
            'bic' => $this->getConfig()->getBic(),
            'accountHolder' => $this->getConfig()->getAccountHolder(),
            'customText' => $this->getConfig()->getCustomText(),
        ];
    }
}
