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
use Gs2Cdk\Enhance\Model\Options\UnleashQuantityMaterialSettingOptions;
use Gs2Cdk\Enhance\Model\Options\UnleashQuantityMaterialSettingMatchTypeIsSameGroupOptions;
use Gs2Cdk\Enhance\Model\Options\UnleashQuantityMaterialSettingMatchTypeIsSpecifiedOptions;
use Gs2Cdk\Enhance\Model\Enums\UnleashQuantityMaterialSettingMatchType;

class UnleashQuantityMaterialSetting {
    private UnleashQuantityMaterialSettingMatchType $matchType;
    private int $count;
    private ?string $materialInventoryModelId = null;
    private ?string $itemModelId = null;

    public function __construct(
        UnleashQuantityMaterialSettingMatchType $matchType,
        int $count,
        ?UnleashQuantityMaterialSettingOptions $options = null,
    ) {
        $this->matchType = $matchType;
        $this->count = $count;
        $this->materialInventoryModelId = $options?->materialInventoryModelId ?? null;
        $this->itemModelId = $options?->itemModelId ?? null;
    }

    public static function matchTypeIsSameGroup(
        int $count,
        string $materialInventoryModelId,
        ?UnleashQuantityMaterialSettingMatchTypeIsSameGroupOptions $options = null,
    ): UnleashQuantityMaterialSetting {
        return (new UnleashQuantityMaterialSetting(
            UnleashQuantityMaterialSettingMatchType::SAME_GROUP,
            $count,
            new UnleashQuantityMaterialSettingOptions(
                materialInventoryModelId: $materialInventoryModelId,
            ),
        ));
    }

    public static function matchTypeIsSpecified(
        int $count,
        string $itemModelId,
        ?UnleashQuantityMaterialSettingMatchTypeIsSpecifiedOptions $options = null,
    ): UnleashQuantityMaterialSetting {
        return (new UnleashQuantityMaterialSetting(
            UnleashQuantityMaterialSettingMatchType::SPECIFIED,
            $count,
            new UnleashQuantityMaterialSettingOptions(
                itemModelId: $itemModelId,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->matchType != null) {
            $properties["matchType"] = $this->matchType?->toString(
            );
        }
        if ($this->materialInventoryModelId != null) {
            $properties["materialInventoryModelId"] = $this->materialInventoryModelId;
        }
        if ($this->itemModelId != null) {
            $properties["itemModelId"] = $this->itemModelId;
        }
        if ($this->count != null) {
            $properties["count"] = $this->count;
        }

        return $properties;
    }
}
