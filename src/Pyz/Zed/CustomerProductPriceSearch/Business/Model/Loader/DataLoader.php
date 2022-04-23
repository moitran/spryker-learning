<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceSearch\Business\Model\Loader;

use ArrayObject;
use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Generated\Shared\Transfer\ProductPageLoadTransfer;
use Pyz\Zed\CustomerProductPriceSearch\Persistence\CustomerProductPriceSearchRepositoryInterface;

/**
 * Class DataLoader
 *
 * @package Pyz\Zed\CustomerProductPriceSearch\Business\Model\Loader
 */
class DataLoader implements DataLoaderInterface
{
    /**
     * @var \Pyz\Zed\CustomerProductPriceSearch\Persistence\CustomerProductPriceSearchRepositoryInterface
     */
    protected $repository;

    /**
     * @param \Pyz\Zed\CustomerProductPriceSearch\Persistence\CustomerProductPriceSearchRepositoryInterface $repository
     */
    public function __construct(CustomerProductPriceSearchRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function expandProductPageDataTransfer(ProductPageLoadTransfer $loadTransfer): ProductPageLoadTransfer
    {
        // 1.1 Query the product SKUs based on Abstract Ids (spy_product_abstract.id => spy_product.sku)
        $abstractIds = $loadTransfer->getProductAbstractIds();
        $skusAndAbstract = $this->repository->findSkusByAbstractIds($abstractIds);

        // 1.2 Query the customer product prices by product SKUs + Transform customer product prices into DTOs
        $skus = array_keys($skusAndAbstract);
        $customerProductPrices = $this->repository->findCustomerProductPricesBySkus($skus);

        // 1.2.1 group customer product prices by abstract id
        $groupedPrices = $this->getGroupedPrices($customerProductPrices, $skusAndAbstract);

        // 1.3 Push the customer product prices (DTO) to PayloadTransfer
        $this->combineCustomerProductPricesOnPayload($loadTransfer, $groupedPrices);

        return $loadTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer $customerProductPrices
     * @param array $skusAndAbstract
     *
     * @return array
     */
    protected function getGroupedPrices(
        CustomerProductPriceCollectionTransfer $customerProductPrices,
        array $skusAndAbstract
    ): array {
        $groupedPrices = [];
        foreach ($customerProductPrices->getCustomerProducts() as $customerProduct) {
            $abstractId = $skusAndAbstract[$customerProduct->getProductNumber()];
            $groupedPrices[$abstractId][] = $customerProduct;
        }

        return $groupedPrices;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductPageLoadTransfer $loadTransfer
     * @param array $groupedPrices
     *
     * @return void
     */
    protected function combineCustomerProductPricesOnPayload(
        ProductPageLoadTransfer $loadTransfer,
        array $groupedPrices
    ) {
        /** @var \Generated\Shared\Transfer\ProductPayloadTransfer $payloadTransfer */
        foreach ($loadTransfer->getPayloadTransfers() as $payloadTransfer) {
            $priceCollection = new ArrayObject($groupedPrices[$payloadTransfer->getIdProductAbstract()] ?? []);
            $payloadTransfer->setCustomerPrices($priceCollection);
        }
    }
}
