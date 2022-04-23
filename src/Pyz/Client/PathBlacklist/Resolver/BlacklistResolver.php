<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\PathBlacklist\Resolver;

use Generated\Shared\Transfer\UrlStorageTransfer;
use Spryker\Client\UrlStorage\UrlStorageClientInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class BlacklistResolver
 *
 * @package Pyz\Client\PathBlacklist\Resolver
 */
class BlacklistResolver implements BlacklistResolverInterface
{
    /**
     * @var \Spryker\Client\UrlStorage\UrlStorageClientInterface
     */
    protected $urlStorageClient;

    /**
     * @param \Spryker\Client\UrlStorage\UrlStorageClientInterface $urlStorageClient
     */
    public function __construct(UrlStorageClientInterface $urlStorageClient)
    {
        $this->urlStorageClient = $urlStorageClient;
    }

    /**
     * @param \Generated\Shared\Transfer\UrlStorageTransfer $urlStorageTransfer
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return void
     */
    public function blacklistChecking(UrlStorageTransfer $urlStorageTransfer): void
    {
        $urlStorageTransfer = $this->urlStorageClient->findUrlStorageTransferByUrl($urlStorageTransfer->getUrl());
        if ($urlStorageTransfer->getBlacklist()) {
            throw new NotFoundHttpException();
        }
    }
}
