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
namespace Gs2Cdk\Distributor\Model;
use Gs2Cdk\Distributor\Model\Options\BatchRequestPayloadOptions;
use Gs2Cdk\Distributor\Model\Enum\BatchRequestPayloadService;

class BatchRequestPayload {
    private string $requestId;
    private BatchRequestPayloadService $service;
    private string $methodName;
    private string $parameter;

    public function __construct(
        string $requestId,
        BatchRequestPayloadService $service,
        string $methodName,
        string $parameter,
        ?BatchRequestPayloadOptions $options = null,
    ) {
        $this->requestId = $requestId;
        $this->service = $service;
        $this->methodName = $methodName;
        $this->parameter = $parameter;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->requestId != null) {
            $properties["requestId"] = $this->requestId;
        }
        if ($this->service != null) {
            $properties["service"] = $this->service?->toString(
            );
        }
        if ($this->methodName != null) {
            $properties["methodName"] = $this->methodName;
        }
        if ($this->parameter != null) {
            $properties["parameter"] = $this->parameter;
        }

        return $properties;
    }
}
