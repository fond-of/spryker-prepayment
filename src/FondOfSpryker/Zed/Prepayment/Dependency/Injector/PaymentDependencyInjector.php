<?php

namespace FondOfSpryker\Zed\Prepayment\Dependency\Injector;

use FondOfSpryker\Shared\Prepayment\PrepaymentConstants;
use FondOfSpryker\Zed\Prepayment\Communication\Plugin\Checkout\PrepaymentPostCheckPlugin;
use FondOfSpryker\Zed\Prepayment\Communication\Plugin\Checkout\PrepaymentPreCheckPlugin;
use FondOfSpryker\Zed\Prepayment\Communication\Plugin\Checkout\PrepaymentSaveOrderPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Kernel\Dependency\Injector\AbstractDependencyInjector;
use Spryker\Zed\Payment\Dependency\Plugin\Checkout\CheckoutPluginCollection;
use Spryker\Zed\Payment\PaymentDependencyProvider;

class PaymentDependencyInjector extends AbstractDependencyInjector
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function injectBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::injectBusinessLayerDependencies($container);

        $container = $this->injectPaymentPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function injectPaymentPlugins(Container $container): Container
    {
        $container->extend(
            PaymentDependencyProvider::CHECKOUT_PLUGINS,
            static function (CheckoutPluginCollection $pluginCollection) {
                $pluginCollection->add(
                    new PrepaymentPreCheckPlugin(),
                    PrepaymentConstants::PROVIDER_NAME,
                    PaymentDependencyProvider::CHECKOUT_PRE_CHECK_PLUGINS
                );

                $pluginCollection->add(
                    new PrepaymentSaveOrderPlugin(),
                    PrepaymentConstants::PROVIDER_NAME,
                    PaymentDependencyProvider::CHECKOUT_ORDER_SAVER_PLUGINS
                );

                $pluginCollection->add(
                    new PrepaymentPostCheckPlugin(),
                    PrepaymentConstants::PROVIDER_NAME,
                    PaymentDependencyProvider::CHECKOUT_POST_SAVE_PLUGINS
                );

                return $pluginCollection;
            }
        );

        return $container;
    }
}
