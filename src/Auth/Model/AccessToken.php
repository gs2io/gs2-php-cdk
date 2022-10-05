<?php /** @noinspection ALL */
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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


use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class AccessToken {
	public string $ownerId;
	public string $token;
	public string $userId;
	public int $expire;
	public int $timeOffset;

    public function __construct(
            string $ownerId,
            string $token,
            string $userId,
            int $expire,
            int $timeOffset,
    ) {
        $this->ownerId = $ownerId;
        $this->token = $token;
        $this->userId = $userId;
        $this->expire = $expire;
        $this->timeOffset = $timeOffset;
    }

    public function properties(): array {
        $properties = [];
        if ($this->ownerId != null) {
            $properties["OwnerId"] = $this->ownerId;
        }
        if ($this->token != null) {
            $properties["Token"] = $this->token;
        }
        if ($this->userId != null) {
            $properties["UserId"] = $this->userId;
        }
        if ($this->expire != null) {
            $properties["Expire"] = $this->expire;
        }
        if ($this->timeOffset != null) {
            $properties["TimeOffset"] = $this->timeOffset;
        }
        return $properties;
    }
}
