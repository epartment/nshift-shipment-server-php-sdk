# nShift Shipment Server PHP SDK

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)

A library for making requests to the nShift API.

## Install

Via Composer

```bash
$ composer require epartment/nshift-shipment-server-php-sdk
```

## Usage
Here is the example also used on nShifts own page. It submits a shipment and saves the labels as PDF's.

```php
<?php
require_once 'vendor/autoload.php';

$actor = '63';
$key = 'sample';
$env = \Epartment\NShift\ShipmentServer\Client\Client::ENV_DEV;
$client = new \Epartment\NShift\ShipmentServer\Client\Client($actor, $key, [], null, null, $env);

$data = [
    'Kind' => 1,
    'ActorCSID' => $actor,
    'ProdConceptID' => 1032,

    'Addresses' => [
        [
            'Kind' => 2,
            'Name1' => 'Test sender',
            'Street1' => 'Test Address',
            'PostCode' => '0580',
            'City' => 'Oslo',
            'CountryCode' => 'NO'],
        [
            'Kind' => 1,
            'Name1' => 'Ola Testmann',
            'Street1' => 'Test Address 1',
            'PostCode' => '0580',
            'City' => 'Oslo',
            'CountryCode' => 'NO'
        ]
    ],

    'Lines' => [
        [
            'PkgWeight' => 5000,
            'Pkgs' => [
                [
                    'ItemNo' => 1
                ]
            ]
        ]
    ]
];

$options = [
    'Labels' => 'PDF'
];

$request = new \Epartment\NShift\ShipmentServer\Request\SubmitShipmentRequest($data, $options);

/** @var \Epartment\NShift\ShipmentServer\Response\SubmitShippingResponse $response */
$response = $client->doRequest($request);

if ($response->wasSuccessful()) {
    echo "The request was successful, labels saved in: ".getcwd()."\n";
    $response->saveLabels('label-', getcwd());
} else {
    echo "The request was not successful\n";
    print_r($response->getErrors());
}
```

## Testing

```bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/epartment/nshift-shipment-server-php-sdk
