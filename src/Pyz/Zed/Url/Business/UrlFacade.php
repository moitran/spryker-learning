<?php

namespace Pyz\Zed\Url\Business;
use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Url\Business\UrlFacade as SprykerUrlFacade;

/**
 * @method UrlBusinessFactory getFactory()
 */
class UrlFacade extends SprykerUrlFacade implements UrlFacadeInterface
{
    /**
     * @param string $eventName
     * @param PathBlacklistTransfer $pathBlacklistTransfer
     *
     * @return void
     */
    public function setBlacklistByPath(string $eventName, PathBlacklistTransfer $pathBlacklistTransfer): void
    {
        $this->getFactory()->createBlacklistHandler()->setBlacklistByPath($eventName, $pathBlacklistTransfer);
    }
}
