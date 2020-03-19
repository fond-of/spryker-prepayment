<?php

namespace FondOfSpryker\Yves\Prepayment\Plugin;

use FondOfSpryker\Yves\Prepayment\Form\PrepaymentSubForm;
use Spryker\Yves\Kernel\AbstractPlugin;
use Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface;
use Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginInterface;

/**
 * @method \FondOfSpryker\Yves\Prepayment\PrepaymentFactory getFactory()
 */
class PrepaymentSubFormPlugin extends AbstractPlugin implements SubFormPluginInterface
{
    /**
     * @return \FondOfSpryker\Yves\Prepayment\Form\PrepaymentSubForm
     */
    public function createSubForm(): PrepaymentSubForm
    {
        return $this->getFactory()->createPrepaymentForm();
    }

    /**
     * @return \Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface
     */
    public function createSubFormDataProvider(): StepEngineFormDataProviderInterface
    {
        return $this->getFactory()->createPrepaymentFormDataProvider();
    }
}
