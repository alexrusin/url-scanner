<?php 
namespace Apr\UrlScanner;

use GuzzleHttp\Client;
use Exception;
use Apr\UrlScanner\Contracts\UrlProviderInterface;

class Scanner 
{
	protected $httpClient;
	protected $urlProvider;
	protected $urls;

	public function __construct(UrlProviderInterface $urlProvider) 
	{
		$this->httpClient = new Client;
		$this->urlProvider = $urlProvider;
	}

	protected function getUrls()
	{
		$this->urls = $urlProvider->getUrlList();

	}

	public function getInvalidUrls()
    {
    	
        $invalidUrls = [];
        $this->urls = $this->urlProvider->getUrlList();
        
        if (is_null($this->urls)) {
        	return $invalidUrls;
        }

        foreach ($this->urls as $url) {
            try {
                $statusCode = $this->getStatusCodeForUrl($url);
            } catch (Exception $e) {
                $statusCode = 500;
            }
            if ($statusCode >= 400) {
                array_push($invalidUrls, [
                    'url' => $url,
                    'status' => $statusCode
                ]);
            }
        }
        return $invalidUrls;
    }
    /**
     * Get HTTP status code for URL
     * @param string $url The remote URL
     * @return int The HTTP status code
     */
    protected function getStatusCodeForUrl($url)
    {
        $httpResponse = $this->httpClient->options($url);
        return $httpResponse->getStatusCode();
    }

}