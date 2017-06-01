<?php

namespace Tests\Payment\Spgateway\Store;

use VeryBuy\Payment\Spgateway\Core\RequestBuilder;
use VeryBuy\Payment\Spgateway\Core\Support\RequestContract;
use VeryBuy\Payment\Spgateway\Store\StoreRequest;

class StoreRequestTest extends AbstractTestCase
{
    protected $optionsStub = [
        'HashKey' => 'jpUGFaomQbYR0xNZW8wEo5Hz7gWXrNBL',
        'HashIV' => 'dwsSGQfx1eo2Mb1I',
        'MerchantID' => 'MS31685353'
    ];

    public function testStoreRequest()
    {
    	$builder = new RequestBuilder(
            $this->optionsStub,
            RequestContract::REQUEST_URI_TEST
        );

		$request = new StoreRequest([
            'Amt' => 30,
            'MerchantOrderNo' => 'T'.time(),
            'ItemDesc' => 'Spgateway payment test.',
            'Email' => 'hughes@pht-studio.com',
            'NotifyURL' => 'https://bank.cola-hughes.com/api/spgateway/notify',
            'CustomerURL' => 'https://bank.cola-hughes.com/api/spgateway/customer',
            'ClientBackURL' => 'https://bank.cola-hughes.com/api/spgateway/back',
		]);

        $this->assertContains('form', $builder->make($request));
    }
}
