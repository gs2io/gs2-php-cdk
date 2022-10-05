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

use Gs2Cdk\Mission\Ref\MissionTaskModelMasterRef;

class MissionTaskModelMaster extends CdkResource {

    public Stack $stack;
    public string $namespaceName;
    public string $missionGroupName;
    public string $name;
    public string $counterName;
    public int $targetValue;

    public function __construct(
            Stack $stack,
            string $namespaceName,
            string $missionGroupName,
            string $name,
            string $counterName,
            int $targetValue,
            string $metadata = null,
            string $description = null,
            array $completeAcquireActions = null,
            string $challengePeriodEventId = null,
            string $premiseMissionTaskName = null,
    ) {
        parent::__construct("Mission_MissionTaskModelMaster_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->missionGroupName = $missionGroupName;
        $this->name = $name;
        $this->metadata = $metadata;
        $this->description = $description;
        $this->counterName = $counterName;
        $this->targetValue = $targetValue;
        $this->completeAcquireActions = $completeAcquireActions;
        $this->challengePeriodEventId = $challengePeriodEventId;
        $this->premiseMissionTaskName = $premiseMissionTaskName;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Mission::MissionTaskModelMaster";
    }

    public function properties(): array {
        $properties = [];
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->missionGroupName != null) {
            $properties["MissionGroupName"] = $this->missionGroupName;
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
        if ($this->counterName != null) {
            $properties["CounterName"] = $this->counterName;
        }
        if ($this->targetValue != null) {
            $properties["TargetValue"] = $this->targetValue;
        }
        if ($this->completeAcquireActions != null) {
            $properties["CompleteAcquireActions"] = array_map(fn($v) => $v->properties(), $this->completeAcquireActions);
        }
        if ($this->challengePeriodEventId != null) {
            $properties["ChallengePeriodEventId"] = $this->challengePeriodEventId;
        }
        if ($this->premiseMissionTaskName != null) {
            $properties["PremiseMissionTaskName"] = $this->premiseMissionTaskName;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
            String $missionGroupName,
    ): MissionTaskModelMasterRef {
        return new MissionTaskModelMasterRef(
            namespaceName: namespaceName,
            missionGroupName: missionGroupName,
            missionTaskName: $this->name,
        );
    }

    public function getAttrMissionTaskId(): GetAttr {
        return new GetAttr(
            key: "Item.MissionTaskId"
        );
    }
}
