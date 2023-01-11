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
use Gs2Cdk\Log\Model\Options\ExecuteStampTaskLogCountOptions;

class ExecuteStampTaskLogCount {
    private int $count;
    private ?string $service = null;
    private ?string $method = null;
    private ?string $userId = null;
    private ?string $action = null;

    public function __construct(
        int $count,
        ?ExecuteStampTaskLogCountOptions $options = null,
    ) {
        $this->count = $count;
        $this->service = $options?->service ?? null;
        $this->method = $options?->method ?? null;
        $this->userId = $options?->userId ?? null;
        $this->action = $options?->action ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->service != null) {
            $properties["service"] = $this->service;
        }
        if ($this->method != null) {
            $properties["method"] = $this->method;
        }
        if ($this->userId != null) {
            $properties["userId"] = $this->userId;
        }
        if ($this->action != null) {
            $properties["action"] = $this->action;
        }
        if ($this->count != null) {
            $properties["count"] = $this->count;
        }

        return $properties;
    }
}
