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

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Guild\Model\RoleModel;

use Gs2Cdk\Guild\Ref\GuildRef;
use Gs2Cdk\Guild\Model\Enum\GuildJoinPolicy;

use Gs2Cdk\Guild\Model\Options\GuildOptions;

class Guild extends CdkResource {
    private Stack $stack;
    private string $namespaceName;
    private string $userId;
    private string $guildModelName;
    private string $displayName;
    private GuildJoinPolicy $joinPolicy;
    private ?int $attribute1 = null;
    private ?int $attribute2 = null;
    private ?int $attribute3 = null;
    private ?int $attribute4 = null;
    private ?int $attribute5 = null;
    private ?string $metadata = null;
    private ?string $memberMetadata = null;
    private ?array $customRoles = null;
    private ?string $guildMemberDefaultRole = null;
    private ?string $timeOffsetToken = null;

    public function __construct(
        Stack $stack,
        string $namespaceName,
        string $userId,
        string $guildModelName,
        string $displayName,
        GuildJoinPolicy $joinPolicy,
        ?GuildOptions $options = null,
    ) {
        parent::__construct(
            "Guild_Guild_" . $guildModelName + ":" + $name
        );

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->guildModelName = $guildModelName;
        $this->displayName = $displayName;
        $this->joinPolicy = $joinPolicy;
        $this->attribute1 = $options?->attribute1 ?? null;
        $this->attribute2 = $options?->attribute2 ?? null;
        $this->attribute3 = $options?->attribute3 ?? null;
        $this->attribute4 = $options?->attribute4 ?? null;
        $this->attribute5 = $options?->attribute5 ?? null;
        $this->metadata = $options?->metadata ?? null;
        $this->memberMetadata = $options?->memberMetadata ?? null;
        $this->customRoles = $options?->customRoles ?? null;
        $this->guildMemberDefaultRole = $options?->guildMemberDefaultRole ?? null;
        $this->timeOffsetToken = $options?->timeOffsetToken ?? null;
        $stack->addResource(
            $this,
        );
    }


    public function alternateKeys(
    ) {
        return "guild_model_name + ":" + name";
    }

    public function resourceType(
    ): string {
        return "GS2::Guild::Guild";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->userId != null) {
            $properties["UserId"] = $this->userId;
        }
        if ($this->guildModelName != null) {
            $properties["GuildModelName"] = $this->guildModelName;
        }
        if ($this->displayName != null) {
            $properties["DisplayName"] = $this->displayName;
        }
        if ($this->attribute1 != null) {
            $properties["Attribute1"] = $this->attribute1;
        }
        if ($this->attribute2 != null) {
            $properties["Attribute2"] = $this->attribute2;
        }
        if ($this->attribute3 != null) {
            $properties["Attribute3"] = $this->attribute3;
        }
        if ($this->attribute4 != null) {
            $properties["Attribute4"] = $this->attribute4;
        }
        if ($this->attribute5 != null) {
            $properties["Attribute5"] = $this->attribute5;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->memberMetadata != null) {
            $properties["MemberMetadata"] = $this->memberMetadata;
        }
        if ($this->joinPolicy != null) {
            $properties["JoinPolicy"] = $this->joinPolicy;
        }
        if ($this->customRoles != null) {
            $properties["CustomRoles"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->customRoles
            );
        }
        if ($this->guildMemberDefaultRole != null) {
            $properties["GuildMemberDefaultRole"] = $this->guildMemberDefaultRole;
        }
        if ($this->timeOffsetToken != null) {
            $properties["TimeOffsetToken"] = $this->timeOffsetToken;
        }

        return $properties;
    }

    public function ref(
        string $name,
    ): GuildRef {
        return (new GuildRef(
            $this->namespaceName,
            $this->guildModelName,
            $name,
        ));
    }

    public function getAttrGuildId(
    ): GetAttr {
        return (new GetAttr(
            $this,
            "Item.GuildId",
            null,
        ));
    }
}
