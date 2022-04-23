<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceSearch\Communication\Plugin\ProductPageSearch\MapExpander;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearchExtension\Dependency\PageMapBuilderInterface;
use Spryker\Zed\ProductPageSearchExtension\Dependency\Plugin\ProductAbstractMapExpanderPluginInterface;

/**
 * Class CustomerProductPriceSearchMapExpanderPlugin
 *
 * @package Pyz\Zed\CustomerProductPriceSearch\Communication\Plugin\ProductPageSearch\MapExpander
 * @method \Pyz\Zed\CustomerProductPriceSearch\Business\CustomerProductPriceSearchFacadeInterface getFacade()
 */
class CustomerProductPriceSearchMapExpanderPlugin extends AbstractPlugin implements ProductAbstractMapExpanderPluginInterface
{
    public const PRICE_KEY = 'customer_prices';

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\ProductPageSearchExtension\Dependency\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
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
