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
use Gs2Cdk\Enhance\Model\UnleashIndividualMaterialSetting;
use Gs2Cdk\Enhance\Model\UnleashQuantityMaterialSetting;
use Gs2Cdk\Enhance\Model\UnleashMaterial;
use Gs2Cdk\Enhance\Model\Options\UnleashRecipeOptions;

class UnleashRecipe {
    private string $name;
    private array $materials;
    private ?string $metadata = null;
    private ?array $targetGroupKeys = null;

    public function __construct(
        string $name,
        array $materials,
        ?UnleashRecipeOptions $options = null,
    ) {
        $this->name = $name;
        $this->materials = $materials;
        $this->metadata = $options?->metadata ?? null;
        $this->targetGroupKeys = $options?->targetGroupKeys ?? null;
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
        if ($this->targetGroupKeys != null) {
            $properties["targetGroupKeys"] = $this->targetGroupKeys;
        }
        if ($this->materials != null) {
            $properties["materials"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->materials
            );
        }

        return $properties;
    }
}
