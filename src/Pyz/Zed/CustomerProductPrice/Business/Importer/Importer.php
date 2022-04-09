<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer;

use Pyz\Zed\CustomerProductPrice\Business\Importer\Parser\JsonToDtoParserInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Reader\FileReaderInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Validator\FileValidatorInterface;
use Pyz\Zed\CustomerProductPrice\Business\Importer\Writer\WriterInterface;

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
     * @var WriterInterface
     */
    protected $eventWriter;

    /**
     * Importer constructor.
     *
     * @param FileValidatorInterface $fileValidator
     * @param FileReaderInterface $fileReader
     * @param JsonToDtoParserInterface $parser
     * @param WriterInterface $eventWriter
     */
    public function __construct(
        FileValidatorInterface $fileValidator,
        FileReaderInterface $fileReader,
        JsonToDtoParserInterface $parser,
        WriterInterface $eventWriter
    ) {
        $this->fileValidator = $fileValidator;
        $this->fileReader = $fileReader;
        $this->parser = $parser;
        $this->eventWriter = $eventWriter;
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

        // 4. Trigger event writer
        $this->eventWriter->writeCollection($dataTransferObjects);

        return true;
    }
}
