<?php

namespace Lokalise\Endpoints;

use \Lokalise\LokaliseApiResponse;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Exceptions\LokaliseResponseException;

/**
 * Class Files
 * @package Lokalise\Endpoints
 * @link https://app.lokalise.com/api2docs/curl/#resource-files
 */
class Files extends Endpoint implements EndpointInterface
{

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-files-get
     *
     * @param string $projectId
     * @param array $queryParams
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function list($projectId, $queryParams = [])
    {
        return $this->request(
            'GET',
            "projects/$projectId/files",
            $queryParams
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-list-all-files-get
     *
     * @param string $projectId
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function fetchAll($projectId)
    {
        return $this->requestAll(
            'GET',
            "projects/$projectId/files",
            [],
            [],
            'files'
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-upload-a-file-post
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function upload($projectId, $body)
    {
        // Requests that do not use the queue=true parameter are deprecated and will be unsupported
        $body['queue'] = true;

        return $this->request(
            'POST',
            "projects/$projectId/files/upload",
            [],
            $body
        );
    }

    /**
     * @link https://app.lokalise.com/api2docs/curl/#transition-download-files-post
     *
     * @param string $projectId
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function download($projectId, $body)
    {
        return $this->request(
            'POST',
            "projects/$projectId/files/download",
            [],
            $body
        );
    }
}
