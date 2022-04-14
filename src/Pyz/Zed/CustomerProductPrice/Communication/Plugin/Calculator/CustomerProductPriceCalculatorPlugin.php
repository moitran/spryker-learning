<?php

namespace Pyz\Zed\CustomerProductPrice\Communication\Plugin\Calculator;

use Generated\Shared\Transfer\CalculableObjectTransfer;
use Pyz\Zed\CustomerProductPrice\Business\CustomerProductPriceFacadeInterface;
use Spryker\Zed\CalculationExtension\Dependency\Plugin\CalculationPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class CustomerProductPriceCalculatorPlugin
 * @package Pyz\Zed\CustomerProductPrice\Communication\Plugin\Calculator
 * @method CustomerProductPriceFacadeInterface getFacade()
 */
class CustomerProductPriceCalculatorPlugin extends AbstractPlugin implements CalculationPluginInterface
{
    /**
     * @param CalculableObjectTransfer $calculableObjectTransfer
     */
    public function recalculate(CalculableObjectTransfer $calculableObjectTransfer)
    {
        $this->getFacade()->recalculate($calculableObjectTransfer);
    }
}
