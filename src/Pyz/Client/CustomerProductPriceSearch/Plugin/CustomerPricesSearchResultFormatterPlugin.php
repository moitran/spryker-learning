<?php

namespace Pyz\Client\CustomerProductPriceSearch\Plugin;

use Elastica\ResultSet;
use Pyz\Client\CustomerProductPriceSearch\CustomerProductPriceSearchFactory;
use Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface;
use Spryker\Client\SearchElasticsearch\Plugin\ResultFormatter\AbstractElasticsearchResultFormatterPlugin;

/**
 * Class CustomerPricesSearchResultFormatterPlugin
 * @package Pyz\Client\CustomerProductPriceSearch\Plugin
 * @method CustomerProductPriceSearchFactory getFactory()
 */
class CustomerPricesSearchResultFormatterPlugin extends AbstractElasticsearchResultFormatterPlugin
{
    /**
     * @var ResultFormatterPluginInterface
     */
    protected $currencyAwareCatalogSearchResultFormatterPlugin;

    /**
     * CustomerPricesSearchResultFormatterPlugin constructor.
     *
     * @param ResultFormatterPluginInterface $currencyAwareCatalogSearchResultFormatterPlugin
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
     * @param ResultSet $searchResult
     * @param array $requestParameters
     *
     * @return mixed
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
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
