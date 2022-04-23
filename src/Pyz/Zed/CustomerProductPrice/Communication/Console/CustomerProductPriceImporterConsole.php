<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Communication\Console;

use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CustomerProductPriceImporterConsole
 *
 * @package Pyz\Zed\CustomerProductPrice\Communication\Console
 * @method \Pyz\Zed\CustomerProductPrice\Business\CustomerProductPriceFacadeInterface getFacade() : AbstractFacade
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceQueryContainerInterface getQueryContainer()
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceRepositoryInterface getRepository()
 */
class CustomerProductPriceImporterConsole extends Console
{
    /**
     * @return void
     */
    public function configure()
    {
        $this->setName('data:import:customer_product_price')
            ->setDescription('Import CustomerProductPrice by json files')
            ->addArgument(
                'filePath',
                InputArgument::OPTIONAL,
                'Json file path which you want to import data',
                'data/import/local/common/customer_product_prices.json',
            );
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
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
