<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Calculator;

use Generated\Shared\Transfer\CalculableObjectTransfer;

/**
 * Interface CustomerProductPriceCalculatorInterface
 * @package Pyz\Zed\CustomerProductPrice\Business\Calculation
 */
interface CustomerProductPriceCalculatorInterface
{
    /**
     * @param CalculableObjectTransfer $calculableObjectTransfer
     */
    public function recalculate(CalculableObjectTransfer $calculableObjectTransfer);
}
