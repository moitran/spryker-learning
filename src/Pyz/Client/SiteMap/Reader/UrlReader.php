<?php


namespace Pyz\Client\SiteMap\Reader;

use Generated\Shared\Transfer\SiteMapCollectionTransfer;
use Generated\Shared\Transfer\SiteMapTransfer;
use Spryker\Client\Storage\StorageClientInterface;

/**
 * Class UrlReader
 * @package Pyz\Client\SiteMap\Reader
 */
class UrlReader implements UrlReaderInterface
{
    /**
     * @var StorageClientInterface
     */
    protected $storageClient;

    /**
     * UrlReader constructor.
     *
     * @param StorageClientInterface $storageClient
     */
    public function __construct(StorageClientInterface $storageClient)
    {
        $this->storageClient = $storageClient;
    }

    /**
     * @return SiteMapCollectionTransfer
     */
    public function getAllUrlStorage(): SiteMapCollectionTransfer
    {
        // 1. get all cache key belong to 'url:'
        $urlCachedKeys = $this->storageClient->getKeys('url:*');
        // 2. format cache key - remove 'kv:' prefix
        $urlCachedKeys = array_map(function ($cachedKey) {
            return substr($cachedKey, 3);
        }, $urlCachedKeys);
        // 3. sort cached key asc
        sort($urlCachedKeys);
        // 4. get cache data for all urls
        $urls = $this->storageClient->getMulti($urlCachedKeys);

        // 5. transfer to DTO
        $collection = new SiteMapCollectionTransfer();
        foreach ($urls as $url) {
            $urlData = json_decode($url, true);
            $sitemapTransfer = new SiteMapTransfer();
            $sitemapTransfer->setUrl($urlData['url']);
            $sitemapTransfer->setLastModified(date("Y-m-d", $urlData['_timestamp']));
            $collection->addSiteMap($sitemapTransfer);
        }

        return $collection;
    }
}
