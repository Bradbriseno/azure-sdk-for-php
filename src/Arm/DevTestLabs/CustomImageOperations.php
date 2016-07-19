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
 * CustomImageOperations for The DevTest Labs Client.
 */
class CustomImageOperations
{
    /**
     * The service client object for the operations.
     *
     * @var DevTestLabsClient
     */
    private $_client;

    /**
     * Creates a new instance for CustomImageOperations.
     *
     * @param DevTestLabsClient, Service client for CustomImageOperations
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * List custom images in a given lab.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'vm' => [
     *          'sourceVmId' => '',
     *          'windowsOsInfo' => [
     *             'windowsOsState' => 'NonSysprepped|SysprepRequested|SysprepApplied'
     *          ],
     *          'linuxOsInfo' => [
     *             'linuxOsState' => 'NonDeprovisioned|DeprovisionRequested|DeprovisionApplied'
     *          ]
     *       ],
     *       'vhd' => [
     *          'imageName' => '',
     *          'sysPrep' => 'false',
     *          'osType' => 'Windows|Linux|None'
     *       ],
     *       'description' => '',
     *       'author' => '',
     *       'creationDate' => '',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
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
    public function listOperation($resourceGroupName, $labName, array $filter, $top = null, $orderBy = null, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $labName, $filter, $top, $orderBy, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * List custom images in a given lab.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'vm' => [
     *          'sourceVmId' => '',
     *          'windowsOsInfo' => [
     *             'windowsOsState' => 'NonSysprepped|SysprepRequested|SysprepApplied'
     *          ],
     *          'linuxOsInfo' => [
     *             'linuxOsState' => 'NonDeprovisioned|DeprovisionRequested|DeprovisionApplied'
     *          ]
     *       ],
     *       'vhd' => [
     *          'imageName' => '',
     *          'sysPrep' => 'false',
     *          'osType' => 'Windows|Linux|None'
     *       ],
     *       'description' => '',
     *       'author' => '',
     *       'creationDate' => '',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
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
    public function listOperationAsync($resourceGroupName, $labName, array $filter, $top = null, $orderBy = null, array $customHeaders = [])
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
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/customimages';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName]);
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
     * Get custom image.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the custom image.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'vm' => [
     *          'sourceVmId' => '',
     *          'windowsOsInfo' => [
     *             'windowsOsState' => 'NonSysprepped|SysprepRequested|SysprepApplied'
     *          ],
     *          'linuxOsInfo' => [
     *             'linuxOsState' => 'NonDeprovisioned|DeprovisionRequested|DeprovisionApplied'
     *          ]
     *       ],
     *       'vhd' => [
     *          'imageName' => '',
     *          'sysPrep' => 'false',
     *          'osType' => 'Windows|Linux|None'
     *       ],
     *       'description' => '',
     *       'author' => '',
     *       'creationDate' => '',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     */
    public function getResource($resourceGroupName, $labName, $name, array $customHeaders = [])
    {
        $response = $this->getResourceAsync($resourceGroupName, $labName, $name, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Get custom image.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the custom image.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getResourceAsync($resourceGroupName, $labName, $name, array $customHeaders = [])
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
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/customimages/{name}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName, '{name}' => $name]);
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
     * Create or replace an existing custom image. This operation can take a while
     * to complete.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the custom image.
     * @param array $customImage  
     * <pre>
     * [
     *    'properties' => [
     *       'vm' => [
     *          'sourceVmId' => '',
     *          'windowsOsInfo' => [
     *             'windowsOsState' => 'NonSysprepped|SysprepRequested|SysprepApplied'
     *          ],
     *          'linuxOsInfo' => [
     *             'linuxOsState' => 'NonDeprovisioned|DeprovisionRequested|DeprovisionApplied'
     *          ]
     *       ],
     *       'vhd' => [
     *          'imageName' => '',
     *          'sysPrep' => 'false',
     *          'osType' => 'Windows|Linux|None'
     *       ],
     *       'description' => '',
     *       'author' => '',
     *       'creationDate' => '',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'vm' => [
     *          'sourceVmId' => '',
     *          'windowsOsInfo' => [
     *             'windowsOsState' => 'NonSysprepped|SysprepRequested|SysprepApplied'
     *          ],
     *          'linuxOsInfo' => [
     *             'linuxOsState' => 'NonDeprovisioned|DeprovisionRequested|DeprovisionApplied'
     *          ]
     *       ],
     *       'vhd' => [
     *          'imageName' => '',
     *          'sysPrep' => 'false',
     *          'osType' => 'Windows|Linux|None'
     *       ],
     *       'description' => '',
     *       'author' => '',
     *       'creationDate' => '',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'vm' => [
     *          'sourceVmId' => '',
     *          'windowsOsInfo' => [
     *             'windowsOsState' => 'NonSysprepped|SysprepRequested|SysprepApplied'
     *          ],
     *          'linuxOsInfo' => [
     *             'linuxOsState' => 'NonDeprovisioned|DeprovisionRequested|DeprovisionApplied'
     *          ]
     *       ],
     *       'vhd' => [
     *          'imageName' => '',
     *          'sysPrep' => 'false',
     *          'osType' => 'Windows|Linux|None'
     *       ],
     *       'description' => '',
     *       'author' => '',
     *       'creationDate' => '',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     */
    public function createOrUpdateResource($resourceGroupName, $labName, $name, array $customImage, array $customHeaders = [])
    {
        $response = $this->begincreateOrUpdateResourceAsync($resourceGroupName, $labName, $name, $customImage, $customHeaders);

        if ($response->getStatusCode() !== Resources::STATUS_OK) {
            $this->_client->awaitAsync($response);
        }

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Create or replace an existing custom image. This operation can take a while
     * to complete.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the custom image.
     * @param array $customImage  
     * <pre>
     * [
     *    'properties' => [
     *       'vm' => [
     *          'sourceVmId' => '',
     *          'windowsOsInfo' => [
     *             'windowsOsState' => 'NonSysprepped|SysprepRequested|SysprepApplied'
     *          ],
     *          'linuxOsInfo' => [
     *             'linuxOsState' => 'NonDeprovisioned|DeprovisionRequested|DeprovisionApplied'
     *          ]
     *       ],
     *       'vhd' => [
     *          'imageName' => '',
     *          'sysPrep' => 'false',
     *          'osType' => 'Windows|Linux|None'
     *       ],
     *       'description' => '',
     *       'author' => '',
     *       'creationDate' => '',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'vm' => [
     *          'sourceVmId' => '',
     *          'windowsOsInfo' => [
     *             'windowsOsState' => 'NonSysprepped|SysprepRequested|SysprepApplied'
     *          ],
     *          'linuxOsInfo' => [
     *             'linuxOsState' => 'NonDeprovisioned|DeprovisionRequested|DeprovisionApplied'
     *          ]
     *       ],
     *       'vhd' => [
     *          'imageName' => '',
     *          'sysPrep' => 'false',
     *          'osType' => 'Windows|Linux|None'
     *       ],
     *       'description' => '',
     *       'author' => '',
     *       'creationDate' => '',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'vm' => [
     *          'sourceVmId' => '',
     *          'windowsOsInfo' => [
     *             'windowsOsState' => 'NonSysprepped|SysprepRequested|SysprepApplied'
     *          ],
     *          'linuxOsInfo' => [
     *             'linuxOsState' => 'NonDeprovisioned|DeprovisionRequested|DeprovisionApplied'
     *          ]
     *       ],
     *       'vhd' => [
     *          'imageName' => '',
     *          'sysPrep' => 'false',
     *          'osType' => 'Windows|Linux|None'
     *       ],
     *       'description' => '',
     *       'author' => '',
     *       'creationDate' => '',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     */
    public function beginCreateOrUpdateResource($resourceGroupName, $labName, $name, array $customImage, array $customHeaders = [])
    {
        $response = $this->beginCreateOrUpdateResourceAsync($resourceGroupName, $labName, $name, $customImage, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Create or replace an existing custom image. This operation can take a while
     * to complete.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the custom image.
     * @param array $customImage  
     * <pre>
     * [
     *    'properties' => [
     *       'vm' => [
     *          'sourceVmId' => '',
     *          'windowsOsInfo' => [
     *             'windowsOsState' => 'NonSysprepped|SysprepRequested|SysprepApplied'
     *          ],
     *          'linuxOsInfo' => [
     *             'linuxOsState' => 'NonDeprovisioned|DeprovisionRequested|DeprovisionApplied'
     *          ]
     *       ],
     *       'vhd' => [
     *          'imageName' => '',
     *          'sysPrep' => 'false',
     *          'osType' => 'Windows|Linux|None'
     *       ],
     *       'description' => '',
     *       'author' => '',
     *       'creationDate' => '',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginCreateOrUpdateResourceAsync($resourceGroupName, $labName, $name, array $customImage, array $customHeaders = [])
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
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
        }
        if ($customImage == null) {
            Validate::notNullOrEmpty($customImage, '$customImage');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/customimages/{name}';
        $statusCodes = [200, 201];
        $method = 'PUT';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName, '{name}' => $name]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($customImage);

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
     * Delete custom image. This operation can take a while to complete.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the custom image.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function deleteResource($resourceGroupName, $labName, $name, array $customHeaders = [])
    {
        $response = $this->begindeleteResourceAsync($resourceGroupName, $labName, $name, $customHeaders);

        if ($response->getStatusCode() !== Resources::STATUS_OK) {
            $this->_client->awaitAsync($response);
        }

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Delete custom image. This operation can take a while to complete.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the custom image.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function beginDeleteResource($resourceGroupName, $labName, $name, array $customHeaders = [])
    {
        $response = $this->beginDeleteResourceAsync($resourceGroupName, $labName, $name, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Delete custom image. This operation can take a while to complete.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the custom image.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDeleteResourceAsync($resourceGroupName, $labName, $name, array $customHeaders = [])
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
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/customimages/{name}';
        $statusCodes = [202, 204];
        $method = 'DELETE';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName, '{name}' => $name]);
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
     * List custom images in a given lab.
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
     * List custom images in a given lab.
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
