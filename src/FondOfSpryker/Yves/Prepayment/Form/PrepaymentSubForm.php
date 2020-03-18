<?php

namespace FondOfSpryker\Yves\Prepayment\Form;

use FondOfSpryker\Shared\Prepayment\PrepaymentConstants;
use Spryker\Yves\StepEngine\Dependency\Form\SubFormInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrepaymentSubForm extends AbstractSubForm
{
    /**
     * @return string
     */
    protected function getTemplatePath(): string
    {
        return PrepaymentConstants::PROVIDER_NAME . '/' . PrepaymentConstants::PAYMENT_METHOD_PREPAYMENT;
    }

    /**
     * @return string
     */
    public function getPropertyPath(): string
    {
        return PrepaymentConstants::PREPAYMENT_PROPERTY_PATH;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return PrepaymentConstants::PREPAYMENT_PROPERTY_PATH;
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            SubFormInterface::OPTIONS_FIELD_NAME => [],
        ]);
    }

    /**
     * @param \Symfony\Component\Form\FormView $view The view
     * @param \Symfony\Component\Form\FormInterface $form The form
     * @param array $options The options
     *
     * @return void
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        parent::buildView($view, $form, $options);

        $view->vars = array_merge($view->vars, $this->getAdditionalFormVars());
    }
}
