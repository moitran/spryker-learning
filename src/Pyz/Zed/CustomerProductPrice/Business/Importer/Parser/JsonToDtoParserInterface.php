<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Parser;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;

/**
 * Interface JsonToDtoParserInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Parser
 */
interface JsonToDtoParserInterface
{
    public function parse(string $fileContent): CustomerProductPriceCollectionTransfer;
}
