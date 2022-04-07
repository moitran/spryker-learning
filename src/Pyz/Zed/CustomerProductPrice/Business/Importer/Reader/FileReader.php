<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Reader;

use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * Class FileReader
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Reader
 */
class FileReader implements FileReaderInterface
{
    /**
     * @param string $filePath
     *
     * @return string
     */
    public function read(string $filePath): string
    {
        $content = file_get_contents($filePath);

        if (!$content) {
            throw new FileException('File did not read successfully');
        }

        return $content;
    }
}
