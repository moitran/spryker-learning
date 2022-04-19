<?php

namespace Pyz\Client\CustomerProductPriceStorage\Expander;

use Generated\Shared\Transfer\CustomerProductPriceStoreTransfer;
use Generated\Shared\Transfer\ProductViewTransfer;
use Pyz\Client\CustomerProductPriceStorage\Reader\CustomerProductPriceStorageReaderInterface;
use Spryker\Client\Customer\CustomerClientInterface;

/**
 * Class ProductViewExpander
 * @package Pyz\Client\CustomerProductPriceStorage\Expander
 */
class ProductViewExpander implements ProductViewExpanderInterface
{
    const RESOURCE = 'customer_product_price';

    /**
     * @var CustomerProductPriceStorageReaderInterface
     */
    protected $reader;

    /**
     * @var CustomerClientInterface
     */
    protected $customerClient;

    /**
     * ProductViewExpander constructor.
     *
     * @param CustomerProductPriceStorageReaderInterface $reader
     * @param CustomerClientInterface $customerClient
     */
    public function __construct(
        CustomerProductPriceStorageReaderInterface $reader,
        CustomerClientInterface $customerClient
    ) {
        $this->reader = $reader;
        $this->customerClient = $customerClient;
    }

    /**
     * @param ProductViewTransfer $productViewTransfer
     *
     * @return ProductViewTransfer
     */
    public function expandProductViewTransfer(ProductViewTransfer $productViewTransfer): ProductViewTransfer
    {
        if (!$this->customerClient->isLoggedIn()) {
            return $productViewTransfer;
        }

        $referenceKey = $this->buildReferenceKey($productViewTransfer);
        $customerProductPrices = $this->reader->getPricesByReferenceKey($referenceKey);
        $filterPrice = $this->filterPrice($customerProductPrices, $productViewTransfer);
        $productViewTransfer = $this->updatePrice($filterPrice, $productViewTransfer);

        return $productViewTransfer;
    }

    /**
     * @param ProductViewTransfer $productViewTransfer
     *
     * @return string
     */
    protected function buildReferenceKey(ProductViewTransfer $productViewTransfer): string
    {
        $productNumber = $productViewTransfer->getSku();
        $customerNumber = $this->customerClient->getCustomer()->getCustomerNumber();

        return sprintf('%s:%s:%s', static::RESOURCE, $productNumber, $customerNumber);
    }

    /**
     * @param CustomerProductPriceStoreTransfer $customerProductPrices
     * @param ProductViewTransfer $productViewTransfer
     *
     * @return float
     */
    protected function filterPrice(
        CustomerProductPriceStoreTransfer $customerProductPrices,
        ProductViewTransfer $productViewTransfer
    ): float {
        $priceLow = $productViewTransfer->getPrice();
        foreach ($customerProductPrices->getCustomerProductPrices() as $customerProductPrice) {
            if ($customerProductPrice->getQuantity() === 1) {
                $priceLow = $customerProductPrice->getPrice();
            }
        }

        return (int)$priceLow;
    }

    /**
     * @param int $newPrice
     * @param ProductViewTransfer $productViewTransfer
     *
     * @return ProductViewTransfer
     */
    protected function updatePrice(int $newPrice, ProductViewTransfer $productViewTransfer): ProductViewTransfer
    {
        $productViewTransfer->setPrice($newPrice);
        $productViewTransfer->getCurrentProductPrice()->setPrice($newPrice);

        return $productViewTransfer;
    }
}
