<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer;

/**
 * Interface ImporterInterface
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer
 */
interface ImporterInterface
{
    /**
     * @param string $filePath
     *
     * @return bool
     */
    public function import(string $filePath): bool;
}
