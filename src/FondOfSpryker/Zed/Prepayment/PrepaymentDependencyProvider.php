<?php

namespace FondOfSpryker\Zed\Prepayment;

use FondOfSpryker\Zed\Prepayment\Dependency\Facade\PrepaymentToRefundFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class PrepaymentDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_REFUND = 'FACADE_REFUND';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addRefundFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addRefundFacade(Container $container): Container
    {
        $container[static::FACADE_REFUND] = static function (Container $container) {
            return new PrepaymentToRefundFacadeBridge($container->getLocator()->refund()->facade());
        };

        return $container;
    }
}
