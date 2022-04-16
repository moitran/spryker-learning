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
    public const MAX_ITEMS_PER_PAGE = 100;

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
     * @param int $pageNumber
     *
     * @return SiteMapCollectionTransfer
     */
    public function getPageData(int $pageNumber): SiteMapCollectionTransfer
    {
        $urlCachedKeys = $this->getUrlCachedKeys();
        $urlCachedKeys = $this->formatAndSort($urlCachedKeys);
        $urlCachedKeys = $this->pagination($urlCachedKeys, $pageNumber);

        $urls = $this->storageClient->getMulti($urlCachedKeys);

        // Transfer to DTO
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

    /**
     * @return int
     */
    public function getTotalPage() : int
    {
        $urlCachedKeys = $this->getUrlCachedKeys();
        return count(array_chunk($urlCachedKeys, static::MAX_ITEMS_PER_PAGE));
    }

    /**
     * @return array
     */
    protected function getUrlCachedKeys()
    {
        // Get all cache key belong to 'url:'
        return $this->storageClient->getKeys('url:*');
    }

    /**
     * @param array $urlCachedKeys
     *
     * @return array
     */
    protected function formatAndSort(array $urlCachedKeys) : array
    {
        // Format cache key - remove 'kv:' prefix
        $urlCachedKeys = array_map(function ($cachedKey) {
            return substr($cachedKey, 3);
        }, $urlCachedKeys);
        // Sort cached key asc
        sort($urlCachedKeys);

        return $urlCachedKeys;
    }

    /**
     * @param array $list
     * @param int $pageNumber
     *
     * @return array
     */
    protected function pagination(array $list, int $pageNumber) : array
    {
        $chunk = array_chunk($list, static::MAX_ITEMS_PER_PAGE);

        return isset($chunk[$pageNumber - 1]) ? $chunk[$pageNumber - 1] : [];
    }
}
