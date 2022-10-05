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

use Gs2Cdk\Mission\Resource\Enum\MissionGroupModelMasterResetType;
use Gs2Cdk\Mission\Resource\Enum\MissionGroupModelMasterResetDayOfWeek;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

use Gs2Cdk\Mission\Ref\MissionGroupModelMasterRef;

class MissionGroupModelMaster extends CdkResource {

    public Stack $stack;
    public string $namespaceName;
    public string $name;
    public string $resetType;
    public ?int $resetDayOfMonth;
    public ?string $resetDayOfWeek;
    public ?int $resetHour;

    public function __construct(
            Stack $stack,
            string $namespaceName,
            string $name,
            string $resetType,
            int $resetDayOfMonth,
            string $resetDayOfWeek,
            int $resetHour,
            string $metadata = null,
            string $description = null,
            string $completeNotificationNamespaceId = null,
    ) {
        parent::__construct("Mission_MissionGroupModelMaster_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->name = $name;
        $this->metadata = $metadata;
        $this->description = $description;
        $this->resetType = $resetType;
        $this->resetDayOfMonth = $resetDayOfMonth;
        $this->resetDayOfWeek = $resetDayOfWeek;
        $this->resetHour = $resetHour;
        $this->completeNotificationNamespaceId = $completeNotificationNamespaceId;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Mission::MissionGroupModelMaster";
    }

    public function properties(): array {
        $properties = [];
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
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
    ): MissionGroupModelMasterRef {
        return new MissionGroupModelMasterRef(
            namespaceName: namespaceName,
            missionGroupName: $this->name,
        );
    }

    public function getAttrMissionGroupId(): GetAttr {
        return new GetAttr(
            key: "Item.MissionGroupId"
        );
    }
}
