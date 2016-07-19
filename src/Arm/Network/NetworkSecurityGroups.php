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
 * @version     Release: 0.10.0_2016, API Version: 2016-06-01
 */

namespace MicrosoftAzure\Arm\Network;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * NetworkSecurityGroups for The Microsoft Azure Network management API
 * provides a RESTful set of web services that interact with Microsoft Azure
 * Networks service to manage your network resrources. The API has entities
 * that capture the relationship between an end user and the Microsoft Azure
 * Networks service.
 */
class NetworkSecurityGroups
{
    /**
     * The service client object for the operations.
     *
     * @var NetworkManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for NetworkSecurityGroups.
     *
     * @param NetworkManagementClient, Service client for NetworkSecurityGroups
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * The Delete NetworkSecurityGroup operation deletes the specifed network
     * security group
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function delete($resourceGroupName, $networkSecurityGroupName, array $customHeaders = [])
    {
        $response = $this->begindeleteAsync($resourceGroupName, $networkSecurityGroupName, $customHeaders);

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
     * The Delete NetworkSecurityGroup operation deletes the specifed network
     * security group
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function beginDelete($resourceGroupName, $networkSecurityGroupName, array $customHeaders = [])
    {
        $response = $this->beginDeleteAsync($resourceGroupName, $networkSecurityGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Delete NetworkSecurityGroup operation deletes the specifed network
     * security group
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDeleteAsync($resourceGroupName, $networkSecurityGroupName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($networkSecurityGroupName == null) {
            Validate::notNullOrEmpty($networkSecurityGroupName, '$networkSecurityGroupName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}';
        $statusCodes = [202, 200, 204];
        $method = 'DELETE';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{networkSecurityGroupName}' => $networkSecurityGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The Get NetworkSecurityGroups operation retrieves information about the
     * specified network security group.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param string $expand expand references resources.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'securityRules' => '',
     *       'defaultSecurityRules' => '',
     *       'networkInterfaces' => '',
     *       'subnets' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $networkSecurityGroupName, $expand = null, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $networkSecurityGroupName, $expand, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Get NetworkSecurityGroups operation retrieves information about the
     * specified network security group.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param string $expand expand references resources.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $networkSecurityGroupName, $expand = null, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($networkSecurityGroupName == null) {
            Validate::notNullOrEmpty($networkSecurityGroupName, '$networkSecurityGroupName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{networkSecurityGroupName}' => $networkSecurityGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion(), '$expand' => $expand];
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
     * The Put NetworkSecurityGroup operation creates/updates a network security
     * groupin the specified resource group.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param array $parameters Parameters supplied to the create/update Network Security Group
     *  operation 
     * <pre>
     * [
     *    'properties' => [
     *       'securityRules' => '',
     *       'defaultSecurityRules' => '',
     *       'networkInterfaces' => '',
     *       'subnets' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'securityRules' => '',
     *       'defaultSecurityRules' => '',
     *       'networkInterfaces' => '',
     *       'subnets' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'securityRules' => '',
     *       'defaultSecurityRules' => '',
     *       'networkInterfaces' => '',
     *       'subnets' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $networkSecurityGroupName, array $parameters, array $customHeaders = [])
    {
        $response = $this->begincreateOrUpdateAsync($resourceGroupName, $networkSecurityGroupName, $parameters, $customHeaders);

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
     * The Put NetworkSecurityGroup operation creates/updates a network security
     * groupin the specified resource group.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param array $parameters Parameters supplied to the create/update Network Security Group
     *  operation 
     * <pre>
     * [
     *    'properties' => [
     *       'securityRules' => '',
     *       'defaultSecurityRules' => '',
     *       'networkInterfaces' => '',
     *       'subnets' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'securityRules' => '',
     *       'defaultSecurityRules' => '',
     *       'networkInterfaces' => '',
     *       'subnets' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'securityRules' => '',
     *       'defaultSecurityRules' => '',
     *       'networkInterfaces' => '',
     *       'subnets' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function beginCreateOrUpdate($resourceGroupName, $networkSecurityGroupName, array $parameters, array $customHeaders = [])
    {
        $response = $this->beginCreateOrUpdateAsync($resourceGroupName, $networkSecurityGroupName, $parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Put NetworkSecurityGroup operation creates/updates a network security
     * groupin the specified resource group.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param array $parameters Parameters supplied to the create/update Network Security Group
     *  operation 
     * <pre>
     * [
     *    'properties' => [
     *       'securityRules' => '',
     *       'defaultSecurityRules' => '',
     *       'networkInterfaces' => '',
     *       'subnets' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginCreateOrUpdateAsync($resourceGroupName, $networkSecurityGroupName, array $parameters, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($networkSecurityGroupName == null) {
            Validate::notNullOrEmpty($networkSecurityGroupName, '$networkSecurityGroupName');
        }
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}';
        $statusCodes = [201, 200];
        $method = 'PUT';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{networkSecurityGroupName}' => $networkSecurityGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($parameters);

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
     * The list NetworkSecurityGroups returns all network security groups in a
     * subscription
     *
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
    public function listAll(array $customHeaders = [])
    {
        $response = $this->listAllAsync($customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The list NetworkSecurityGroups returns all network security groups in a
     * subscription
     *
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listAllAsync(array $customHeaders = [])
    {
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.Network/networkSecurityGroups';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The list NetworkSecurityGroups returns all network security groups in a
     * resource group
     *
     * @param string $resourceGroupName The name of the resource group.
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
    public function listOperation($resourceGroupName, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The list NetworkSecurityGroups returns all network security groups in a
     * resource group
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The list NetworkSecurityGroups returns all network security groups in a
     * subscription
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
    public function listAllNext($nextPageLink, array $customHeaders = [])
    {
        $response = $this->listAllNextAsync($nextPageLink, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The list NetworkSecurityGroups returns all network security groups in a
     * subscription
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listAllNextAsync($nextPageLink, array $customHeaders = [])
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

    /**
     * The list NetworkSecurityGroups returns all network security groups in a
     * resource group
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
     * The list NetworkSecurityGroups returns all network security groups in a
     * resource group
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
