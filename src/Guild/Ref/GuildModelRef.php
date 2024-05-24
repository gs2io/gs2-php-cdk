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
namespace Gs2Cdk\Guild\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Guild\Ref\RoleModelRef;
use Gs2Cdk\Guild\StampSheet\IncreaseMaximumCurrentMaximumMemberCountByGuildName;
use Gs2Cdk\Guild\StampSheet\SetMaximumCurrentMaximumMemberCountByGuildName;
use Gs2Cdk\Guild\StampSheet\DecreaseMaximumCurrentMaximumMemberCountByGuildName;

class GuildModelRef {
    private string $namespaceName;
    private string $guildModelName;

    public function __construct(
        string $namespaceName,
        string $guildModelName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->guildModelName = $guildModelName;
    }

    public function roleModel(
    ): RoleModelRef {
        return (new RoleModelRef(
            $this->namespaceName,
            $this->guildModelName,
        ));
    }

    public function increaseMaximumCurrentMaximumMemberCountByGuildName(
        string $guildName,
        ?int $value = null,
    ): IncreaseMaximumCurrentMaximumMemberCountByGuildName {
        return (new IncreaseMaximumCurrentMaximumMemberCountByGuildName(
            $this->namespaceName,
            $this->guildModelName,
            $guildName,
            $value,
        ));
    }

    public function setMaximumCurrentMaximumMemberCountByGuildName(
        string $guildName,
        ?int $value = null,
    ): SetMaximumCurrentMaximumMemberCountByGuildName {
        return (new SetMaximumCurrentMaximumMemberCountByGuildName(
            $this->namespaceName,
            $this->guildModelName,
            $guildName,
            $value,
        ));
    }

    public function decreaseMaximumCurrentMaximumMemberCountByGuildName(
        string $guildName,
        ?int $value = null,
    ): DecreaseMaximumCurrentMaximumMemberCountByGuildName {
        return (new DecreaseMaximumCurrentMaximumMemberCountByGuildName(
            $this->namespaceName,
            $this->guildModelName,
            $guildName,
            $value,
        ));
    }

    public function grn(
    ): string {
        return (new Join(
            ":",
            [
                "grn",
                "gs2",
                GetAttr::region(
                )->str(
                ),
                GetAttr::ownerId(
                )->str(
                ),
                "guild",
                $this->namespaceName,
                "model",
                $this->guildModelName,
            ],
        ))->str(
        );
    }
}
