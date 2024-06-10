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
use Gs2Cdk\Guild\Ref\GuildModelRef;
use Gs2Cdk\Guild\Ref\GuildRef;
use Gs2Cdk\Guild\StampSheet\IncreaseMaximumCurrentMaximumMemberCountByGuildName;
use Gs2Cdk\Guild\StampSheet\SetMaximumCurrentMaximumMemberCountByGuildName;
use Gs2Cdk\Guild\StampSheet\DecreaseMaximumCurrentMaximumMemberCountByGuildName;
use Gs2Cdk\Guild\StampSheet\VerifyCurrentMaximumMemberCountByGuildName;
use Gs2Cdk\Guild\StampSheet\VerifyIncludeMemberByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function guildModel(
        string $guildModelName,
    ): GuildModelRef {
        return (new GuildModelRef(
            $this->namespaceName,
            $guildModelName,
        ));
    }

    public function increaseMaximumCurrentMaximumMemberCountByGuildName(
        string $guildModelName,
        string $guildName,
        ?int $value = null,
    ): IncreaseMaximumCurrentMaximumMemberCountByGuildName {
        return (new IncreaseMaximumCurrentMaximumMemberCountByGuildName(
            $this->namespaceName,
            $guildModelName,
            $guildName,
            $value,
        ));
    }

    public function setMaximumCurrentMaximumMemberCountByGuildName(
        string $guildName,
        string $guildModelName,
        ?int $value = null,
    ): SetMaximumCurrentMaximumMemberCountByGuildName {
        return (new SetMaximumCurrentMaximumMemberCountByGuildName(
            $this->namespaceName,
            $guildName,
            $guildModelName,
            $value,
        ));
    }

    public function decreaseMaximumCurrentMaximumMemberCountByGuildName(
        string $guildModelName,
        string $guildName,
        ?int $value = null,
    ): DecreaseMaximumCurrentMaximumMemberCountByGuildName {
        return (new DecreaseMaximumCurrentMaximumMemberCountByGuildName(
            $this->namespaceName,
            $guildModelName,
            $guildName,
            $value,
        ));
    }

    public function verifyCurrentMaximumMemberCountByGuildName(
        string $guildModelName,
        string $guildName,
        string $verifyType,
        bool $multiplyValueSpecifyingQuantity,
        ?int $value = null,
    ): VerifyCurrentMaximumMemberCountByGuildName {
        return (new VerifyCurrentMaximumMemberCountByGuildName(
            $this->namespaceName,
            $guildModelName,
            $guildName,
            $verifyType,
            $multiplyValueSpecifyingQuantity,
            $value,
        ));
    }

    public function verifyIncludeMember(
        string $guildModelName,
        string $guildName,
        string $verifyType,
        ?string $userId = "#{userId}",
    ): VerifyIncludeMemberByUserId {
        return (new VerifyIncludeMemberByUserId(
            $this->namespaceName,
            $guildModelName,
            $guildName,
            $verifyType,
            $userId,
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
            ],
        ))->str(
        );
    }
}
