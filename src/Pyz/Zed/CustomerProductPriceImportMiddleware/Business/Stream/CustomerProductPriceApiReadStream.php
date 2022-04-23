<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Stream;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface;
use SprykerMiddleware\Zed\Process\Business\Exception\InvalidReadSourceException;
use Symfony\Component\HttpFoundation\Response;

class CustomerProductPriceApiReadStream implements ReadStreamInterface
{
    /**
     * @var \GuzzleHttp\ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var int
     */
    protected $position = 0;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->setClient(new Client());
    }

    /**
     * @return \GuzzleHttp\ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * @param \GuzzleHttp\ClientInterface $client
     *
     * @return void
     */
    public function setClient(ClientInterface $client): void
    {
        $this->client = $client;
    }

    /**
     * @return bool
     */
    public function open(): bool
    {
        $this->data = $this->loadJson();

        return true;
    }

    /**
     * @return bool
     */
    public function close(): bool
    {
        return true;
    }

    /**
     * @return mixed|false
     */
    public function read()
    {
        if (!$this->eof()) {
            return $this->data[$this->position++];
        }

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
        $newPosition = $this->getNewPosition($offset, $whence);
        if ($newPosition < 0 || $newPosition > count($this->data)) {
            return static::STATUS_SEEK_FAIL;
        }
        $this->position = $newPosition;

        return static::STATUS_SEEK_SUCCESS;
    }

    /**
     * @return bool
     */
    public function eof(): bool
    {
        return $this->position >= count($this->data);
    }

    /**
     * @throws \SprykerMiddleware\Zed\Process\Business\Exception\InvalidReadSourceException
     *
     * @return mixed
     */
    protected function loadJson()
    {
        $apiResponse = $this->getClient()->get($this->url);

        if ($apiResponse->getStatusCode() != Response::HTTP_OK) {
            throw new InvalidReadSourceException('API endpoint response unsuccess HTTP Code: ' . $apiResponse->getStatusCode());
        }

        $data = json_decode($apiResponse->getBody()->getContents(), true);
        if ((json_last_error() !== JSON_ERROR_NONE)) {
            throw new InvalidReadSourceException('Invalid json: ' . json_last_error_msg());
        }

        return $data;
    }

    /**
     * @param int $offset
     * @param int $whence
     *
     * @return int
     */
    protected function getNewPosition(int $offset, int $whence)
    {
        $newPosition = $this->position;
        if ($whence === SEEK_SET) {
            $newPosition = $offset;
        }

        if ($whence === SEEK_CUR) {
            $newPosition = $this->position + $offset;
        }

        if ($whence === SEEK_END) {
            $offset = $offset <= 0 ? $offset : 0;
            $newPosition = count($this->data) + $offset;
        }

        return $newPosition;
    }
}
