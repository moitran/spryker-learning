<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Communication\Plugin\Event\Listener;

use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class CustomerProductPriceEventListener
 *
 * @package Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\Listener
 * @method \Pyz\Zed\CustomerProductPriceStorage\Business\CustomerProductPriceStorageFacadeInterface getFacade() : AbstractFacade
 */
class CustomerProductPriceStorageEventListener extends AbstractPlugin implements EventHandlerInterface
{
    /**
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface $transfer
     * @param string $eventName
     *
     * @return void
     */
    public function handle(TransferInterface $transfer, $eventName)
    {
        /** @var \Generated\Shared\Transfer\EventEntityTransfer $transfer */
        $this->getFacade()->publish($transfer);
    }
}
