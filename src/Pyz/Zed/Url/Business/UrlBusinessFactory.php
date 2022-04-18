<?php

namespace Pyz\Zed\Url\Business;

use Pyz\Zed\Url\Business\BlacklistEventHandler\BlacklistHandler;
use Pyz\Zed\Url\Business\BlacklistEventHandler\BlacklistHandlerInterface;
use Pyz\Zed\Url\Persistence\UrlEntityManagerInterface;
use Spryker\Zed\Url\Business\UrlBusinessFactory as SprykerUrlBusinessFactory;

/**
 * @method UrlEntityManagerInterface getEntityManager()
 */
class UrlBusinessFactory extends SprykerUrlBusinessFactory
{
    /**
     * @return BlacklistHandlerInterface
     */
    public function createBlacklistHandler() : BlacklistHandlerInterface
    {
        return new BlacklistHandler(
            $this->getEntityManager()
        );
    }
}
