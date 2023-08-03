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
use Gs2Cdk\Enchant\Model\Options\RarityParameterValueOptions;

class RarityParameterValue {
    private string $name;
    private string $resourceName;
    private int $resourceValue;

    public function __construct(
        string $name,
        string $resourceName,
        int $resourceValue,
        ?RarityParameterValueOptions $options = null,
    ) {
        $this->name = $name;
        $this->resourceName = $resourceName;
        $this->resourceValue = $resourceValue;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->resourceName != null) {
            $properties["resourceName"] = $this->resourceName;
        }
        if ($this->resourceValue != null) {
            $properties["resourceValue"] = $this->resourceValue;
        }

        return $properties;
    }
}
