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
use Gs2Cdk\Guild\Model\ReceiveMemberRequest;
use Gs2Cdk\Guild\Model\Options\InboxOptions;

class Inbox {
    private string $guildName;
    private ?array $fromUserIds = null;
    private ?array $receiveMemberRequests = null;
    private ?int $revision = null;

    public function __construct(
        string $guildName,
        ?InboxOptions $options = null,
    ) {
        $this->guildName = $guildName;
        $this->fromUserIds = $options?->fromUserIds ?? null;
        $this->receiveMemberRequests = $options?->receiveMemberRequests ?? null;
        $this->revision = $options?->revision ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->guildName != null) {
            $properties["guildName"] = $this->guildName;
        }
        if ($this->fromUserIds != null) {
            $properties["fromUserIds"] = $this->fromUserIds;
        }
        if ($this->receiveMemberRequests != null) {
            $properties["receiveMemberRequests"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->receiveMemberRequests
            );
        }

        return $properties;
    }
}
