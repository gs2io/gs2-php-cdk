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
namespace Gs2Cdk\Enhance\Model;
use Gs2Cdk\Enhance\Model\Options\UnleashRateEntryModelOptions;

class UnleashRateEntryModel {
    private int $gradeValue;
    private int $needCount;

    public function __construct(
        int $gradeValue,
        int $needCount,
        ?UnleashRateEntryModelOptions $options = null,
    ) {
        $this->gradeValue = $gradeValue;
        $this->needCount = $needCount;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->gradeValue != null) {
            $properties["gradeValue"] = $this->gradeValue;
        }
        if ($this->needCount != null) {
            $properties["needCount"] = $this->needCount;
        }

        return $properties;
    }
}
