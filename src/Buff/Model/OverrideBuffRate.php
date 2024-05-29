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
namespace Gs2Cdk\Buff\Model;
use Gs2Cdk\Buff\Model\Options\OverrideBuffRateOptions;

class OverrideBuffRate {
    private string $name;
    private float $rate;

    public function __construct(
        string $name,
        float $rate,
        ?OverrideBuffRateOptions $options = null,
    ) {
        $this->name = $name;
        $this->rate = $rate;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->rate != null) {
            $properties["rate"] = $this->rate;
        }

        return $properties;
    }
}
