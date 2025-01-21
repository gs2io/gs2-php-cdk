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
namespace Gs2Cdk\Guild\Model\Options;
use Gs2Cdk\Guild\Model\RoleModel;

class GuildOptions {
    public ?int $attribute1;
    public ?int $attribute2;
    public ?int $attribute3;
    public ?int $attribute4;
    public ?int $attribute5;
    public ?string $metadata;
    public ?string $memberMetadata;
    public ?array $customRoles;
    public ?string $guildMemberDefaultRole;
    public ?string $timeOffsetToken;
    
    public function __construct(
        ?int $attribute1 = null,
        ?int $attribute2 = null,
        ?int $attribute3 = null,
        ?int $attribute4 = null,
        ?int $attribute5 = null,
        ?string $metadata = null,
        ?string $memberMetadata = null,
        ?array $customRoles = null,
        ?string $guildMemberDefaultRole = null,
        ?string $timeOffsetToken = null,
    ) {
        $this->attribute1 = $attribute1;
        $this->attribute2 = $attribute2;
        $this->attribute3 = $attribute3;
        $this->attribute4 = $attribute4;
        $this->attribute5 = $attribute5;
        $this->metadata = $metadata;
        $this->memberMetadata = $memberMetadata;
        $this->customRoles = $customRoles;
        $this->guildMemberDefaultRole = $guildMemberDefaultRole;
        $this->timeOffsetToken = $timeOffsetToken;
    }}

