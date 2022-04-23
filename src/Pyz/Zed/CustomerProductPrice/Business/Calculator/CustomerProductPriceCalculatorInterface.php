<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Calculator;

use Generated\Shared\Transfer\CalculableObjectTransfer;

/**
 * Interface CustomerProductPriceCalculatorInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Business\Calculation
 */
interface CustomerProductPriceCalculatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\CalculableObjectTransfer $calculableObjectTransfer
     */
    public function recalculate(CalculableObjectTransfer $calculableObjectTransfer);
}
