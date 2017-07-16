<?php
require 'vendor/autoload.php';

use Apr\UrlScanner\Scanner;
use Apr\UrlScanner\Providers\UrlArrayProvider;
use Apr\UrlScanner\Providers\UrlCsvProvider;

$urls = [
    'http://www.apple.com',
    'http://php.net',
    'http://sdfssdwerw-array.org'
];

$csvUrls = new UrlCsvProvider('urls.csv');
$arrayUrls = new UrlArrayProvider($urls);

$scanner = new Scanner($csvUrls);
print_r($scanner->getInvalidUrls());

$scanner = new Scanner($arrayUrls);
print_r($scanner->getInvalidUrls());