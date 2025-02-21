<?php
/*
 * Copyright 2016- Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */
namespace Gs2Cdk\Log\Model;
use Gs2Cdk\Log\Model\Options\AccessLogWithTelemetryOptions;
use Gs2Cdk\Log\Model\Enums\AccessLogWithTelemetryStatus;

class AccessLogWithTelemetry {
    private int $timestamp;
    private string $sourceRequestId;
    private string $requestId;
    private int $duration;
    private string $service;
    private string $method;
    private string $request;
    private string $result;
    private AccessLogWithTelemetryStatus $status;
    private ?string $userId = null;

    public function __construct(
        int $timestamp,
        string $sourceRequestId,
        string $requestId,
        int $duration,
        string $service,
        string $method,
        string $request,
        string $result,
        AccessLogWithTelemetryStatus $status,
        ?AccessLogWithTelemetryOptions $options = null,
    ) {
        $this->timestamp = $timestamp;
        $this->sourceRequestId = $sourceRequestId;
        $this->requestId = $requestId;
        $this->duration = $duration;
        $this->service = $service;
        $this->method = $method;
        $this->request = $request;
        $this->result = $result;
        $this->status = $status;
        $this->userId = $options?->userId ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->timestamp != null) {
            $properties["timestamp"] = $this->timestamp;
        }
        if ($this->sourceRequestId != null) {
            $properties["sourceRequestId"] = $this->sourceRequestId;
        }
        if ($this->requestId != null) {
            $properties["requestId"] = $this->requestId;
        }
        if ($this->duration != null) {
            $properties["duration"] = $this->duration;
        }
        if ($this->service != null) {
            $properties["service"] = $this->service;
        }
        if ($this->method != null) {
            $properties["method"] = $this->method;
        }
        if ($this->userId != null) {
            $properties["userId"] = $this->userId;
        }
        if ($this->request != null) {
            $properties["request"] = $this->request;
        }
        if ($this->result != null) {
            $properties["result"] = $this->result;
        }
        if ($this->status != null) {
            $properties["status"] = $this->status?->toString(
            );
        }

        return $properties;
    }
}
