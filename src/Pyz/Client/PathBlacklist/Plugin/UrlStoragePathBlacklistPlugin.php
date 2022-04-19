<?php

namespace Pyz\Client\PathBlacklist\Plugin;

use Generated\Shared\Transfer\UrlStorageResourceMapTransfer;
use Generated\Shared\Transfer\UrlStorageTransfer;
use Pyz\Client\PathBlacklist\PathBlacklistClientInterface;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\UrlStorage\Dependency\Plugin\UrlStorageResourceMapperPluginInterface;

/**
 * Class UrlStoragePathBlacklistPlugin
 * @package Pyz\Client\PathBlacklist\Plugin
 * @method PathBlacklistClientInterface getClient()
 */
class UrlStoragePathBlacklistPlugin extends AbstractPlugin implements UrlStorageResourceMapperPluginInterface
{
    /**
     * @param UrlStorageTransfer $urlStorageTransfer
     * @param array $options
     *
     * @return \Generated\Shared\Transfer\UrlStorageResourceMapTransfer|void
     */
    public function map(UrlStorageTransfer $urlStorageTransfer, array $options = [])
    {
        $this->getClient()->blacklistChecking($urlStorageTransfer);

        return new UrlStorageResourceMapTransfer();
    }
}
