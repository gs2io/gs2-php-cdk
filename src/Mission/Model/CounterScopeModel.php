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
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelOptions;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelResetTypeIsNotResetOptions;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelResetTypeIsDailyOptions;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelResetTypeIsWeeklyOptions;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelResetTypeIsMonthlyOptions;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelResetTypeIsDaysOptions;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelScopeTypeIsResetTimingOptions;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelScopeTypeIsVerifyActionOptions;
use Gs2Cdk\Mission\Model\Enums\CounterScopeModelScopeType;
use Gs2Cdk\Mission\Model\Enums\CounterScopeModelResetType;
use Gs2Cdk\Mission\Model\Enums\CounterScopeModelResetDayOfWeek;

class CounterScopeModel {
    private CounterScopeModelScopeType $scopeType;
    private CounterScopeModelResetType $resetType;
    private ?int $resetDayOfMonth = null;
    private ?CounterScopeModelResetDayOfWeek $resetDayOfWeek = null;
    private ?int $resetHour = null;
    private ?string $conditionName = null;
    private ?VerifyAction $condition = null;
    private ?int $anchorTimestamp = null;
    private ?int $days = null;

    public function __construct(
        CounterScopeModelScopeType $scopeType,
        CounterScopeModelResetType $resetType,
        ?CounterScopeModelOptions $options = null,
    ) {
        $this->scopeType = $scopeType;
        $this->resetType = $resetType;
        $this->resetDayOfMonth = $options?->resetDayOfMonth ?? null;
        $this->resetDayOfWeek = $options?->resetDayOfWeek ?? null;
        $this->resetHour = $options?->resetHour ?? null;
        $this->conditionName = $options?->conditionName ?? null;
        $this->condition = $options?->condition ?? null;
        $this->anchorTimestamp = $options?->anchorTimestamp ?? null;
        $this->days = $options?->days ?? null;
    }

    public static function resetTypeIsNotReset(
        CounterScopeModelScopeType $scopeType,
        ?CounterScopeModelResetTypeIsNotResetOptions $options = null,
    ): CounterScopeModel {
        return (new CounterScopeModel(
            $scopeType,
            CounterScopeModelResetType::NOT_RESET,
            new CounterScopeModelOptions(
            ),
        ));
    }

    public static function resetTypeIsDaily(
        CounterScopeModelScopeType $scopeType,
        int $resetHour,
        ?CounterScopeModelResetTypeIsDailyOptions $options = null,
    ): CounterScopeModel {
        return (new CounterScopeModel(
            $scopeType,
            CounterScopeModelResetType::DAILY,
            new CounterScopeModelOptions(
                resetHour: $resetHour,
            ),
        ));
    }

    public static function resetTypeIsWeekly(
        CounterScopeModelScopeType $scopeType,
        CounterScopeModelResetDayOfWeek $resetDayOfWeek,
        int $resetHour,
        ?CounterScopeModelResetTypeIsWeeklyOptions $options = null,
    ): CounterScopeModel {
        return (new CounterScopeModel(
            $scopeType,
            CounterScopeModelResetType::WEEKLY,
            new CounterScopeModelOptions(
                resetDayOfWeek: $resetDayOfWeek,
                resetHour: $resetHour,
            ),
        ));
    }

    public static function resetTypeIsMonthly(
        CounterScopeModelScopeType $scopeType,
        int $resetDayOfMonth,
        int $resetHour,
        ?CounterScopeModelResetTypeIsMonthlyOptions $options = null,
    ): CounterScopeModel {
        return (new CounterScopeModel(
            $scopeType,
            CounterScopeModelResetType::MONTHLY,
            new CounterScopeModelOptions(
                resetDayOfMonth: $resetDayOfMonth,
                resetHour: $resetHour,
            ),
        ));
    }

    public static function resetTypeIsDays(
        CounterScopeModelScopeType $scopeType,
        int $anchorTimestamp,
        int $days,
        ?CounterScopeModelResetTypeIsDaysOptions $options = null,
    ): CounterScopeModel {
        return (new CounterScopeModel(
            $scopeType,
            CounterScopeModelResetType::DAYS,
            new CounterScopeModelOptions(
                anchorTimestamp: $anchorTimestamp,
                days: $days,
            ),
        ));
    }

    public static function scopeTypeIsResetTiming(
        CounterScopeModelResetType $resetType,
        ?CounterScopeModelScopeTypeIsResetTimingOptions $options = null,
    ): CounterScopeModel {
        return (new CounterScopeModel(
            CounterScopeModelScopeType::RESET_TIMING,
            $resetType,
            new CounterScopeModelOptions(
            ),
        ));
    }

    public static function scopeTypeIsVerifyAction(
        CounterScopeModelResetType $resetType,
        string $conditionName,
        VerifyAction $condition,
        ?CounterScopeModelScopeTypeIsVerifyActionOptions $options = null,
    ): CounterScopeModel {
        return (new CounterScopeModel(
            CounterScopeModelScopeType::VERIFY_ACTION,
            $resetType,
            new CounterScopeModelOptions(
                conditionName: $conditionName,
                condition: $condition,
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
        if ($this->resetDayOfMonth != null) {
            $properties["resetDayOfMonth"] = $this->resetDayOfMonth;
        }
        if ($this->resetDayOfWeek != null) {
            $properties["resetDayOfWeek"] = $this->resetDayOfWeek?->toString(
            );
        }
        if ($this->resetHour != null) {
            $properties["resetHour"] = $this->resetHour;
        }
        if ($this->conditionName != null) {
            $properties["conditionName"] = $this->conditionName;
        }
        if ($this->condition != null) {
            $properties["condition"] = $this->condition?->properties(
            );
        }
        if ($this->anchorTimestamp != null) {
            $properties["anchorTimestamp"] = $this->anchorTimestamp;
        }
        if ($this->days != null) {
            $properties["days"] = $this->days;
        }

        return $properties;
    }
}
