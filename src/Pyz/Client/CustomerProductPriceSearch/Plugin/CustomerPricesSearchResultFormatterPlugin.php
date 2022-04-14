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
     * @var \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface
     */
    protected $rawCatalogSearchResultFormatterPlugin;

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface $rawCatalogSearchResultFormatterPlugin
     */
    public function __construct(ResultFormatterPluginInterface $rawCatalogSearchResultFormatterPlugin)
    {
        $this->rawCatalogSearchResultFormatterPlugin = $rawCatalogSearchResultFormatterPlugin;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->rawCatalogSearchResultFormatterPlugin->getName();
    }

    protected function formatSearchResult(ResultSet $searchResult, array $requestParameters)
    {
        $result = $this->rawCatalogSearchResultFormatterPlugin->formatResult($searchResult, $requestParameters);
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
