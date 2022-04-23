<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceSearch\Business;

use Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander\DataExpander;
use Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander\DataExpanderInterface;
use Pyz\Zed\CustomerProductPriceSearch\Business\Model\Loader\DataLoader;
use Pyz\Zed\CustomerProductPriceSearch\Business\Model\Loader\DataLoaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * Class CustomerProductPriceSearchBusinessFactory
 *
 * @package Pyz\Zed\CustomerProductPriceSearch\Business
 * @method \Pyz\Zed\CustomerProductPriceSearch\Persistence\CustomerProductPriceSearchRepositoryInterface getRepository()
 */
class CustomerProductPriceSearchBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\CustomerProductPriceSearch\Business\Model\Loader\DataLoaderInterface
     */
    public function createDataLoader(): DataLoaderInterface
    {
        return new DataLoader(
            $this->getRepository()
        );
    }

    /**
     * @return \Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander\DataExpanderInterface
     */
    public function createExpander(): DataExpanderInterface
    {
        return new DataExpander();
    }
}
