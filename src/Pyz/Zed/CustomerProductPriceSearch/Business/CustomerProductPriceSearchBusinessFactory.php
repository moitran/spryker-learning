<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Business;

use Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander\DataExpander;
use Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander\DataExpanderInterface;
use Pyz\Zed\CustomerProductPriceSearch\Business\Model\Loader\DataLoader;
use Pyz\Zed\CustomerProductPriceSearch\Business\Model\Loader\DataLoaderInterface;
use Pyz\Zed\CustomerProductPriceSearch\Persistence\CustomerProductPriceSearchRepositoryInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * Class CustomerProductPriceSearchBusinessFactory
 * @package Pyz\Zed\CustomerProductPriceSearch\Business
 * @method CustomerProductPriceSearchRepositoryInterface getRepository()
 */
class CustomerProductPriceSearchBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return DataLoaderInterface
     */
    public function createDataLoader(): DataLoaderInterface
    {
        return new DataLoader(
            $this->getRepository()
        );
    }

    /**
     * @return DataExpanderInterface
     */
    public function createExpander(): DataExpanderInterface
    {
        return new DataExpander();
    }
}
