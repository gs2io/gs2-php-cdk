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
namespace Gs2Cdk\Matchmaking\Model;
use Gs2Cdk\Matchmaking\Model\Attribute;
use Gs2Cdk\Matchmaking\Model\Player;
use Gs2Cdk\Matchmaking\Model\Options\CapacityOfRoleOptions;

class CapacityOfRole {
    private string $roleName;
    private int $capacity;
    private ?array $roleAliases = null;
    private ?array $participants = null;

    public function __construct(
        string $roleName,
        int $capacity,
        ?CapacityOfRoleOptions $options = null,
    ) {
        $this->roleName = $roleName;
        $this->capacity = $capacity;
        $this->roleAliases = $options?->roleAliases ?? null;
        $this->participants = $options?->participants ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->roleName != null) {
            $properties["roleName"] = $this->roleName;
        }
        if ($this->roleAliases != null) {
            $properties["roleAliases"] = $this->roleAliases;
        }
        if ($this->capacity != null) {
            $properties["capacity"] = $this->capacity;
        }
        if ($this->participants != null) {
            $properties["participants"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->participants
            );
        }

        return $properties;
    }
}
