# Warehouse

[![Latest Version on Packagist][ico-version]][link-packagist]
[![PHP Version][ico-php-version]][link-packagist]
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

Get the fork lift - Manage data repositories with cache and database layers in the [Codeigniter](https://codeigniter.com/) framework.

## Requirements

- PHP >= 7.1.0
- CodeIgnitor 3.x

## Installation

Install the library via composer:
```bash
composer require tfhinc/ci-warehouse
```

Run the post install command to publish the helper and class files to the appropriate CI directories:
```bash
composer --working-dir=vendor/tfhinc/ci-warehouse/ run-script publish-files
```

## Loading the Library

There are a few available options for loading the Warehouse library:

### Using the `warehouse()` helper function

The Warehouse helper function will resolve the warehouse class via the CI instance. It will either load the class or return the existing class instance:

``` php
$this->load->helper('warehouse');
```

### Using the Warehouse Class

The Warehouse class can be instantiated when you require it:

``` php
$redis = new TFHInc/Warehouse/Warehouse();
```

### Using the Warehouse CI Library

The Warehouse class can be loaded like any other CI library:

``` php
$this->load->library('Warehouse');
```

## Usage

```php

// Use the helper method

$this->CI->load->helper('warehouse');

$books = warehouse()->load('Books');

// Use the Warehouse class

$warehouse = new TFHInc\Warehouse\Warehouse();

$books = $warehouse->load('Books');

// Use the Warehouse CI Library

$this->load->library('Warehouse');

$books = $warehouse->load('Books');
```

## Contributing

Feel free to create a GitHub issue or send a pull request with any bug fixes. Please see the GutHub issue tracker for isses that require help.

## Acknowledgements

- [Colin Rafuse][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/tfhinc/ci-warehouse.svg?style=flat-square
[ico-php-version]: https://img.shields.io/packagist/php-v/tfhinc/ci-warehouse.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tfhinc/ci-warehouse.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/tfhinc/ci-warehouse
[link-downloads]: https://packagist.org/packages/tfhinc/ci-warehouse
[link-author]: https://github.com/crafuse
[link-contributors]: ../../contributors
