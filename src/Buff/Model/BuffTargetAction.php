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
use Gs2Cdk\Buff\Model\BuffTargetGrn;
use Gs2Cdk\Buff\Model\Options\BuffTargetActionOptions;
use Gs2Cdk\Buff\Model\Enum\BuffTargetActionTargetActionName;

class BuffTargetAction {
    private string $targetActionName;
    private string $targetFieldName;
    private array $conditionGrns;
    private float $rate;

    public function __construct(
        string $targetActionName,
        string $targetFieldName,
        array $conditionGrns,
        float $rate,
        ?BuffTargetActionOptions $options = null,
    ) {
        $this->targetActionName = $targetActionName;
        $this->targetFieldName = $targetFieldName;
        $this->conditionGrns = $conditionGrns;
        $this->rate = $rate;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->targetActionName != null) {
            $properties["targetActionName"] = $this->targetActionName?->toString(
            );
        }
        if ($this->targetFieldName != null) {
            $properties["targetFieldName"] = $this->targetFieldName;
        }
        if ($this->conditionGrns != null) {
            $properties["conditionGrns"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->conditionGrns
            );
        }
        if ($this->rate != null) {
            $properties["rate"] = $this->rate;
        }

        return $properties;
    }
}
