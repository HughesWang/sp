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
            'HashKey' => '{Spgateway HashKey}',
            'HashIV' => '{Spgateway HashIV}',
            'MerchantID' => '{Spgateway MerchantID}'
        ], RequestContract::REQUEST_URI_TEST);

        $request = new StoreRequest([
            'Amt' => 30,                                // 金額不能低於 30 或大於 20,000
            'MerchantOrderNo' => 'T'.time(),
            'ItemDesc' => 'Spgateway payment test.',
            'Email' => '{email}',
            'NotifyURL' => '付款接收 URL',
            'CustomerURL' => '取號接收 URL',
            'ClientBackURL' => '返回 URL',
        ]);
```
