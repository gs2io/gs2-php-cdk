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
namespace Gs2Cdk\Enchant\Model;
use Gs2Cdk\Enchant\Model\Options\RarityParameterCountModelOptions;

class RarityParameterCountModel {
    private int $count;
    private int $weight;

    public function __construct(
        int $count,
        int $weight,
        ?RarityParameterCountModelOptions $options = null,
    ) {
        $this->count = $count;
        $this->weight = $weight;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->count != null) {
            $properties["count"] = $this->count;
        }
        if ($this->weight != null) {
            $properties["weight"] = $this->weight;
        }

        return $properties;
    }
}
