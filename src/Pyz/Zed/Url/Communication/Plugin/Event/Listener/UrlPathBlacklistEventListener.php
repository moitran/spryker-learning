<?php

namespace Pyz\Zed\Url\Communication\Plugin\Event\Listener;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Zed\Url\Business\UrlFacadeInterface;
use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method UrlFacadeInterface getFacade()
 */
class UrlPathBlacklistEventListener extends AbstractPlugin implements EventHandlerInterface
{
    /**
     * @param TransferInterface $transfer
     * @param string $eventName
     */
    public function handle(TransferInterface $transfer, $eventName)
    {
        /**
         * @var PathBlacklistTransfer $transfer
         */
        $this->getFacade()->setBlacklistByPath($eventName, $transfer);
    }
}
