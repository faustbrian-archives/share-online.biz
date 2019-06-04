# Share-Online.biz PHP Client

[![Build Status](https://img.shields.io/travis/plients/Share-Online.biz-PHP-Client/master.svg?style=flat-square)](https://travis-ci.org/plients/Share-Online.biz-PHP-Client)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/plients/shareonline.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/plients/Share-Online.biz-PHP-Client.svg?style=flat-square)](https://github.com/plients/Share-Online.biz-PHP-Client/releases)
[![License](https://img.shields.io/packagist/l/plients/Share-Online.biz-PHP-Client.svg?style=flat-square)](https://packagist.org/packages/plients/Share-Online.biz-PHP-Client)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
$ composer require plients/share-online
```

## Usage

```php
$client = new Plients\ShareOnlineBiz\Client();
$client->setConfig(['apiKey' => 'YOUR_API_KEY']);

$response = $client->api('File')->scan('infected.rar');

dump($response);
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://basecode.sh)
