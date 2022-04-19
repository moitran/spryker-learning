<?php

namespace Pyz\Client\PathBlacklist;

use Generated\Shared\Transfer\UrlStorageTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * Class PathBlacklistClient
 * @package Pyz\Client\PathBlacklist
 * @method PathBlacklistFactory getFactory()
 */
class PathBlacklistClient extends AbstractClient implements PathBlacklistClientInterface
{
    /**
     * Specification:
     * - Checking is URL in path blacklist -> throw not found exception
     *
     * @api
     *
     * @param UrlStorageTransfer $urlStorageTransfer
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function blacklistChecking(UrlStorageTransfer $urlStorageTransfer): void
    {
        $this->getFactory()->createBlacklistResolver()->blacklistChecking($urlStorageTransfer);
    }
}
