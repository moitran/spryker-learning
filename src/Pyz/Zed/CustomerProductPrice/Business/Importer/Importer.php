<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer;

use Pyz\Zed\CustomerProductPrice\Business\Importer\Parser\JsonToDtoParserInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Reader\FileReaderInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\FileValidatorInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\DatabaseWriterInterface;

/**
 * Class Importer
 * @package Pyz\Zed\CustomerProductPrice\Business
 */
class Importer implements ImporterInterface
{
    /**
     * @var FileValidatorInterface
     */
    protected $fileValidator;

    /**
     * @var FileReaderInterface
     */
    protected $fileReader;

    /**
     * @var JsonToDtoParserInterface
     */
    protected $parser;

    /**
     * @var DatabaseWriterInterface
     */
    protected $writer;

    /**
     * Importer constructor.
     *
     * @param FileValidatorInterface $fileValidator
     * @param FileReaderInterface $fileReader
     * @param JsonToDtoParserInterface $parser
     * @param DatabaseWriterInterface $writer
     */
    public function __construct(
        FileValidatorInterface $fileValidator,
        FileReaderInterface $fileReader,
        JsonToDtoParserInterface $parser,
        DatabaseWriterInterface $writer
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
     * @throws \Exception
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

        // 4. Write data into Database
        $this->writer->writeCollection($dataTransferObjects);

        return true;
    }
}
