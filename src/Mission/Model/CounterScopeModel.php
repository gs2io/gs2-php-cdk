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
use Gs2Cdk\Mission\Model\Options\CounterScopeModelOptions;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelResetTypeIsNotResetOptions;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelResetTypeIsDailyOptions;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelResetTypeIsWeeklyOptions;
use Gs2Cdk\Mission\Model\Options\CounterScopeModelResetTypeIsMonthlyOptions;
use Gs2Cdk\Mission\Model\Enum\CounterScopeModelResetType;
use Gs2Cdk\Mission\Model\Enum\CounterScopeModelResetDayOfWeek;

class CounterScopeModel {
    private CounterScopeModelResetType $resetType;
    private ?int $resetDayOfMonth = null;
    private ?CounterScopeModelResetDayOfWeek $resetDayOfWeek = null;
    private ?int $resetHour = null;

    public function __construct(
        CounterScopeModelResetType $resetType,
        ?CounterScopeModelOptions $options = null,
    ) {
        $this->resetType = $resetType;
        $this->resetDayOfMonth = $options?->resetDayOfMonth ?? null;
        $this->resetDayOfWeek = $options?->resetDayOfWeek ?? null;
        $this->resetHour = $options?->resetHour ?? null;
    }

    public static function resetTypeIsNotReset(
        ?CounterScopeModelResetTypeIsNotResetOptions $options = null,
    ): CounterScopeModel {
        return (new CounterScopeModel(
            CounterScopeModelResetType::NOT_RESET,
            new CounterScopeModelOptions(
            ),
        ));
    }

    public static function resetTypeIsDaily(
        int $resetHour,
        ?CounterScopeModelResetTypeIsDailyOptions $options = null,
    ): CounterScopeModel {
        return (new CounterScopeModel(
            CounterScopeModelResetType::DAILY,
            new CounterScopeModelOptions(
                resetHour: $resetHour,
            ),
        ));
    }

    public static function resetTypeIsWeekly(
        CounterScopeModelResetDayOfWeek $resetDayOfWeek,
        int $resetHour,
        ?CounterScopeModelResetTypeIsWeeklyOptions $options = null,
    ): CounterScopeModel {
        return (new CounterScopeModel(
            CounterScopeModelResetType::WEEKLY,
            new CounterScopeModelOptions(
                resetDayOfWeek: $resetDayOfWeek,
                resetHour: $resetHour,
            ),
        ));
    }

    public static function resetTypeIsMonthly(
        int $resetDayOfMonth,
        int $resetHour,
        ?CounterScopeModelResetTypeIsMonthlyOptions $options = null,
    ): CounterScopeModel {
        return (new CounterScopeModel(
            CounterScopeModelResetType::MONTHLY,
            new CounterScopeModelOptions(
                resetDayOfMonth: $resetDayOfMonth,
                resetHour: $resetHour,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

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

        return $properties;
    }
}
