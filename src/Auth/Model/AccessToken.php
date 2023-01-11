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
namespace Gs2Cdk\Auth\Model;
use Gs2Cdk\Auth\Model\Options\AccessTokenOptions;

class AccessToken {
    private string $ownerId;
    private string $token;
    private string $userId;
    private int $expire;
    private int $timeOffset;

    public function __construct(
        string $ownerId,
        string $token,
        string $userId,
        int $expire,
        int $timeOffset,
        ?AccessTokenOptions $options = null,
    ) {
        $this->ownerId = $ownerId;
        $this->token = $token;
        $this->userId = $userId;
        $this->expire = $expire;
        $this->timeOffset = $timeOffset;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->ownerId != null) {
            $properties["ownerId"] = $this->ownerId;
        }
        if ($this->token != null) {
            $properties["token"] = $this->token;
        }
        if ($this->userId != null) {
            $properties["userId"] = $this->userId;
        }
        if ($this->expire != null) {
            $properties["expire"] = $this->expire;
        }
        if ($this->timeOffset != null) {
            $properties["timeOffset"] = $this->timeOffset;
        }

        return $properties;
    }
}
