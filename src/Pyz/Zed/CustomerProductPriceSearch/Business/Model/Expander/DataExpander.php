<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander;

use ArrayObject;
use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Generated\Shared\Transfer\ProductPayloadTransfer;
use Spryker\Shared\ProductPageSearch\ProductPageSearchConfig;

/**
 * Class DataExpander
 *
 * @package Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander
 */
class DataExpander implements DataExpanderInterface
{
    /**
     * @param array $productData
     * @param \Generated\Shared\Transfer\ProductPageSearchTransfer $productAbstractPageSearchTransfer
     *
     * @return void
     */
    public function expandProductPageData(
        array $productData,
        ProductPageSearchTransfer $productAbstractPageSearchTransfer
    ): void {
        // 2 Get data from Payload
        $payload = $this->getPayload($productData);
        $prices = $payload->getCustomerPrices();

        // 2.2 Structure the data for ELS (reformat, restructure, etc.)
        /*
         * {
         *    product_number: {
         *        customer_number: {
         *            price: xxxx
         *        }
         *    }
         * }
         */
        /** @var \Generated\Shared\Transfer\CustomerProductTransfer $price */
        foreach ($prices as $price) {
            $singlePrice = $this->filterPrice($price->getCustomerProductPrices());
            if ($singlePrice) {
                $structuredPrices[$price->getProductNumber()][$price->getCustomerNumber()]['price'] = $singlePrice;
            }
        }

        // 2.3 Push to ProductPageSearchTransfer
        $productAbstractPageSearchTransfer->setCustomerPrices($structuredPrices);
    }

    /**
     * @param array $productData
     *
     * @return \Generated\Shared\Transfer\ProductPayloadTransfer
     */
    protected function getPayload(array $productData): ProductPayloadTransfer
    {
        return $productData[ProductPageSearchConfig::PRODUCT_ABSTRACT_PAGE_LOAD_DATA];
    }

    /**
     * @param \ArrayObject $prices
     *
     * @return int|null
     */
    protected function filterPrice(ArrayObject $prices): ?int
    {
        /** @var \Generated\Shared\Transfer\CustomerProductPriceTransfer $price */
        foreach ($prices as $price) {
            if ($price->getQuantity() === 1) {
                return (int)$price->getPrice();
            }
        }

        return null;
    }
}
