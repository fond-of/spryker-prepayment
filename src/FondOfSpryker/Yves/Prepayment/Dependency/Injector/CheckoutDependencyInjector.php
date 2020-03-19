<?php

namespace FondOfSpryker\Yves\Prepayment\Dependency\Injector;

use FondOfSpryker\Shared\Prepayment\PrepaymentConstants;
use FondOfSpryker\Yves\Prepayment\Plugin\PrepaymentHandlerPlugin;
use FondOfSpryker\Yves\Prepayment\Plugin\PrepaymentSubFormPlugin;
use Spryker\Shared\Kernel\ContainerInterface;
use Spryker\Shared\Kernel\Dependency\Injector\DependencyInjectorInterface;
use Spryker\Yves\Checkout\CheckoutDependencyProvider;
use Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection;

class CheckoutDependencyInjector implements DependencyInjectorInterface
{
    /**
     * @param \Spryker\Shared\Kernel\ContainerInterface $container
     *
     * @return \Spryker\Shared\Kernel\ContainerInterface
     */
    public function inject(ContainerInterface $container): ContainerInterface
    {
        $container = $this->injectPaymentSubForms($container);
        $container = $this->injectPaymentMethodHandler($container);

        return $container;
    }

    /**
     * @param \Spryker\Shared\Kernel\ContainerInterface $container
     *
     * @return \Spryker\Shared\Kernel\ContainerInterface
     */
    protected function injectPaymentSubForms(ContainerInterface $container): ContainerInterface
    {
        $container->extend(
            CheckoutDependencyProvider::PAYMENT_SUB_FORMS,
            static function (SubFormPluginCollection $paymentSubForms) {
                $paymentSubForms->add(new PrepaymentSubFormPlugin());

                return $paymentSubForms;
            }
        );

        return $container;
    }

    /**
     * @param \Spryker\Shared\Kernel\ContainerInterface $container
     *
     * @return \Spryker\Shared\Kernel\ContainerInterface
     */
    protected function injectPaymentMethodHandler(ContainerInterface $container): ContainerInterface
    {
        $container->extend(
            CheckoutDependencyProvider::PAYMENT_METHOD_HANDLER,
            static function (StepHandlerPluginCollection $paymentMethodHandler) {
                return $paymentMethodHandler->add(
                    new PrepaymentHandlerPlugin(),
                    PrepaymentConstants::PREPAYMENT_PROPERTY_PATH
                );
            }
        );

        return $container;
    }
}
