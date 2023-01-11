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
use Gs2Cdk\Log\Model\Options\ExecuteStampTaskLogOptions;

class ExecuteStampTaskLog {
    private int $timestamp;
    private string $taskId;
    private string $service;
    private string $method;
    private string $userId;
    private string $action;
    private string $args;

    public function __construct(
        int $timestamp,
        string $taskId,
        string $service,
        string $method,
        string $userId,
        string $action,
        string $args,
        ?ExecuteStampTaskLogOptions $options = null,
    ) {
        $this->timestamp = $timestamp;
        $this->taskId = $taskId;
        $this->service = $service;
        $this->method = $method;
        $this->userId = $userId;
        $this->action = $action;
        $this->args = $args;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->timestamp != null) {
            $properties["timestamp"] = $this->timestamp;
        }
        if ($this->taskId != null) {
            $properties["taskId"] = $this->taskId;
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
        if ($this->action != null) {
            $properties["action"] = $this->action;
        }
        if ($this->args != null) {
            $properties["args"] = $this->args;
        }

        return $properties;
    }
}
