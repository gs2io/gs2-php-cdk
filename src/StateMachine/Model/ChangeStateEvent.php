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
namespace Gs2Cdk\StateMachine\Model;
use Gs2Cdk\StateMachine\Model\Options\ChangeStateEventOptions;

class ChangeStateEvent {
    private string $taskName;
    private string $hash;
    private int $timestamp;

    public function __construct(
        string $taskName,
        string $hash,
        int $timestamp,
        ?ChangeStateEventOptions $options = null,
    ) {
        $this->taskName = $taskName;
        $this->hash = $hash;
        $this->timestamp = $timestamp;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->taskName != null) {
            $properties["taskName"] = $this->taskName;
        }
        if ($this->hash != null) {
            $properties["hash"] = $this->hash;
        }
        if ($this->timestamp != null) {
            $properties["timestamp"] = $this->timestamp;
        }

        return $properties;
    }
}
