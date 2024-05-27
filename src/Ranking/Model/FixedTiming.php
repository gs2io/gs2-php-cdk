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
namespace Gs2Cdk\Ranking\Model;
use Gs2Cdk\Ranking\Model\Options\FixedTimingOptions;

class FixedTiming {
    private ?int $hour = null;
    private ?int $minute = null;

    public function __construct(
        ?FixedTimingOptions $options = null,
    ) {
        $this->hour = $options?->hour ?? null;
        $this->minute = $options?->minute ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->hour != null) {
            $properties["hour"] = $this->hour;
        }
        if ($this->minute != null) {
            $properties["minute"] = $this->minute;
        }

        return $properties;
    }
}
