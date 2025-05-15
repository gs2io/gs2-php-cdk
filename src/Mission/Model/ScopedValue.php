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
use Gs2Cdk\Mission\Model\Options\ScopedValueOptions;
use Gs2Cdk\Mission\Model\Options\ScopedValueScopeTypeIsResetTimingOptions;
use Gs2Cdk\Mission\Model\Options\ScopedValueScopeTypeIsVerifyActionOptions;
use Gs2Cdk\Mission\Model\Enums\ScopedValueScopeType;
use Gs2Cdk\Mission\Model\Enums\ScopedValueResetType;

class ScopedValue {
    private ScopedValueScopeType $scopeType;
    private int $value;
    private ?ScopedValueResetType $resetType = null;
    private ?string $conditionName = null;
    private ?int $nextResetAt = null;

    public function __construct(
        ScopedValueScopeType $scopeType,
        int $value,
        ?ScopedValueOptions $options = null,
    ) {
        $this->scopeType = $scopeType;
        $this->value = $value;
        $this->resetType = $options?->resetType ?? null;
        $this->conditionName = $options?->conditionName ?? null;
        $this->nextResetAt = $options?->nextResetAt ?? null;
    }

    public static function scopeTypeIsResetTiming(
        int $value,
        int $updatedAt,
        ScopedValueResetType $resetType,
        ?ScopedValueScopeTypeIsResetTimingOptions $options = null,
    ): ScopedValue {
        return (new ScopedValue(
            ScopedValueScopeType::RESET_TIMING,
            $value,
            $updatedAt,
            new ScopedValueOptions(
                resetType: $resetType,
                nextResetAt: $options?->nextResetAt,
            ),
        ));
    }

    public static function scopeTypeIsVerifyAction(
        int $value,
        int $updatedAt,
        string $conditionName,
        ?ScopedValueScopeTypeIsVerifyActionOptions $options = null,
    ): ScopedValue {
        return (new ScopedValue(
            ScopedValueScopeType::VERIFY_ACTION,
            $value,
            $updatedAt,
            new ScopedValueOptions(
                conditionName: $conditionName,
                nextResetAt: $options?->nextResetAt,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

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
