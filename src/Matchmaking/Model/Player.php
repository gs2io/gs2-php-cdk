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
use Gs2Cdk\Matchmaking\Model\Options\PlayerOptions;

class Player {
    private string $userId;
    private string $roleName;
    private ?array $attributes = null;
    private ?array $denyUserIds = null;

    public function __construct(
        string $userId,
        string $roleName,
        ?PlayerOptions $options = null,
    ) {
        $this->userId = $userId;
        $this->roleName = $roleName;
        $this->attributes = $options?->attributes ?? null;
        $this->denyUserIds = $options?->denyUserIds ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->userId != null) {
            $properties["userId"] = $this->userId;
        }
        if ($this->attributes != null) {
            $properties["attributes"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->attributes
            );
        }
        if ($this->roleName != null) {
            $properties["roleName"] = $this->roleName;
        }
        if ($this->denyUserIds != null) {
            $properties["denyUserIds"] = $this->denyUserIds;
        }

        return $properties;
    }
}
