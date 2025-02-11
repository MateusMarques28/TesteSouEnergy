<?php

declare(strict_types=1);

/**
 * SPDX-License-Identifier: Apache-2.0
 *
 * The OpenSearch Contributors require contributions made to
 * this file be licensed under the Apache-2.0 license or a
 * compatible open source license.
 *
 * Modifications Copyright OpenSearch Contributors. See
 * GitHub history for details.
 */

namespace OpenSearch\Namespaces;

/**
 * Class ListNamespace
 *
 * NOTE: This file is autogenerated using util/GenerateEndpoints.php
 */
class ListNamespace extends AbstractNamespace
{
    /**
     * Returns help for the List APIs.
     *
     * $params['pretty']      = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']       = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace'] = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']      = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path'] = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function help(array $params = [])
    {
        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\List\Help::class);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Returns paginated information about indexes including number of primaries and replicas, document counts, disk size.
     *
     * $params['index']                     = (array) Comma-separated list of data streams, indexes, and aliases used to limit the request. Supports wildcards (`*`). To target all data streams and indexes, omit this parameter or use `*` or `_all`.
     * $params['bytes']                     = (any) The unit used to display byte values.
     * $params['cluster_manager_timeout']   = (string) Operation timeout for connection to cluster-manager node.
     * $params['expand_wildcards']          = (any) The type of index that wildcard patterns can match.
     * $params['format']                    = (string) A short version of the Accept header, such as `JSON`, `YAML`.
     * $params['h']                         = (array) Comma-separated list of column names to display.
     * $params['health']                    = (any) The health status used to limit returned indexes. By default, the response includes indexes of any health status.
     * $params['help']                      = (boolean) Return help information. (Default = false)
     * $params['include_unloaded_segments'] = (boolean) If `true`, the response includes information from segments that are not loaded into memory. (Default = false)
     * $params['local']                     = (boolean) Return local information, do not retrieve the state from cluster-manager node. (Default = false)
     * $params['master_timeout']            = (string) Operation timeout for connection to cluster-manager node.
     * $params['next_token']                = (Array) Token to retrieve next page of indexes.
     * $params['pri']                       = (boolean) If `true`, the response only includes information from primary shards. (Default = false)
     * $params['s']                         = (array) Comma-separated list of column names or column aliases to sort by.
     * $params['size']                      = (integer) Maximum number of indexes to be displayed in a page.
     * $params['sort']                      = (enum) Defines order in which indexes will be displayed. Accepted values are `asc` and `desc`. If `desc`, most recently created indexes would be displayed first. (Options = asc,desc)
     * $params['time']                      = (any) The unit used to display time values.
     * $params['v']                         = (boolean) Verbose mode. Display column headers. (Default = false)
     * $params['pretty']                    = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']                     = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace']               = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']                    = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path']               = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function indices(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\List\Indices::class);
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }

    /**
     * Returns paginated details of shard allocation on nodes.
     *
     * $params['index']                   = (array) A comma-separated list of data streams, indexes, and aliases used to limit the request. Supports wildcards (`*`). To target all data streams and indexes, omit this parameter or use `*` or `_all`.
     * $params['bytes']                   = (any) The unit used to display byte values.
     * $params['cluster_manager_timeout'] = (string) Operation timeout for connection to cluster-manager node.
     * $params['format']                  = (string) A short version of the Accept header, such as `JSON`, `YAML`.
     * $params['h']                       = (array) Comma-separated list of column names to display.
     * $params['help']                    = (boolean) Return help information. (Default = false)
     * $params['local']                   = (boolean) Return local information, do not retrieve the state from cluster-manager node. (Default = false)
     * $params['master_timeout']          = (string) Operation timeout for connection to cluster-manager node.
     * $params['next_token']              = (Array) Token to retrieve next page of shards.
     * $params['s']                       = (array) Comma-separated list of column names or column aliases to sort by.
     * $params['size']                    = (integer) Maximum number of shards to be displayed in a page.
     * $params['sort']                    = (enum) Defines order in which shards will be displayed. Accepted values are `asc` and `desc`. If `desc`, most recently created shards would be displayed first. (Options = asc,desc)
     * $params['time']                    = (any) The unit in which to display time values.
     * $params['v']                       = (boolean) Verbose mode. Display column headers. (Default = false)
     * $params['pretty']                  = (boolean) Whether to pretty format the returned JSON response. (Default = false)
     * $params['human']                   = (boolean) Whether to return human readable values for statistics. (Default = true)
     * $params['error_trace']             = (boolean) Whether to include the stack trace of returned errors. (Default = false)
     * $params['source']                  = (string) The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
     * $params['filter_path']             = (any) Used to reduce the response. This parameter takes a comma-separated list of filters. It supports using wildcards to match any field or part of a field’s name. You can also exclude fields with "-".
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function shards(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpoint = $this->endpointFactory->getEndpoint(\OpenSearch\Endpoints\List\Shards::class);
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }

}
