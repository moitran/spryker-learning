<?php

namespace Pyz\Zed\Url\Business;
use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Zed\Url\Business\UrlFacade as SprykerUrlFacade;

/**
 * @method UrlBusinessFactory getFactory()
 * @method \Pyz\Zed\Url\Persistence\UrlRepositoryInterface getRepository()
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

    /**
     * @param string $path
     *
     * @return array
     */
    public function findUrlByPath(string $path) : array
    {
        return $this->getRepository()->findUrlByPath($path);
    }
}
