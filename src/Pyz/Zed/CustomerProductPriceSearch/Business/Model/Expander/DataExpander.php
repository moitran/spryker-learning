<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander;

use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Generated\Shared\Transfer\ProductPayloadTransfer;
use Spryker\Shared\ProductPageSearch\ProductPageSearchConfig;

/**
 * Class DataExpander
 * @package Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander
 */
class DataExpander implements DataExpanderInterface
{
    /**
     * @param array $productData
     * @param ProductPageSearchTransfer $productAbstractPageSearchTransfer
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
        /** @var CustomerProductTransfer $price */
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
     * @return ProductPayloadTransfer
     */
    protected function getPayload(array $productData): ProductPayloadTransfer
    {
        return $productData[ProductPageSearchConfig::PRODUCT_ABSTRACT_PAGE_LOAD_DATA];
    }

    /**
     * @param \ArrayObject $prices
     *
     * @return int
     */
    protected function filterPrice(\ArrayObject $prices): ?int
    {
        /** @var CustomerProductPriceTransfer $price */
        foreach ($prices as $price) {
            if ($price->getQuantity() === 1) {
                return (int)$price->getPrice();
            }
        }

        return null;
    }
}
