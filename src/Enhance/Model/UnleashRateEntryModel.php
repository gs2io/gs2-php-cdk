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
use Gs2Cdk\Enhance\Model\UnleashRecipe;
use Gs2Cdk\Enhance\Model\Options\UnleashRateEntryModelOptions;
use Gs2Cdk\Enhance\Model\Options\UnleashRateEntryModelTypeIsSimpleOptions;
use Gs2Cdk\Enhance\Model\Options\UnleashRateEntryModelTypeIsRecipeOptions;
use Gs2Cdk\Enhance\Model\Enums\UnleashRateEntryModelType;

class UnleashRateEntryModel {
    private int $gradeValue;
    private UnleashRateEntryModelType $type;
    private ?int $needCount = null;
    private ?array $recipes = null;

    public function __construct(
        int $gradeValue,
        UnleashRateEntryModelType $type,
        ?UnleashRateEntryModelOptions $options = null,
    ) {
        $this->gradeValue = $gradeValue;
        $this->type = $type;
        $this->needCount = $options?->needCount ?? null;
        $this->recipes = $options?->recipes ?? null;
    }

    public static function typeIsSimple(
        int $gradeValue,
        int $needCount,
        ?UnleashRateEntryModelTypeIsSimpleOptions $options = null,
    ): UnleashRateEntryModel {
        return (new UnleashRateEntryModel(
            $gradeValue,
            UnleashRateEntryModelType::SIMPLE,
            new UnleashRateEntryModelOptions(
                needCount: $needCount,
            ),
        ));
    }

    public static function typeIsRecipe(
        int $gradeValue,
        array $recipes,
        ?UnleashRateEntryModelTypeIsRecipeOptions $options = null,
    ): UnleashRateEntryModel {
        return (new UnleashRateEntryModel(
            $gradeValue,
            UnleashRateEntryModelType::RECIPE,
            new UnleashRateEntryModelOptions(
                recipes: $recipes,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->gradeValue != null) {
            $properties["gradeValue"] = $this->gradeValue;
        }
        if ($this->type != null) {
            $properties["type"] = $this->type?->toString(
            );
        }
        if ($this->needCount != null) {
            $properties["needCount"] = $this->needCount;
        }
        if ($this->recipes != null) {
            $properties["recipes"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->recipes
            );
        }

        return $properties;
    }
}
