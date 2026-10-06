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
use Gs2Cdk\Enhance\Model\Options\UnleashIndividualMaterialSettingOptions;
use Gs2Cdk\Enhance\Model\Options\UnleashIndividualMaterialSettingGradeConditionIsAnyOptions;
use Gs2Cdk\Enhance\Model\Options\UnleashIndividualMaterialSettingGradeConditionIsSameAsTargetOptions;
use Gs2Cdk\Enhance\Model\Options\UnleashIndividualMaterialSettingGradeConditionIsEqualOptions;
use Gs2Cdk\Enhance\Model\Enums\UnleashIndividualMaterialSettingMatchType;
use Gs2Cdk\Enhance\Model\Enums\UnleashIndividualMaterialSettingGradeCondition;

class UnleashIndividualMaterialSetting {
    private UnleashIndividualMaterialSettingMatchType $matchType;
    private UnleashIndividualMaterialSettingGradeCondition $gradeCondition;
    private int $count;
    private ?int $gradeValue = null;

    public function __construct(
        UnleashIndividualMaterialSettingMatchType $matchType,
        UnleashIndividualMaterialSettingGradeCondition $gradeCondition,
        int $count,
        ?UnleashIndividualMaterialSettingOptions $options = null,
    ) {
        $this->matchType = $matchType;
        $this->gradeCondition = $gradeCondition;
        $this->count = $count;
        $this->gradeValue = $options?->gradeValue ?? null;
    }

    public static function gradeConditionIsAny(
        UnleashIndividualMaterialSettingMatchType $matchType,
        int $count,
        ?UnleashIndividualMaterialSettingGradeConditionIsAnyOptions $options = null,
    ): UnleashIndividualMaterialSetting {
        return (new UnleashIndividualMaterialSetting(
            $matchType,
            UnleashIndividualMaterialSettingGradeCondition::ANY,
            $count,
            new UnleashIndividualMaterialSettingOptions(
            ),
        ));
    }

    public static function gradeConditionIsSameAsTarget(
        UnleashIndividualMaterialSettingMatchType $matchType,
        int $count,
        ?UnleashIndividualMaterialSettingGradeConditionIsSameAsTargetOptions $options = null,
    ): UnleashIndividualMaterialSetting {
        return (new UnleashIndividualMaterialSetting(
            $matchType,
            UnleashIndividualMaterialSettingGradeCondition::SAME_AS_TARGET,
            $count,
            new UnleashIndividualMaterialSettingOptions(
            ),
        ));
    }

    public static function gradeConditionIsEqual(
        UnleashIndividualMaterialSettingMatchType $matchType,
        int $count,
        int $gradeValue,
        ?UnleashIndividualMaterialSettingGradeConditionIsEqualOptions $options = null,
    ): UnleashIndividualMaterialSetting {
        return (new UnleashIndividualMaterialSetting(
            $matchType,
            UnleashIndividualMaterialSettingGradeCondition::EQUAL,
            $count,
            new UnleashIndividualMaterialSettingOptions(
                gradeValue: $gradeValue,
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
        if ($this->gradeCondition != null) {
            $properties["gradeCondition"] = $this->gradeCondition?->toString(
            );
        }
        if ($this->gradeValue != null) {
            $properties["gradeValue"] = $this->gradeValue;
        }
        if ($this->count != null) {
            $properties["count"] = $this->count;
        }

        return $properties;
    }
}
