<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiService
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = env('API_BASE_URL'); 
        // Use .env file for base URL
    }
    public function getData($endpoint, $queryParams = [])
    {
        try {
            $response = $this->client->get($this->baseUrl . $endpoint, [
                'query' => $queryParams,
            ]);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => 'GET request failed', 'message' => $e->getMessage()];
        }
    }

    /**
     * POST Request with JSON Body
     */
    public function postData($endpoint, $data)
    {
        try {
            $response = $this->client->post($this->baseUrl . $endpoint, [
                'json' => $data, // Send JSON data
            ]);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => 'POST request failed', 'message' => $e->getMessage()];
        }
    }
    public function uploadFile($endpoint, $file, $extraData = [])
    {
        try {
            $multipartData = [
                [
                    'name'     => 'excel_file', // Match API expected field name
                    'contents' => fopen($file->getPathname(), 'r'),
                    'filename' => $file->getClientOriginalName(),
                ],
            ];
            foreach ($extraData as $key => $value) {
                $multipartData[] = [
                    'name'     => $key,
                    'contents' => $value,
                ];
            }

            $response = $this->client->post($this->baseUrl . $endpoint, [
                'multipart' => $multipartData
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => 'File upload failed', 'message' => $e->getMessage()];
        }
    }
}
