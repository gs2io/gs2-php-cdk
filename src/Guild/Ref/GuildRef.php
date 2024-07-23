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
use Gs2Cdk\Guild\Ref\InboxRef;
use Gs2Cdk\Guild\Ref\IgnoreUsersRef;
use Gs2Cdk\Guild\StampSheet\IncreaseMaximumCurrentMaximumMemberCountByGuildName;
use Gs2Cdk\Guild\StampSheet\SetMaximumCurrentMaximumMemberCountByGuildName;
use Gs2Cdk\Guild\StampSheet\DecreaseMaximumCurrentMaximumMemberCountByGuildName;
use Gs2Cdk\Guild\StampSheet\VerifyCurrentMaximumMemberCountByGuildName;
use Gs2Cdk\Guild\StampSheet\VerifyIncludeMemberByUserId;

class GuildRef {
    private string $namespaceName;
    private string $guildModelName;
    private string $guildName;

    public function __construct(
        string $namespaceName,
        string $guildModelName,
        string $guildName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->guildModelName = $guildModelName;
        $this->guildName = $guildName;
    }

    public function increaseMaximumCurrentMaximumMemberCountByGuildName(
        ?int $value = null,
    ): IncreaseMaximumCurrentMaximumMemberCountByGuildName {
        return (new IncreaseMaximumCurrentMaximumMemberCountByGuildName(
            $this->namespaceName,
            $this->guildModelName,
            $this->guildName,
            $value,
        ));
    }

    public function setMaximumCurrentMaximumMemberCountByGuildName(
        ?int $value = null,
    ): SetMaximumCurrentMaximumMemberCountByGuildName {
        return (new SetMaximumCurrentMaximumMemberCountByGuildName(
            $this->namespaceName,
            $this->guildName,
            $this->guildModelName,
            $value,
        ));
    }

    public function decreaseMaximumCurrentMaximumMemberCountByGuildName(
        ?int $value = null,
    ): DecreaseMaximumCurrentMaximumMemberCountByGuildName {
        return (new DecreaseMaximumCurrentMaximumMemberCountByGuildName(
            $this->namespaceName,
            $this->guildModelName,
            $this->guildName,
            $value,
        ));
    }

    public function verifyCurrentMaximumMemberCountByGuildName(
        string $verifyType,
        bool $multiplyValueSpecifyingQuantity,
        ?int $value = null,
    ): VerifyCurrentMaximumMemberCountByGuildName {
        return (new VerifyCurrentMaximumMemberCountByGuildName(
            $this->namespaceName,
            $this->guildModelName,
            $this->guildName,
            $verifyType,
            $multiplyValueSpecifyingQuantity,
            $value,
        ));
    }

    public function verifyIncludeMember(
        string $verifyType,
        ?string $userId = "#{userId}",
    ): VerifyIncludeMemberByUserId {
        return (new VerifyIncludeMemberByUserId(
            $this->namespaceName,
            $this->guildModelName,
            $this->guildName,
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
                "guild",
                $this->guildModelName,
                $this->guildName,
            ],
        ))->str(
        );
    }
}
