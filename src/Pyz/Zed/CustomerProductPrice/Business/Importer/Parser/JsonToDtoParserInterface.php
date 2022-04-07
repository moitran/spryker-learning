<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Parser;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;

/**
 * Interface JsonToDtoParserInterface
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Parser
 */
interface JsonToDtoParserInterface
{
    public function parse(string $fileContent): CustomerProductPriceCollectionTransfer;
}
