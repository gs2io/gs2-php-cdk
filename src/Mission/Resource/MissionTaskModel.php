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


class MissionTaskModel {
	public string $name;
	public ?string $metadata;
	public string $counterName;
	public int $targetValue;
	public ?array $completeAcquireActions;
	public ?string $challengePeriodEventId;
	public ?string $premiseMissionTaskName;

    public function __construct(
            string $name,
            string $counterName,
            int $targetValue,
            string $metadata = null,
            array $completeAcquireActions = null,
            string $challengePeriodEventId = null,
            string $premiseMissionTaskName = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->counterName = $counterName;
        $this->targetValue = $targetValue;
        $this->completeAcquireActions = $completeAcquireActions;
        $this->challengePeriodEventId = $challengePeriodEventId;
        $this->premiseMissionTaskName = $premiseMissionTaskName;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
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
    ): MissionTaskModelRef {
        return new MissionTaskModelRef(
            $namespaceName,
            $missionGroupName,
            $this->name,
        );
    }
}
