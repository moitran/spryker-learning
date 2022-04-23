<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Importer;

use Pyz\Zed\CustomerProductPrice\Business\Importer\Parser\JsonToDtoParserInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Reader\FileReaderInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\FileValidatorInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\WriterInterface;

/**
 * Class Importer
 *
 * @package Pyz\Zed\CustomerProductPrice\Business
 */
class Importer implements ImporterInterface
{
    /**
     * @var \Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\FileValidatorInterface
     */
    protected $fileValidator;

    /**
     * @var \Pyz\Zed\CustomerProductPrice\Business\Importer\Reader\FileReaderInterface
     */
    protected $fileReader;

    /**
     * @var \Pyz\Zed\CustomerProductPrice\Business\Importer\Parser\JsonToDtoParserInterface
     */
    protected $parser;

    /**
     * @var \Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\WriterInterface
     */
    protected $writer;

    /**
     * @param \Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\FileValidatorInterface $fileValidator
     * @param \Pyz\Zed\CustomerProductPrice\Business\Importer\Reader\FileReaderInterface $fileReader
     * @param \Pyz\Zed\CustomerProductPrice\Business\Importer\Parser\JsonToDtoParserInterface $parser
     * @param \Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\WriterInterface $writer
     */
    public function __construct(
        FileValidatorInterface $fileValidator,
        FileReaderInterface $fileReader,
        JsonToDtoParserInterface $parser,
        WriterInterface $writer
    ) {
        $this->fileValidator = $fileValidator;
        $this->fileReader = $fileReader;
        $this->parser = $parser;
        $this->writer = $writer;
    }

    /**
     * @param string $filePath
     *
     * @return bool
     */
    public function import(string $filePath): bool
    {
        // 1. Validate file
        if (!$this->fileValidator->isFilePathValid($filePath)) {
            return false;
        }

        // 2. Read file content
        $fileContent = $this->fileReader->read($filePath);

        // 3. Parse json data to Data Transfer Object Collection
        $dataTransferObjects = $this->parser->parse($fileContent);

        // 4. Trigger event writer
        $this->writer->writeCollection($dataTransferObjects);

        return true;
    }
}
