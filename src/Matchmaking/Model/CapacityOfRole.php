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

namespace Gs2Cdk\Matchmaking\Model;


use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class CapacityOfRole {
	public string $roleName;
	public ?array $roleAliases;
	public int $capacity;
	public ?array $participants;

    public function __construct(
            string $roleName,
            int $capacity,
            array $roleAliases = null,
            array $participants = null,
    ) {
        $this->roleName = $roleName;
        $this->roleAliases = $roleAliases;
        $this->capacity = $capacity;
        $this->participants = $participants;
    }

    public function properties(): array {
        $properties = [];
        if ($this->roleName != null) {
            $properties["RoleName"] = $this->roleName;
        }
        if ($this->roleAliases != null) {
            $properties["RoleAliases"] = $this->roleAliases;
        }
        if ($this->capacity != null) {
            $properties["Capacity"] = $this->capacity;
        }
        if ($this->participants != null) {
            $properties["Participants"] = array_map(fn($v) => $v->properties(), $this->participants);
        }
        return $properties;
    }
}
