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
use Gs2Cdk\Enchant\Model\Options\RarityParameterValueModelOptions;

class RarityParameterValueModel {
    private string $name;
    private string $resourceName;
    private int $resourceValue;
    private int $weight;
    private ?string $metadata = null;

    public function __construct(
        string $name,
        string $resourceName,
        int $resourceValue,
        int $weight,
        ?RarityParameterValueModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->resourceName = $resourceName;
        $this->resourceValue = $resourceValue;
        $this->weight = $weight;
        $this->metadata = $options?->metadata ?? null;
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
        if ($this->resourceName != null) {
            $properties["resourceName"] = $this->resourceName;
        }
        if ($this->resourceValue != null) {
            $properties["resourceValue"] = $this->resourceValue;
        }
        if ($this->weight != null) {
            $properties["weight"] = $this->weight;
        }

        return $properties;
    }
}
