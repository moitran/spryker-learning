<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Stream;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\CustomerProductPriceEvents;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Mapper\CustomerProductPriceMapper;
use Spryker\Zed\Event\Business\EventFacadeInterface;
use SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface;

class CustomerProductPriceEventWriteStream implements WriteStreamInterface
{
    /**
     * @var \Spryker\Zed\Event\Business\EventFacadeInterface
     */
    protected $eventFacade;

    /**
     * @var \Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer
     */
    protected $collectionTransfer;

    /**
     * @param \Spryker\Zed\Event\Business\EventFacadeInterface $eventFacade
     */
    public function __construct(EventFacadeInterface $eventFacade)
    {
        $this->eventFacade = $eventFacade;
    }

    /**
     * @return bool
     */
    public function open(): bool
    {
        $this->collectionTransfer = new CustomerProductPriceCollectionTransfer();

        return true;
    }

    /**
     * @return bool
     */
    public function close(): bool
    {
        return false;
    }

    /**
     * @param int $offset
     * @param int $whence
     *
     * @return int
     */
    public function seek(int $offset, int $whence): int
    {
        return static::STATUS_SEEK_SUCCESS;
    }

    /**
     * @return bool
     */
    public function eof(): bool
    {
        return true;
    }

    /**
     * @param array $data
     *
     * @return int
     */
    public function write(array $data): int
    {
        $customerProductTransfer = new CustomerProductTransfer();
        $customerProductTransfer->fromArray($data, true);

        foreach ($data[CustomerProductPriceMapper::MAP_COL_PRICES] as $price) {
            $customerProductPriceTransfer = new CustomerProductPriceTransfer();
            $customerProductPriceTransfer->fromArray($price, true);
            $customerProductTransfer->addCustomerProductPrice($customerProductPriceTransfer);
        }
        $this->collectionTransfer->addCustomerProduct($customerProductTransfer);

        return 1;
    }

    /**
     * @return bool
     */
    public function flush(): bool
    {
        $this->eventFacade->triggerBulk(
            CustomerProductPriceEvents::CUSTOMER_PRODUCT_PRICE_IMPORT,
            $this->collectionTransfer->getCustomerProducts()->getArrayCopy()
        );

        return true;
    }
}
