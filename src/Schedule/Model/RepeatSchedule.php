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
namespace Gs2Cdk\Schedule\Model;
use Gs2Cdk\Schedule\Model\Options\RepeatScheduleOptions;

class RepeatSchedule {
    private int $repeatCount;
    private ?int $currentRepeatStartAt = null;
    private ?int $currentRepeatEndAt = null;
    private ?int $lastRepeatEndAt = null;
    private ?int $nextRepeatStartAt = null;

    public function __construct(
        int $repeatCount,
        ?RepeatScheduleOptions $options = null,
    ) {
        $this->repeatCount = $repeatCount;
        $this->currentRepeatStartAt = $options?->currentRepeatStartAt ?? null;
        $this->currentRepeatEndAt = $options?->currentRepeatEndAt ?? null;
        $this->lastRepeatEndAt = $options?->lastRepeatEndAt ?? null;
        $this->nextRepeatStartAt = $options?->nextRepeatStartAt ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->repeatCount != null) {
            $properties["repeatCount"] = $this->repeatCount;
        }
        if ($this->currentRepeatStartAt != null) {
            $properties["currentRepeatStartAt"] = $this->currentRepeatStartAt;
        }
        if ($this->currentRepeatEndAt != null) {
            $properties["currentRepeatEndAt"] = $this->currentRepeatEndAt;
        }
        if ($this->lastRepeatEndAt != null) {
            $properties["lastRepeatEndAt"] = $this->lastRepeatEndAt;
        }
        if ($this->nextRepeatStartAt != null) {
            $properties["nextRepeatStartAt"] = $this->nextRepeatStartAt;
        }

        return $properties;
    }
}
