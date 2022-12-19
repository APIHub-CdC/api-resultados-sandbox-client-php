<?php

namespace CirculoDeCredito\ApiResultadosSandbox\Client;

use CirculoDeCredito\ApiResultadosSandbox\Client\Configuration;
use CirculoDeCredito\ApiResultadosSandbox\Client\ApiException;
use CirculoDeCredito\ApiResultadosSandbox\Client\ObjectSerializer;
use CirculoDeCredito\ApiResultadosSandbox\Client\Api\ApiClient;
use CirculoDeCredito\ApiResultadosSandbox\Client\Model\RequestExportarExpediente;

use GuzzleHttp\Client as HttpClient;

class ApiResultadosSandboxApiTest extends \PHPUnit\Framework\TestCase
{
    private $apiKey;
    private $httpClient;
    private $config;

    public function setUp():void
    {
        $this->apiKey = "";
	    $apiUrl = "";

	    $this->config = new Configuration();
	    $this->config->setHost($apiUrl);

	    $this->httpClient = new HttpClient();
    }

    public function testExportarExpediente() {

	    $requestPayload = new RequestExportarExpediente();
	    $requestPayload->setIdOtorgante("");
	    $requestPayload->setFolio();

        $response = null;

        try {

            $client = new ApiClient($this->httpClient, $this->config);
            $response = $client->exportarExpediente($this->apiKey, $requestPayload);

            print("\n".$response);
        
        } catch(ApiException $exception) {
            print("\nHTTP request failed, an error ocurred: ".($exception->getMessage()));
            print("\n".$exception->getResponseObject());
        }

        $this->assertNotNull($response);
    }
}
