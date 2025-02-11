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

namespace OpenSearch\Endpoints\Notifications;

use OpenSearch\Exception\RuntimeException;
use OpenSearch\Endpoints\AbstractEndpoint;

/**
 * NOTE: This file is autogenerated using util/GenerateEndpoints.php
 */
class SendTest extends AbstractEndpoint
{
    protected $config_id;

    public function getURI(): string
    {
        $config_id = $this->config_id ?? null;
        if (isset($config_id)) {
            return "/_plugins/_notifications/feature/test/$config_id";
        }
        throw new RuntimeException('Missing parameter for the endpoint notifications.send_test');
    }

    public function getParamWhitelist(): array
    {
        return [
            'pretty',
            'human',
            'error_trace',
            'source',
            'filter_path'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function setConfigId($config_id): static
    {
        if (is_null($config_id)) {
            return $this;
        }
        $this->config_id = $config_id;

        return $this;
    }
}
