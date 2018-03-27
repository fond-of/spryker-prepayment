<?php

namespace FondOfSpryker\Zed\Prepayment;

use FondOfSpryker\Zed\Prepayment\Dependency\Facade\PrepaymentToRefundBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class PrepaymentDependencyProvider extends AbstractBundleDependencyProvider
{
    const FACADE_REFUND = 'refund facade';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = $this->addRefundFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addRefundFacade(Container $container)
    {
        $container[self::FACADE_REFUND] = function (Container $container) {
            return new PrepaymentToRefundBridge($container->getLocator()->refund()->facade());
        };
        return $container;
    }
}
