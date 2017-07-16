<?php

namespace Apr\UrlScanner\Providers;

use League\Csv\Reader;
use Apr\UrlScanner\Contracts\UrlProviderInterface;

class UrlCsvProvider implements UrlProviderInterface
{
	protected $csv;

	public function __construct($filepath)
	{
		$this->csv = Reader::createFromPath($filepath);
	}

	public function getUrlList()
	{
		$urlList = [];

		foreach ($this->csv as $csvRow) {
			array_push($urlList, $csvRow[0]);
		}

		return $urlList;
	}

}