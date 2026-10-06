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
use Gs2Cdk\Enhance\Model\Options\UnleashMaterialOptions;
use Gs2Cdk\Enhance\Model\Options\UnleashMaterialMaterialTypeIsIndividualOptions;
use Gs2Cdk\Enhance\Model\Options\UnleashMaterialMaterialTypeIsQuantityOptions;
use Gs2Cdk\Enhance\Model\Enums\UnleashMaterialMaterialType;

class UnleashMaterial {
    private string $name;
    private UnleashMaterialMaterialType $materialType;
    private ?UnleashIndividualMaterialSetting $individualSetting = null;
    private ?UnleashQuantityMaterialSetting $quantitySetting = null;

    public function __construct(
        string $name,
        UnleashMaterialMaterialType $materialType,
        ?UnleashMaterialOptions $options = null,
    ) {
        $this->name = $name;
        $this->materialType = $materialType;
        $this->individualSetting = $options?->individualSetting ?? null;
        $this->quantitySetting = $options?->quantitySetting ?? null;
    }

    public static function materialTypeIsIndividual(
        string $name,
        UnleashIndividualMaterialSetting $individualSetting,
        ?UnleashMaterialMaterialTypeIsIndividualOptions $options = null,
    ): UnleashMaterial {
        return (new UnleashMaterial(
            $name,
            UnleashMaterialMaterialType::INDIVIDUAL,
            new UnleashMaterialOptions(
                individualSetting: $individualSetting,
            ),
        ));
    }

    public static function materialTypeIsQuantity(
        string $name,
        UnleashQuantityMaterialSetting $quantitySetting,
        ?UnleashMaterialMaterialTypeIsQuantityOptions $options = null,
    ): UnleashMaterial {
        return (new UnleashMaterial(
            $name,
            UnleashMaterialMaterialType::QUANTITY,
            new UnleashMaterialOptions(
                quantitySetting: $quantitySetting,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->materialType != null) {
            $properties["materialType"] = $this->materialType?->toString(
            );
        }
        if ($this->individualSetting != null) {
            $properties["individualSetting"] = $this->individualSetting?->properties(
            );
        }
        if ($this->quantitySetting != null) {
            $properties["quantitySetting"] = $this->quantitySetting?->properties(
            );
        }

        return $properties;
    }
}
