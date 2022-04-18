<?php

namespace Pyz\Zed\Url\Persistence;

interface UrlEntityManagerInterface
{
    /**
     * @param string $path
     * @param bool $blacklistValue
     *
     * @return void
     */
    public function updateUrlBlacklistByPath(string $path, bool $blacklistValue) : void;
}
