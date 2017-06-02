Installation
-------------

```shell
$    composer require hughes/spgateway-store
```

### Use RequestBuilder make a request to get spgateway cvs form.

```php
<?php

        use VeryBuy\Payment\Spgateway\Core\RequestBuilder;
        use VeryBuy\Payment\Spgateway\Core\Support\RequestContract;
        use VeryBuy\Payment\Spgateway\Store\StoreRequest;

        $builder = new RequestBuilder([
            'HashKey' => 'jpUGFaomQbYR0xNZW8wEo5Hz7gWXrNBL',
            'HashIV' => 'dwsSGQfx1eo2Mb1I',
            'MerchantID' => 'MS31685353'
        ], RequestContract::REQUEST_URI_TEST);

        $request = new StoreRequest([
            'Amt' => 30,                                // 金額不能低於 30 或大於 20,000
            'MerchantOrderNo' => 'T'.time(),
            'ItemDesc' => 'Spgateway payment test.',
            'Email' => 'hughes@pht-studio.com',
            'NotifyURL' => '付款接收 URL',
            'CustomerURL' => '取號接收 URL',
            'ClientBackURL' => '返回 URL',
        ]);
```