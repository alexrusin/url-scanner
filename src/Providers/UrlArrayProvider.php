<?php

namespace Apr\UrlScanner\Providers;

use League\Csv\Reader;
use Apr\UrlScanner\Contracts\UrlProviderInterface;

class UrlArrayProvider implements UrlProviderInterface
{
	protected $urlList;

	public function __construct(array $urlList)
	{
		$this->urlList = $urlList;
	}

	public function getUrlList()
	{
		return $this->urlList;
	}

}