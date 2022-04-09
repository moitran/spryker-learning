<?php

namespace Pyz\Zed\CustomerProductPrice\Communication\Console;

use Pyz\Zed\CustomerProductPrice\Business\CustomerProductPriceFacadeInterface;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CustomerProductPriceImporterConsole
 * @package Pyz\Zed\CustomerProductPrice\Communication\Console
 * @method CustomerProductPriceFacadeInterface getFacade() : AbstractFacade
 */
class CustomerProductPriceImporterConsole extends Console
{
    public function configure()
    {
        $this->setName('data:import:customer_product_price')
            ->setDescription('Import CustomerProductPrice by json files')
            ->addArgument(
                'filePath',
                InputArgument::OPTIONAL,
                'Json file path which you want to import data',
                'tests/PyzTest/Zed/CustomerProductPrice/_data/data-import.json',
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return bool|int
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $this->getFacade()->importFromJsonFile($filePath);

        return 1;
    }
}
