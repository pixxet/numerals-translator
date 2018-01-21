# PHP any numerals converted to Western Arabic numerals.

Converts any numerals to western arabic numerals. This tool used to support any numeral input at the PHP backend

[![Packagist](https://img.shields.io/packagist/l/doctrine/orm.svg?maxAge=2592000)](https://raw.githubusercontent.com/pixxet/numerals-translator/master/LICENSE.md)

## Introduction

The PHP any numerals converted to Western Arabic numerals.

## Installation

Run this command to add this library to your `composer.json` file:

    composer require pixxet/numerals-translator

## Quick Start Guide

### use

```php
use Pixxet\NumeralsTranslator;
```

### convert any numerals

```php
$arabic = NumeralsTranslator::TranslateNumerals('١٢٣٤');
echo $arabic; \\ 1234
```
