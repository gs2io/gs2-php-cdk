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

namespace Gs2Cdk\Mission\Resource;

use Gs2Cdk\Mission\Resource\Enum\MissionGroupModelResetType;
use Gs2Cdk\Mission\Resource\Enum\MissionGroupModelResetDayOfWeek;

class MissionGroupModel {
	public string $name;
	public ?string $metadata;
	public ?array $tasks;
	public MissionGroupModelResetType $resetType;
	public ?int $resetDayOfMonth;
	public ?MissionGroupModelResetDayOfWeek $resetDayOfWeek;
	public ?int $resetHour;
	public ?string $completeNotificationNamespaceId;

    public function __construct(
            string $name,
            MissionGroupModelResetType $resetType,
            string $metadata = null,
            array $tasks = null,
            int $resetDayOfMonth = null,
            MissionGroupModelResetDayOfWeek $resetDayOfWeek = null,
            int $resetHour = null,
            string $completeNotificationNamespaceId = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->tasks = $tasks;
        $this->resetType = $resetType;
        $this->resetDayOfMonth = $resetDayOfMonth;
        $this->resetDayOfWeek = $resetDayOfWeek;
        $this->resetHour = $resetHour;
        $this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->tasks != null) {
            $properties["Tasks"] = array_map(fn($v) => $v->properties(), $this->tasks);
        }
        if ($this->resetType != null) {
            $properties["ResetType"] = $this->resetType->toString();
        }
        if ($this->resetDayOfMonth != null) {
            $properties["ResetDayOfMonth"] = $this->resetDayOfMonth;
        }
        if ($this->resetDayOfWeek != null) {
            $properties["ResetDayOfWeek"] = $this->resetDayOfWeek->toString();
        }
        if ($this->resetHour != null) {
            $properties["ResetHour"] = $this->resetHour;
        }
        if ($this->completeNotificationNamespaceId != null) {
            $properties["CompleteNotificationNamespaceId"] = $this->completeNotificationNamespaceId;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): MissionGroupModelRef {
        return new MissionGroupModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
