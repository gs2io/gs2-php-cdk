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
namespace Gs2Cdk\Mission\Model;
use Gs2Cdk\Mission\Model\Options\TargetCounterModelOptions;
use Gs2Cdk\Mission\Model\Options\TargetCounterModelScopeTypeIsResetTimingOptions;
use Gs2Cdk\Mission\Model\Options\TargetCounterModelScopeTypeIsVerifyActionOptions;
use Gs2Cdk\Mission\Model\Enums\TargetCounterModelScopeType;
use Gs2Cdk\Mission\Model\Enums\TargetCounterModelResetType;

class TargetCounterModel {
    private string $counterName;
    private TargetCounterModelScopeType $scopeType;
    private int $value;
    private ?TargetCounterModelResetType $resetType = null;
    private ?string $conditionName = null;

    public function __construct(
        string $counterName,
        TargetCounterModelScopeType $scopeType,
        int $value,
        ?TargetCounterModelOptions $options = null,
    ) {
        $this->counterName = $counterName;
        $this->scopeType = $scopeType;
        $this->value = $value;
        $this->resetType = $options?->resetType ?? null;
        $this->conditionName = $options?->conditionName ?? null;
    }

    public static function scopeTypeIsResetTiming(
        string $counterName,
        int $value,
        ?TargetCounterModelScopeTypeIsResetTimingOptions $options = null,
    ): TargetCounterModel {
        return (new TargetCounterModel(
            $counterName,
            TargetCounterModelScopeType::RESET_TIMING,
            $value,
            new TargetCounterModelOptions(
                resetType: $options?->resetType,
            ),
        ));
    }

    public static function scopeTypeIsVerifyAction(
        string $counterName,
        int $value,
        string $conditionName,
        ?TargetCounterModelScopeTypeIsVerifyActionOptions $options = null,
    ): TargetCounterModel {
        return (new TargetCounterModel(
            $counterName,
            TargetCounterModelScopeType::VERIFY_ACTION,
            $value,
            new TargetCounterModelOptions(
                conditionName: $conditionName,
                resetType: $options?->resetType,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->counterName != null) {
            $properties["counterName"] = $this->counterName;
        }
        if ($this->scopeType != null) {
            $properties["scopeType"] = $this->scopeType?->toString(
            );
        }
        if ($this->resetType != null) {
            $properties["resetType"] = $this->resetType?->toString(
            );
        }
        if ($this->conditionName != null) {
            $properties["conditionName"] = $this->conditionName;
        }
        if ($this->value != null) {
            $properties["value"] = $this->value;
        }

        return $properties;
    }
}
