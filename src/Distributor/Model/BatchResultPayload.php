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
use Gs2Cdk\Distributor\Model\Options\BatchResultPayloadOptions;

class BatchResultPayload {
    private string $requestId;
    private int $statusCode;
    private string $resultPayload;

    public function __construct(
        string $requestId,
        int $statusCode,
        string $resultPayload,
        ?BatchResultPayloadOptions $options = null,
    ) {
        $this->requestId = $requestId;
        $this->statusCode = $statusCode;
        $this->resultPayload = $resultPayload;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->requestId != null) {
            $properties["requestId"] = $this->requestId;
        }
        if ($this->statusCode != null) {
            $properties["statusCode"] = $this->statusCode;
        }
        if ($this->resultPayload != null) {
            $properties["resultPayload"] = $this->resultPayload;
        }

        return $properties;
    }
}
