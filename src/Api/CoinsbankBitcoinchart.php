<?php

namespace Coinsbank\Api;

use Coinsbank\Coinsbank;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class CoinsbankBitcoinchart
 *
 * @package Coinsbank\Api
 */
class CoinsbankBitcoinchart extends Coinsbank
{
    const URL_TRADES = '/bitcoincharts/trades';
    const URL_ORDERBOOK = '/bitcoincharts/orderbook';

    /**
     * Gets trade history.
     *
     * @param $currencyPair
     * @return \Coinsbank\Transport\CoinsbankResponse
     */
    public function getTrades($currencyPair)
    {
        return $this->get(self::URL_TRADES . '/' . $currencyPair);
    }

    /**
     * Gets orderbook.
     *
     * @param $currencyPair
     * @return \Coinsbank\Transport\CoinsbankResponse
     */
    public function getOrderBook($currencyPair)
    {
        return $this->get(self::URL_ORDERBOOK . '/' . $currencyPair);
    }

    /**
     * Sends a request to REST-API and returns the result.
     *
     * @param $method
     * @param $path
     * @param array $data
     * @return CoinsbankResponse
     */
    public function sendRequest(
        $method,
        $path,
        array $data = array()
    ) {
        $data['headers'] = array('Content-Type' => 'application/json');

        return $this->context->getClient()->send($method, $this->getApiUri() . $path, $data);
    }
}