<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Apr\UrlScanner\Providers\UrlArrayProvider;

class UrlArrayProviderTest extends TestCase
{

	public function setUp()
	{
		$this->urlProvider = new UrlArrayProvider(['a', 'b', 'c']);
	}
	/** @test */

	public function it_returns_an_array()
	{
		$result = $this->urlProvider->getUrlList();

		$this->assertTrue(is_array($result));
	}
}