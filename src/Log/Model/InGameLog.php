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
use Gs2Cdk\Log\Model\InGameLogTag;
use Gs2Cdk\Log\Model\Options\InGameLogOptions;

class InGameLog {
    private int $timestamp;
    private string $requestId;
    private string $payload;
    private ?string $userId = null;
    private ?array $tags = null;

    public function __construct(
        int $timestamp,
        string $requestId,
        string $payload,
        ?InGameLogOptions $options = null,
    ) {
        $this->timestamp = $timestamp;
        $this->requestId = $requestId;
        $this->payload = $payload;
        $this->userId = $options?->userId ?? null;
        $this->tags = $options?->tags ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->timestamp != null) {
            $properties["timestamp"] = $this->timestamp;
        }
        if ($this->requestId != null) {
            $properties["requestId"] = $this->requestId;
        }
        if ($this->userId != null) {
            $properties["userId"] = $this->userId;
        }
        if ($this->tags != null) {
            $properties["tags"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->tags
            );
        }
        if ($this->payload != null) {
            $properties["payload"] = $this->payload;
        }

        return $properties;
    }
}
