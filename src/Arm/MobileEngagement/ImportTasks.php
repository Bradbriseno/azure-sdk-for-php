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
 * @version     Release: 0.10.0_2016, API Version: 2014-12-01
 */

namespace MicrosoftAzure\Arm\MobileEngagement;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * ImportTasks for Microsoft Azure Mobile Engagement REST APIs.
 */
class ImportTasks
{
    /**
     * The service client object for the operations.
     *
     * @var EngagementManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for ImportTasks.
     *
     * @param EngagementManagementClient, Service client for ImportTasks
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Get the list of import jobs.
     *
     * @param int $skip Control paging of import jobs, start results at the given
     * offset, defaults to 0 (1st page of data).
     * @param int $top Control paging of import jobs, number of import jobs to
     * return with each call. By default, it returns all import jobs with a
     * default paging of 20.
     * The response contains a `nextLink` property describing the path to get the
     * next page if there are more results.
     * The maximum paging limit for $top is 40.
     * @param string $orderby Sort results by an expression which looks like
     * `$orderby=jobId asc` (default when not specified).
     * The syntax is orderby={property} {direction} or just orderby={property}.
     * Properties that can be specified for sorting: jobId, errorDetails,
     * dateCreated, jobStatus, and dateCreated.
     * The available directions are asc (for ascending order) and desc (for
     * descending order).
     * When not specified the asc direction is used.
     * Only one orderby property can be specified.
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
    public function listOperation($skip = 0, $top = 20, $orderby = null, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($skip, $top, $orderby, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Get the list of import jobs.
     *
     * @param int $skip Control paging of import jobs, start results at the given
     * offset, defaults to 0 (1st page of data).
     * @param int $top Control paging of import jobs, number of import jobs to
     * return with each call. By default, it returns all import jobs with a
     * default paging of 20.
     * The response contains a `nextLink` property describing the path to get the
     * next page if there are more results.
     * The maximum paging limit for $top is 40.
     * @param string $orderby Sort results by an expression which looks like
     * `$orderby=jobId asc` (default when not specified).
     * The syntax is orderby={property} {direction} or just orderby={property}.
     * Properties that can be specified for sorting: jobId, errorDetails,
     * dateCreated, jobStatus, and dateCreated.
     * The available directions are asc (for ascending order) and desc (for
     * descending order).
     * When not specified the asc direction is used.
     * Only one orderby property can be specified.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($skip = 0, $top = 20, $orderby = null, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getResourceGroupName() == null) {
            Validate::notNullOrEmpty($this->_client->getResourceGroupName(), '$this->_client->getResourceGroupName()');
        }
        if ($this->_client->getAppCollection() == null) {
            Validate::notNullOrEmpty($this->_client->getAppCollection(), '$this->_client->getAppCollection()');
        }
        if ($this->_client->getAppName() == null) {
            Validate::notNullOrEmpty($this->_client->getAppName(), '$this->_client->getAppName()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/importTasks';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $this->_client->getResourceGroupName(), '{appCollection}' => $this->_client->getAppCollection(), '{appName}' => $this->_client->getAppName()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion(), '$skip' => $skip, '$top' => $top, '$orderby' => $orderby];
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
     * Creates a job to import the specified data to a storageUrl.
     *
     * @param array $parameters  
     * <pre>
     * [
     *    'storageUrl' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'id' => '',
     *    'state' => 'Queued|Started|Succeeded|Failed',
     *    'dateCreated' => '',
     *    'dateCompleted' => '',
     *    'errorDetails' => ''
     * ];
     * </pre>
     * When the resposne status is Accepted(202), 
     * <pre>
     * [
     *    'id' => '',
     *    'state' => 'Queued|Started|Succeeded|Failed',
     *    'dateCreated' => '',
     *    'dateCompleted' => '',
     *    'errorDetails' => ''
     * ];
     * </pre>
     */
    public function create(array $parameters, array $customHeaders = [])
    {
        $response = $this->createAsync($parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Creates a job to import the specified data to a storageUrl.
     *
     * @param array $parameters  
     * <pre>
     * [
     *    'storageUrl' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createAsync(array $parameters, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getResourceGroupName() == null) {
            Validate::notNullOrEmpty($this->_client->getResourceGroupName(), '$this->_client->getResourceGroupName()');
        }
        if ($this->_client->getAppCollection() == null) {
            Validate::notNullOrEmpty($this->_client->getAppCollection(), '$this->_client->getAppCollection()');
        }
        if ($this->_client->getAppName() == null) {
            Validate::notNullOrEmpty($this->_client->getAppName(), '$this->_client->getAppName()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/importTasks';
        $statusCodes = [201, 202];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $this->_client->getResourceGroupName(), '{appCollection}' => $this->_client->getAppCollection(), '{appName}' => $this->_client->getAppName()]);
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
     * The Get import job operation retrieves information about a previously
     * created import job.
     *
     * @param string $id Import job identifier.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'id' => '',
     *    'state' => 'Queued|Started|Succeeded|Failed',
     *    'dateCreated' => '',
     *    'dateCompleted' => '',
     *    'errorDetails' => ''
     * ];
     * </pre>
     */
    public function get($id, array $customHeaders = [])
    {
        $response = $this->getAsync($id, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Get import job operation retrieves information about a previously
     * created import job.
     *
     * @param string $id Import job identifier.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($id, array $customHeaders = [])
    {
        if ($id == null) {
            Validate::notNullOrEmpty($id, '$id');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getResourceGroupName() == null) {
            Validate::notNullOrEmpty($this->_client->getResourceGroupName(), '$this->_client->getResourceGroupName()');
        }
        if ($this->_client->getAppCollection() == null) {
            Validate::notNullOrEmpty($this->_client->getAppCollection(), '$this->_client->getAppCollection()');
        }
        if ($this->_client->getAppName() == null) {
            Validate::notNullOrEmpty($this->_client->getAppName(), '$this->_client->getAppName()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/importTasks/{id}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{id}' => $id, '{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $this->_client->getResourceGroupName(), '{appCollection}' => $this->_client->getAppCollection(), '{appName}' => $this->_client->getAppName()]);
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
     * Get the list of import jobs.
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
     * Get the list of import jobs.
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
