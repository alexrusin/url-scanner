<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Apr\UrlScanner\Providers\UrlCsvProvider;

class UrlCsvProviderTest extends TestCase
{

	public function setUp()
	{
		$this->urlProvider = new UrlCsvProvider('urls.csv');
	}

	/** @test */

	public function it_returns_an_array()
	{
		$result = $this->urlProvider->getUrlList();

		$this->assertTrue(is_array($result));
	}
}