<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\CustomerProductPriceSearch\Plugin;

use Elastica\ResultSet;
use Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface;
use Spryker\Client\SearchElasticsearch\Plugin\ResultFormatter\AbstractElasticsearchResultFormatterPlugin;

/**
 * Class CustomerPricesSearchResultFormatterPlugin
 *
 * @package Pyz\Client\CustomerProductPriceSearch\Plugin
 * @method \Pyz\Client\CustomerProductPriceSearch\CustomerProductPriceSearchFactory getFactory()
 */
class CustomerPricesSearchResultFormatterPlugin extends AbstractElasticsearchResultFormatterPlugin
{
    /**
     * @var \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface
     */
    protected $currencyAwareCatalogSearchResultFormatterPlugin;

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface $currencyAwareCatalogSearchResultFormatterPlugin
     */
    public function __construct(ResultFormatterPluginInterface $currencyAwareCatalogSearchResultFormatterPlugin)
    {
        $this->currencyAwareCatalogSearchResultFormatterPlugin = $currencyAwareCatalogSearchResultFormatterPlugin;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->currencyAwareCatalogSearchResultFormatterPlugin->getName();
    }

    /**
     * @param \Elastica\ResultSet $searchResult
     * @param array $requestParameters
     *
     * @return mixed
     */
    protected function formatSearchResult(ResultSet $searchResult, array $requestParameters)
    {
        $result = $this->currencyAwareCatalogSearchResultFormatterPlugin
            ->formatResult($searchResult, $requestParameters);
        foreach ($result as &$product) {
            if (!empty($product['customer_prices'])) {
                $sku = $product['add_to_cart_sku'];
                $customerNumber = $this->getFactory()->getCustomerClient()->getCustomer()->getCustomerNumber();
                $product['price'] = $product['customer_prices'][$sku][$customerNumber]['price'];
                $product['prices'] = ['DEFAULT' => $product['price']];
            }
        }

        return $result;
    }
}
