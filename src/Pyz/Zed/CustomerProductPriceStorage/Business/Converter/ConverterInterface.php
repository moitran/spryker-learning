<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Converter;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Interface ConverterInterface
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Converter
 */
interface ConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerProductTransfer $customerProductTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerProductPriceStorageTransfer
     */
    public function convert(CustomerProductTransfer $customerProductTransfer): CustomerProductPriceStorageTransfer;
}
