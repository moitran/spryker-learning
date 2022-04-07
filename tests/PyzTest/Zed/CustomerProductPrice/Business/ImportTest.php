<?php

namespace PyzTest\Zed\CustomerProductPrice\Business;

use Codeception\Test\Unit;
use Pyz\Zed\CustomerProductPrice\Business\Importer;
use Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceEntityManager;
use Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery;
use Pyz\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery;

/**
 * Class ImportTest
 * @package PyzTest\Zed\CustomerProductPrice\Business
 */
class ImportTest extends Unit
{
    public function testImportSuccess()
    {
        // A1 - arrange
        $filePath = dirname(__DIR__) . '/_data/data-import.json';
        $importer = new Importer(new CustomerProductPriceEntityManager());

        // A2 - act
        $success = $importer->import($filePath);

        // A3 - assert
        $this->assertTrue($success);
        $this->assertEquals(4, PyzCustomerProductQuery::create()->count());
        $this->assertEquals(7, PyzCustomerProductPriceQuery::create()->count());
    }

    public function testParsingFileFailed()
    {
        // A1 - arrange
        $filePath = dirname(__DIR__) . '/_data/data-import-invalid-format.json';
        $importer = new Importer(new CustomerProductPriceEntityManager());

        // A2 - act
        try {
            $importer->import($filePath);
        } catch (\Exception $e) {
            // A3 - assert
            $this->assertEquals('Json file invalid', $e->getMessage());
        }
    }

    public function testImportFileIsUnread()
    {
        // A1 - arrange
        $filePath = dirname(__DIR__) . '/_data/data-import-not-found.json';
        $importer = new Importer(new CustomerProductPriceEntityManager());

        // A2 - act
        $failed = $importer->import($filePath);

        // A3 - assert
        $this->assertFalse($failed);
    }

    public function testImportFilePathEmpty()
    {
        // A1 - arrange
        $filePath = '';
        $importer = new Importer(new CustomerProductPriceEntityManager());

        // A2 - act
        $failed = $importer->import($filePath);

        // A3 - assert
        $this->assertFalse($failed);
    }
}
