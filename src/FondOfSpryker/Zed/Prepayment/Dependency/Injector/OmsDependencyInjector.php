<?php

namespace FondOfSpryker\Zed\Prepayment\Dependency\Injector;

use FondOfSpryker\Zed\Prepayment\Communication\Plugin\Oms\Command\PayPlugin;
use FondOfSpryker\Zed\Prepayment\Communication\Plugin\Oms\Command\RefundPlugin;
use FondOfSpryker\Zed\Prepayment\Communication\Plugin\Oms\Condition\IsAuthorizedPlugin;
use FondOfSpryker\Zed\Prepayment\Communication\Plugin\Oms\Condition\IsPayedPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Kernel\Dependency\Injector\AbstractDependencyInjector;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\CommandCollectionInterface;
use Spryker\Zed\Oms\Dependency\Plugin\Condition\ConditionCollectionInterface;
use Spryker\Zed\Oms\OmsDependencyProvider;

class OmsDependencyInjector extends AbstractDependencyInjector
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function injectBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::injectBusinessLayerDependencies($container);

        $container = $this->injectCommands($container);
        $container = $this->injectConditions($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function injectCommands(Container $container): Container
    {
        $container->extend(
            OmsDependencyProvider::COMMAND_PLUGINS,
            static function (CommandCollectionInterface $commandCollection) {
                $commandCollection->add(new RefundPlugin(), 'Prepayment/Refund');
                $commandCollection->add(new PayPlugin(), 'Prepayment/Pay');

                return $commandCollection;
            }
        );

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function injectConditions(Container $container): Container
    {
        $container->extend(
            OmsDependencyProvider::CONDITION_PLUGINS,
            static function (ConditionCollectionInterface $conditionCollection) {
                $conditionCollection->add(new IsAuthorizedPlugin(), 'Prepayment/IsAuthorized');
                $conditionCollection->add(new IsPayedPlugin(), 'Prepayment/IsPayed');

                return $conditionCollection;
            }
        );

        return $container;
    }
}
