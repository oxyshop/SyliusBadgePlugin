<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>

<h1 align="center">Sylius Badge Plugin</h1>

Add extra badges to product entity.

## Content
- [Installation](#installation)
- [Usage](#usage)
- [Limitations](#limitations) :warning:
- [Development](#development)
- [Implemented functionality](#implemented-functionality)
- [Contributing](#contributing)

### Installation
The best way to install bundle is using Composer:
```bash
$ composer require oxyshop/sylius-badge-plugin
```

And you're done.

Other manual changes are done automatically via [Flex](https://symfony.com/doc/current/setup/flex.html). In case you don't use a Flex, you have to do following steps: 

Register plugin `bundles.php`
```php
// bundles.php

return [
    ...
    Oxyshop\SyliusBadgePlugin\OxyshopSyliusBadgePlugin::class => ['all' => true],
]
```

### Usage

@todo

### Limitations

@todo

### Development

- Using `test` environment:

    ```bash
    $ (cd tests/Application && bin/console sylius:fixtures:load -e test)
    $ (cd tests/Application && bin/console server:run -d public -e test)
    ```
    
- Using `dev` environment:

    ```bash
    $ (cd tests/Application && bin/console sylius:fixtures:load -e dev)
    $ (cd tests/Application && bin/console server:run -d public -e dev)
    ```

### Implemented functionality
@todo

### Contributing
@todo
