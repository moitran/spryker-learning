<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Calculator;

use ArrayObject;
use Generated\Shared\Transfer\CalculableObjectTransfer;
use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceRepositoryInterface;

/**
 * Class CustomerProductPriceCalculator
 *
 * @package Pyz\Zed\CustomerProductPrice\Business\Calculation
 */
class CustomerProductPriceCalculator implements CustomerProductPriceCalculatorInterface
{
    /**
     * @var \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceRepositoryInterface
     */
    protected $repository;

    /**
     * @param \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceRepositoryInterface $repository
     */
    public function __construct(CustomerProductPriceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Generated\Shared\Transfer\CalculableObjectTransfer $calculableObjectTransfer
     *
     * @return mixed|void
     */
    public function recalculate(CalculableObjectTransfer $calculableObjectTransfer)
    {
        $items = $calculableObjectTransfer->getItems();
        $skus = $this->getSkus($items);

        $customer = $calculableObjectTransfer->getOriginalQuote()->getCustomer();

        if (!$customer || !$customer->getCustomerNumber()) {
            return;
        }

        $prices = $this->repository->fetchPricesForSkus($skus, $customer->getCustomerNumber());

        $this->applyPrices($calculableObjectTransfer, $prices);
    }

    /**
     * @param \ArrayObject $items
     *
     * @return array
     */
    protected function getSkus(ArrayObject $items): array
    {
        $skus = [];

        /**
         * @var \Generated\Shared\Transfer\ItemTransfer $item
         */
        foreach ($items as $item) {
            $skus[] = $item->getSku();
        }

        return $skus;
    }

    /**
     * @param \Generated\Shared\Transfer\CalculableObjectTransfer $calculableObjectTransfer
     * @param array $prices
     *
     * @return void
     */
    protected function applyPrices(CalculableObjectTransfer $calculableObjectTransfer, array $prices)
    {
        foreach ($calculableObjectTransfer->getItems() as $item) {
            if (!array_key_exists($item->getSku(), $prices)) {
                continue;
            }
            $bestPrice = $this->getBestPrice($prices[$item->getSku()], $item->getQuantity());
            $item->setUnitPrice($bestPrice->getPrice());
            $item->setSumPrice($bestPrice->getPrice() * $item->getQuantity());
        }
    }

    /**
     * @param array $prices
     * @param int $quantity
     *
     * @return \Generated\Shared\Transfer\CustomerProductPriceTransfer
     */
    protected function getBestPrice(array $prices, int $quantity): CustomerProductPriceTransfer
    {
        $filterPrices = array_filter($prices, function (CustomerProductPriceTransfer $price) use ($quantity) {
            return $price->getQuantity() <= $quantity;
        });

        usort(
            $filterPrices,
            function (CustomerProductPriceTransfer $priceA, CustomerProductPriceTransfer $priceB) {
                return $priceB->getQuantity() <=> $priceA->getQuantity();
            }
        );

        return current($filterPrices);
    }
}
