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
use Gs2Cdk\Guild\Model\RoleModel;
use Gs2Cdk\Guild\Model\Options\GuildModelOptions;

class GuildModel {
    private string $name;
    private int $defaultMaximumMemberCount;
    private int $maximumMemberCount;
    private int $inactivityPeriodDays;
    private array $roles;
    private string $guildMasterRole;
    private string $guildMemberDefaultRole;
    private int $rejoinCoolTimeMinutes;
    private ?string $metadata = null;
    private ?int $maxConcurrentJoinGuilds = null;
    private ?int $maxConcurrentGuildMasterCount = null;

    public function __construct(
        string $name,
        int $defaultMaximumMemberCount,
        int $maximumMemberCount,
        int $inactivityPeriodDays,
        array $roles,
        string $guildMasterRole,
        string $guildMemberDefaultRole,
        int $rejoinCoolTimeMinutes,
        ?GuildModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->defaultMaximumMemberCount = $defaultMaximumMemberCount;
        $this->maximumMemberCount = $maximumMemberCount;
        $this->inactivityPeriodDays = $inactivityPeriodDays;
        $this->roles = $roles;
        $this->guildMasterRole = $guildMasterRole;
        $this->guildMemberDefaultRole = $guildMemberDefaultRole;
        $this->rejoinCoolTimeMinutes = $rejoinCoolTimeMinutes;
        $this->metadata = $options?->metadata ?? null;
        $this->maxConcurrentJoinGuilds = $options?->maxConcurrentJoinGuilds ?? null;
        $this->maxConcurrentGuildMasterCount = $options?->maxConcurrentGuildMasterCount ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->defaultMaximumMemberCount != null) {
            $properties["defaultMaximumMemberCount"] = $this->defaultMaximumMemberCount;
        }
        if ($this->maximumMemberCount != null) {
            $properties["maximumMemberCount"] = $this->maximumMemberCount;
        }
        if ($this->inactivityPeriodDays != null) {
            $properties["inactivityPeriodDays"] = $this->inactivityPeriodDays;
        }
        if ($this->roles != null) {
            $properties["roles"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->roles
            );
        }
        if ($this->guildMasterRole != null) {
            $properties["guildMasterRole"] = $this->guildMasterRole;
        }
        if ($this->guildMemberDefaultRole != null) {
            $properties["guildMemberDefaultRole"] = $this->guildMemberDefaultRole;
        }
        if ($this->rejoinCoolTimeMinutes != null) {
            $properties["rejoinCoolTimeMinutes"] = $this->rejoinCoolTimeMinutes;
        }
        if ($this->maxConcurrentJoinGuilds != null) {
            $properties["maxConcurrentJoinGuilds"] = $this->maxConcurrentJoinGuilds;
        }
        if ($this->maxConcurrentGuildMasterCount != null) {
            $properties["maxConcurrentGuildMasterCount"] = $this->maxConcurrentGuildMasterCount;
        }

        return $properties;
    }
}
