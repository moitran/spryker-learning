<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\PathBlacklist;

use Generated\Shared\Transfer\UrlStorageTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * Class PathBlacklistClient
 *
 * @package Pyz\Client\PathBlacklist
 * @method \Pyz\Client\PathBlacklist\PathBlacklistFactory getFactory()
 */
class PathBlacklistClient extends AbstractClient implements PathBlacklistClientInterface
{
    /**
     * Specification:
     * - Checking is URL in path blacklist -> throw not found exception
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UrlStorageTransfer $urlStorageTransfer
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return void
     */
    public function blacklistChecking(UrlStorageTransfer $urlStorageTransfer): void
    {
        $this->getFactory()->createBlacklistResolver()->blacklistChecking($urlStorageTransfer);
    }
}
