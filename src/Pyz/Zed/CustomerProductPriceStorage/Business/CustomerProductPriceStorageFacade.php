<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Business;

use Generated\Shared\Transfer\EventEntityTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class CustomerProductPriceStorageFacade
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Business
 * @method \Pyz\Zed\CustomerProductPriceStorage\Business\CustomerProductPriceStorageBusinessFactory getFactory()
 * @method \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageRepositoryInterface getRepository()
 */
class CustomerProductPriceStorageFacade extends AbstractFacade implements CustomerProductPriceStorageFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\EventEntityTransfer $transfer
     *
     * @return void
     */
    public function publish(EventEntityTransfer $transfer): void
    {
        $this->getFactory()->createStoragePublisher()->publish($transfer);
    }
}
