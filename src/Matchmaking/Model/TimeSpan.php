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
namespace Gs2Cdk\Matchmaking\Model;
use Gs2Cdk\Matchmaking\Model\Options\TimeSpanOptions;

class TimeSpan {
    private int $days;
    private int $hours;
    private int $minutes;

    public function __construct(
        int $days,
        int $hours,
        int $minutes,
        ?TimeSpanOptions $options = null,
    ) {
        $this->days = $days;
        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->days != null) {
            $properties["days"] = $this->days;
        }
        if ($this->hours != null) {
            $properties["hours"] = $this->hours;
        }
        if ($this->minutes != null) {
            $properties["minutes"] = $this->minutes;
        }

        return $properties;
    }
}
