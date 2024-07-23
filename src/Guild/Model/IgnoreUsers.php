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
namespace Gs2Cdk\Guild\Model;
use Gs2Cdk\Guild\Model\IgnoreUser;
use Gs2Cdk\Guild\Model\Options\IgnoreUsersOptions;

class IgnoreUsers {
    private string $guildModelName;
    private ?array $users = null;
    private ?int $revision = null;

    public function __construct(
        string $guildModelName,
        ?IgnoreUsersOptions $options = null,
    ) {
        $this->guildModelName = $guildModelName;
        $this->users = $options?->users ?? null;
        $this->revision = $options?->revision ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->guildModelName != null) {
            $properties["guildModelName"] = $this->guildModelName;
        }
        if ($this->users != null) {
            $properties["users"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->users
            );
        }

        return $properties;
    }
}
