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
use Gs2Cdk\StateMachine\Model\Options\EmitEventOptions;

class EmitEvent {
    private string $event;
    private string $parameters;
    private int $timestamp;

    public function __construct(
        string $event,
        string $parameters,
        int $timestamp,
        ?EmitEventOptions $options = null,
    ) {
        $this->event = $event;
        $this->parameters = $parameters;
        $this->timestamp = $timestamp;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->event != null) {
            $properties["event"] = $this->event;
        }
        if ($this->parameters != null) {
            $properties["parameters"] = $this->parameters;
        }
        if ($this->timestamp != null) {
            $properties["timestamp"] = $this->timestamp;
        }

        return $properties;
    }
}
