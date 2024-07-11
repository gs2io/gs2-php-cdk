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
namespace Gs2Cdk\Schedule\Model;
use Gs2Cdk\Schedule\Model\Options\RepeatSettingOptions;
use Gs2Cdk\Schedule\Model\Options\RepeatSettingRepeatTypeIsAlwaysOptions;
use Gs2Cdk\Schedule\Model\Options\RepeatSettingRepeatTypeIsDailyOptions;
use Gs2Cdk\Schedule\Model\Options\RepeatSettingRepeatTypeIsWeeklyOptions;
use Gs2Cdk\Schedule\Model\Options\RepeatSettingRepeatTypeIsMonthlyOptions;
use Gs2Cdk\Schedule\Model\Options\RepeatSettingRepeatTypeIsCustomOptions;
use Gs2Cdk\Schedule\Model\Enum\RepeatSettingRepeatType;
use Gs2Cdk\Schedule\Model\Enum\RepeatSettingBeginDayOfWeek;
use Gs2Cdk\Schedule\Model\Enum\RepeatSettingEndDayOfWeek;

class RepeatSetting {
    private RepeatSettingRepeatType $repeatType;
    private ?int $beginDayOfMonth = null;
    private ?int $endDayOfMonth = null;
    private ?RepeatSettingBeginDayOfWeek $beginDayOfWeek = null;
    private ?RepeatSettingEndDayOfWeek $endDayOfWeek = null;
    private ?int $beginHour = null;
    private ?int $endHour = null;
    private ?int $anchorTimestamp = null;
    private ?int $activeDays = null;
    private ?int $inactiveDays = null;

    public function __construct(
        RepeatSettingRepeatType $repeatType,
        ?RepeatSettingOptions $options = null,
    ) {
        $this->repeatType = $repeatType;
        $this->beginDayOfMonth = $options?->beginDayOfMonth ?? null;
        $this->endDayOfMonth = $options?->endDayOfMonth ?? null;
        $this->beginDayOfWeek = $options?->beginDayOfWeek ?? null;
        $this->endDayOfWeek = $options?->endDayOfWeek ?? null;
        $this->beginHour = $options?->beginHour ?? null;
        $this->endHour = $options?->endHour ?? null;
        $this->anchorTimestamp = $options?->anchorTimestamp ?? null;
        $this->activeDays = $options?->activeDays ?? null;
        $this->inactiveDays = $options?->inactiveDays ?? null;
    }

    public static function repeatTypeIsAlways(
        ?RepeatSettingRepeatTypeIsAlwaysOptions $options = null,
    ): RepeatSetting {
        return (new RepeatSetting(
            RepeatSettingRepeatType::ALWAYS,
            new RepeatSettingOptions(
            ),
        ));
    }

    public static function repeatTypeIsDaily(
        int $beginHour,
        int $endHour,
        ?RepeatSettingRepeatTypeIsDailyOptions $options = null,
    ): RepeatSetting {
        return (new RepeatSetting(
            RepeatSettingRepeatType::DAILY,
            new RepeatSettingOptions(
                beginHour: $beginHour,
                endHour: $endHour,
            ),
        ));
    }

    public static function repeatTypeIsWeekly(
        RepeatSettingBeginDayOfWeek $beginDayOfWeek,
        RepeatSettingEndDayOfWeek $endDayOfWeek,
        int $beginHour,
        int $endHour,
        ?RepeatSettingRepeatTypeIsWeeklyOptions $options = null,
    ): RepeatSetting {
        return (new RepeatSetting(
            RepeatSettingRepeatType::WEEKLY,
            new RepeatSettingOptions(
                beginDayOfWeek: $beginDayOfWeek,
                endDayOfWeek: $endDayOfWeek,
                beginHour: $beginHour,
                endHour: $endHour,
            ),
        ));
    }

    public static function repeatTypeIsMonthly(
        int $beginDayOfMonth,
        int $endDayOfMonth,
        int $beginHour,
        int $endHour,
        ?RepeatSettingRepeatTypeIsMonthlyOptions $options = null,
    ): RepeatSetting {
        return (new RepeatSetting(
            RepeatSettingRepeatType::MONTHLY,
            new RepeatSettingOptions(
                beginDayOfMonth: $beginDayOfMonth,
                endDayOfMonth: $endDayOfMonth,
                beginHour: $beginHour,
                endHour: $endHour,
            ),
        ));
    }

    public static function repeatTypeIsCustom(
        int $anchorTimestamp,
        int $activeDays,
        int $inactiveDays,
        ?RepeatSettingRepeatTypeIsCustomOptions $options = null,
    ): RepeatSetting {
        return (new RepeatSetting(
            RepeatSettingRepeatType::CUSTOM,
            new RepeatSettingOptions(
                anchorTimestamp: $anchorTimestamp,
                activeDays: $activeDays,
                inactiveDays: $inactiveDays,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->repeatType != null) {
            $properties["repeatType"] = $this->repeatType?->toString(
            );
        }
        if ($this->beginDayOfMonth != null) {
            $properties["beginDayOfMonth"] = $this->beginDayOfMonth;
        }
        if ($this->endDayOfMonth != null) {
            $properties["endDayOfMonth"] = $this->endDayOfMonth;
        }
        if ($this->beginDayOfWeek != null) {
            $properties["beginDayOfWeek"] = $this->beginDayOfWeek?->toString(
            );
        }
        if ($this->endDayOfWeek != null) {
            $properties["endDayOfWeek"] = $this->endDayOfWeek?->toString(
            );
        }
        if ($this->beginHour != null) {
            $properties["beginHour"] = $this->beginHour;
        }
        if ($this->endHour != null) {
            $properties["endHour"] = $this->endHour;
        }
        if ($this->anchorTimestamp != null) {
            $properties["anchorTimestamp"] = $this->anchorTimestamp;
        }
        if ($this->activeDays != null) {
            $properties["activeDays"] = $this->activeDays;
        }
        if ($this->inactiveDays != null) {
            $properties["inactiveDays"] = $this->inactiveDays;
        }

        return $properties;
    }
}
