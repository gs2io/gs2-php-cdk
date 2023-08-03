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
namespace Gs2Cdk\Mission\Model;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Mission\Model\Options\MissionTaskModelOptions;
use Gs2Cdk\Mission\Model\Enum\MissionTaskModelTargetResetType;

class MissionTaskModel {
    private string $name;
    private string $counterName;
    private int $targetValue;
    private ?string $metadata = null;
    private ?MissionTaskModelTargetResetType $targetResetType = null;
    private ?array $completeAcquireActions = null;
    private ?string $challengePeriodEventId = null;
    private ?string $premiseMissionTaskName = null;

    public function __construct(
        string $name,
        string $counterName,
        int $targetValue,
        ?MissionTaskModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->counterName = $counterName;
        $this->targetValue = $targetValue;
        $this->metadata = $options?->metadata ?? null;
        $this->targetResetType = $options?->targetResetType ?? null;
        $this->completeAcquireActions = $options?->completeAcquireActions ?? null;
        $this->challengePeriodEventId = $options?->challengePeriodEventId ?? null;
        $this->premiseMissionTaskName = $options?->premiseMissionTaskName ?? null;
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
        if ($this->counterName != null) {
            $properties["counterName"] = $this->counterName;
        }
        if ($this->targetResetType != null) {
            $properties["targetResetType"] = $this->targetResetType?->toString(
            );
        }
        if ($this->targetValue != null) {
            $properties["targetValue"] = $this->targetValue;
        }
        if ($this->completeAcquireActions != null) {
            $properties["completeAcquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->completeAcquireActions
            );
        }
        if ($this->challengePeriodEventId != null) {
            $properties["challengePeriodEventId"] = $this->challengePeriodEventId;
        }
        if ($this->premiseMissionTaskName != null) {
            $properties["premiseMissionTaskName"] = $this->premiseMissionTaskName;
        }

        return $properties;
    }
}
