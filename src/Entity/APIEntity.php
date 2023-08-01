<?php
namespace Guardian\Entity;

use GuzzleHttp\Client;

/**
 * Class APIEntity
 *
 * Base class for all available guardian API entities
 *
 * @package Guardian\Entity
 */
abstract class APIEntity
{
    /** @var string Query term to search for*/
    protected $query;
    /** @var string The base API URL for the API entity */
    protected $baseUrl;
    /** @var string The format to return the results in. */
    protected $format = "json";
    /** @var Client GuzzleHttp Client object to make the requests */
    private $client;

    /**
     * Constructs valid request URL from set parameters
     * @return string Valid URL from set parameters
     */
    abstract protected function buildUrl();

    /**
     * Creates instance of Guardian\Entity\APIEntity
     * @param string $baseUrl The base URL for this API entity with a valid API key
     */
    public function __construct(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
        // guzzle client here
        $this->client = new Client();
    }

    /**
     * Fetches responses for this API entity from the guardian API endpoint
     * @param bool $asArray Specifies if response should be returned as a PHP object or an associative array
     * @return object|array
     */
    final public function fetch(bool $asArray = false)
    {
        $url = $this->buildUrl();
        $jsonResult = $this->makeApiCall($url);

        return json_decode($jsonResult, $asArray);
    }

    public function makeApiCall(string $url): string
    {
        $headers = [
            "Accept" => "application/json"
        ];
        $response = $this->client->request('GET', $url, [
            'headers' => $headers
        ]);

        return $response->getBody()->getContents();
    }

    /**
     * Helps to build request URLs. Appends set request parameters to the URL
     * @param string $attributeName Request parameter according to the guardian API docs
     * @param mixed $attributeValue Value the parameter is set to. This is typically an int or a string
     * @return self API entity with updated `baseUrl`
     */
    protected function appendToBaseUrl(string $attributeName, $attributeValue)
    {
        if (!empty($attributeValue)) {
            $url = "&{$attributeName}={$attributeValue}";
            $this->baseUrl = "{$this->baseUrl}{$url}";
        }
        return $this;
    }
}
