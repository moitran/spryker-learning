<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Reader;

/**
 * Interface FileReaderInterface
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Reader
 */
interface FileReaderInterface
{
    /**
     * @param string $filePath
     *
     * @return string
     */
    public function read(string $filePath): string;
}
