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
namespace Gs2Cdk\Idle\Model;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Idle\Model\AcquireActionList;
use Gs2Cdk\Idle\Model\Options\CategoryModelOptions;

class CategoryModel {
    private string $name;
    private int $rewardIntervalMinutes;
    private int $defaultMaximumIdleMinutes;
    private array $acquireActions;
    private ?string $metadata = null;
    private ?string $idlePeriodScheduleId = null;
    private ?string $receivePeriodScheduleId = null;

    public function __construct(
        string $name,
        int $rewardIntervalMinutes,
        int $defaultMaximumIdleMinutes,
        array $acquireActions,
        ?CategoryModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->rewardIntervalMinutes = $rewardIntervalMinutes;
        $this->defaultMaximumIdleMinutes = $defaultMaximumIdleMinutes;
        $this->acquireActions = $acquireActions;
        $this->metadata = $options?->metadata ?? null;
        $this->idlePeriodScheduleId = $options?->idlePeriodScheduleId ?? null;
        $this->receivePeriodScheduleId = $options?->receivePeriodScheduleId ?? null;
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
        if ($this->rewardIntervalMinutes != null) {
            $properties["rewardIntervalMinutes"] = $this->rewardIntervalMinutes;
        }
        if ($this->defaultMaximumIdleMinutes != null) {
            $properties["defaultMaximumIdleMinutes"] = $this->defaultMaximumIdleMinutes;
        }
        if ($this->acquireActions != null) {
            $properties["acquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->acquireActions
            );
        }
        if ($this->idlePeriodScheduleId != null) {
            $properties["idlePeriodScheduleId"] = $this->idlePeriodScheduleId;
        }
        if ($this->receivePeriodScheduleId != null) {
            $properties["receivePeriodScheduleId"] = $this->receivePeriodScheduleId;
        }

        return $properties;
    }
}
