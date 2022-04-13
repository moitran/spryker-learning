<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Communication\Plugin\ProductPageSearch\MapExpander;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearchExtension\Dependency\PageMapBuilderInterface;
use Spryker\Zed\ProductPageSearchExtension\Dependency\Plugin\ProductAbstractMapExpanderPluginInterface;

/**
 * Class CustomerProductPriceSearchMapExpanderPlugin
 * @package Pyz\Zed\CustomerProductPriceSearch\Communication\Plugin\ProductPageSearch\MapExpander
 */
class CustomerProductPriceSearchMapExpanderPlugin extends AbstractPlugin implements ProductAbstractMapExpanderPluginInterface
{
    const PRICE_KEY = 'customer_prices';

    /**
     * @param PageMapTransfer $pageMapTransfer
     * @param PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param LocaleTransfer $localeTransfer
     *
     * @return PageMapTransfer
     */
    public function expandProductMap(
        PageMapTransfer $pageMapTransfer,
        PageMapBuilderInterface $pageMapBuilder,
        array $productData,
        LocaleTransfer $localeTransfer
    ) {
        $prices = $productData[self::PRICE_KEY];

        $pageMapBuilder->addSearchResultData($pageMapTransfer, self::PRICE_KEY, $prices);

        return $pageMapTransfer;
    }
}
