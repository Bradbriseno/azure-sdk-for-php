<?php

/**
 * Code generated by Microsoft (R) AutoRest Code Generator 0.17.0.0
 * Changes may cause incorrect behavior and will be lost if the code is
 * regenerated.
 *
 * PHP version: 5.5
 *
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/Azure/azure-sdk-for-php/blob/arm/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php/tree/arm
 *
 * @version     Release: 0.10.0_2016, API Version: 2016-05-15
 */

namespace MicrosoftAzure\Arm\DevTestLabs;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * ArtifactOperations for The DevTest Labs Client.
 */
class ArtifactOperations
{
    /**
     * The service client object for the operations.
     *
     * @var DevTestLabsClient
     */
    private $_client;

    /**
     * Creates a new instance for ArtifactOperations.
     *
     * @param DevTestLabsClient, Service client for ArtifactOperations
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * List artifacts in a given artifact source.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $artifactSourceName The name of the artifact source.
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'title' => '',
     *       'description' => '',
     *       'filePath' => '',
     *       'icon' => '',
     *       'targetOsType' => '',
     *       'parameters' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * @param int $top The maximum number of resources to return from the
     * operation.
     * @param string $orderBy The ordering expression for the results, using OData
     * notation.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'nextLink' => ''
     * ];
     * </pre>
     */
    public function listOperation($resourceGroupName, $labName, $artifactSourceName, array $filter, $top = null, $orderBy = null, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $labName, $artifactSourceName, $filter, $top, $orderBy, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * List artifacts in a given artifact source.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $artifactSourceName The name of the artifact source.
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'title' => '',
     *       'description' => '',
     *       'filePath' => '',
     *       'icon' => '',
     *       'targetOsType' => '',
     *       'parameters' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * @param int $top The maximum number of resources to return from the
     * operation.
     * @param string $orderBy The ordering expression for the results, using OData
     * notation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, $labName, $artifactSourceName, array $filter, $top = null, $orderBy = null, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($labName == null) {
            Validate::notNullOrEmpty($labName, '$labName');
        }
        if ($artifactSourceName == null) {
            Validate::notNullOrEmpty($artifactSourceName, '$artifactSourceName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/artifactsources/{artifactSourceName}/artifacts';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName, '{artifactSourceName}' => $artifactSourceName]);
        $queryParams = ['$filter' => $filter, '$top' => $top, '$orderBy' => $orderBy, 'api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Get artifact.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $artifactSourceName The name of the artifact source.
     * @param string $name The name of the artifact.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'title' => '',
     *       'description' => '',
     *       'filePath' => '',
     *       'icon' => '',
     *       'targetOsType' => '',
     *       'parameters' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     */
    public function getResource($resourceGroupName, $labName, $artifactSourceName, $name, array $customHeaders = [])
    {
        $response = $this->getResourceAsync($resourceGroupName, $labName, $artifactSourceName, $name, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Get artifact.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $artifactSourceName The name of the artifact source.
     * @param string $name The name of the artifact.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getResourceAsync($resourceGroupName, $labName, $artifactSourceName, $name, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($labName == null) {
            Validate::notNullOrEmpty($labName, '$labName');
        }
        if ($artifactSourceName == null) {
            Validate::notNullOrEmpty($artifactSourceName, '$artifactSourceName');
        }
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/artifactsources/{artifactSourceName}/artifacts/{name}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName, '{artifactSourceName}' => $artifactSourceName, '{name}' => $name]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Generates an ARM template for the given artifact, uploads the required
     * files to a storage account, and validates the generated artifact.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $artifactSourceName The name of the artifact source.
     * @param string $name The name of the artifact.
     * @param array $generateArmTemplateRequest  
     * <pre>
     * [
     *    'virtualMachineName' => '',
     *    'parameters' => '',
     *    'location' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'template' => '',
     *    'parameters' => ''
     * ];
     * </pre>
     */
    public function generateArmTemplate($resourceGroupName, $labName, $artifactSourceName, $name, array $generateArmTemplateRequest, array $customHeaders = [])
    {
        $response = $this->generateArmTemplateAsync($resourceGroupName, $labName, $artifactSourceName, $name, $generateArmTemplateRequest, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Generates an ARM template for the given artifact, uploads the required
     * files to a storage account, and validates the generated artifact.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $artifactSourceName The name of the artifact source.
     * @param string $name The name of the artifact.
     * @param array $generateArmTemplateRequest  
     * <pre>
     * [
     *    'virtualMachineName' => '',
     *    'parameters' => '',
     *    'location' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function generateArmTemplateAsync($resourceGroupName, $labName, $artifactSourceName, $name, array $generateArmTemplateRequest, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($labName == null) {
            Validate::notNullOrEmpty($labName, '$labName');
        }
        if ($artifactSourceName == null) {
            Validate::notNullOrEmpty($artifactSourceName, '$artifactSourceName');
        }
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
        }
        if ($generateArmTemplateRequest == null) {
            Validate::notNullOrEmpty($generateArmTemplateRequest, '$generateArmTemplateRequest');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/artifactsources/{artifactSourceName}/artifacts/{name}/generateArmTemplate';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName, '{artifactSourceName}' => $artifactSourceName, '{name}' => $name]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($generateArmTemplateRequest);

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * List artifacts in a given artifact source.
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'nextLink' => ''
     * ];
     * </pre>
     */
    public function listNext($nextPageLink, array $customHeaders = [])
    {
        $response = $this->listNextAsync($nextPageLink, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * List artifacts in a given artifact source.
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listNextAsync($nextPageLink, array $customHeaders = [])
    {
        if ($nextPageLink == null) {
            Validate::notNullOrEmpty($nextPageLink, '$nextPageLink');
        }

        $path = '{nextLink}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, []);
        $queryParams = [];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }
}
