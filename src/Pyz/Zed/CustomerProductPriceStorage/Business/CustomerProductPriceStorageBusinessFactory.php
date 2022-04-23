<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Business;

use Pyz\Zed\CustomerProductPriceStorage\Business\Converter\Converter;
use Pyz\Zed\CustomerProductPriceStorage\Business\Converter\ConverterInterface;
use Pyz\Zed\CustomerProductPriceStorage\Business\Publisher\StoragePublisher;
use Pyz\Zed\CustomerProductPriceStorage\Business\Publisher\StoragePublisherInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * Class CustomerProductPriceStorageBusinessFactory
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Business
 * @method \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageEntityManager getEntityManager()
 * @method \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageRepositoryInterface getRepository()
 */
class CustomerProductPriceStorageBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\CustomerProductPriceStorage\Business\Publisher\StoragePublisherInterface
     */
    public function createStoragePublisher(): StoragePublisherInterface
    {
        return new StoragePublisher(
            $this->getRepository(),
            $this->getEntityManager(),
            $this->createConverter()
        );
    }

    /**
     * @return \Pyz\Zed\CustomerProductPriceStorage\Business\Converter\ConverterInterface
     */
    protected function createConverter(): ConverterInterface
    {
        return new Converter();
    }
}
