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
use Gs2Cdk\Mission\Model\Options\TargetCounterModelOptions;
use Gs2Cdk\Mission\Model\Enum\TargetCounterModelResetType;

class TargetCounterModel {
    private string $counterName;
    private int $value;
    private ?TargetCounterModelResetType $resetType = null;

    public function __construct(
        string $counterName,
        int $value,
        ?TargetCounterModelOptions $options = null,
    ) {
        $this->counterName = $counterName;
        $this->value = $value;
        $this->resetType = $options?->resetType ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->counterName != null) {
            $properties["counterName"] = $this->counterName;
        }
        if ($this->resetType != null) {
            $properties["resetType"] = $this->resetType?->toString(
            );
        }
        if ($this->value != null) {
            $properties["value"] = $this->value;
        }

        return $properties;
    }
}
