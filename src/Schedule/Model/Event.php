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
use Gs2Cdk\Schedule\Model\RepeatSetting;
use Gs2Cdk\Schedule\Model\Options\EventOptions;
use Gs2Cdk\Schedule\Model\Options\EventScheduleTypeIsAbsoluteOptions;
use Gs2Cdk\Schedule\Model\Options\EventScheduleTypeIsRelativeOptions;
use Gs2Cdk\Schedule\Model\Options\EventRepeatTypeIsAlwaysOptions;
use Gs2Cdk\Schedule\Model\Options\EventRepeatTypeIsDailyOptions;
use Gs2Cdk\Schedule\Model\Options\EventRepeatTypeIsWeeklyOptions;
use Gs2Cdk\Schedule\Model\Options\EventRepeatTypeIsMonthlyOptions;
use Gs2Cdk\Schedule\Model\Enum\EventScheduleType;
use Gs2Cdk\Schedule\Model\Enum\EventRepeatType;
use Gs2Cdk\Schedule\Model\Enum\EventRepeatBeginDayOfWeek;
use Gs2Cdk\Schedule\Model\Enum\EventRepeatEndDayOfWeek;

class Event {
    private string $name;
    private EventScheduleType $scheduleType;
    private RepeatSetting $repeatSetting;
    private EventRepeatType $repeatType;
    private ?string $metadata = null;
    private ?int $absoluteBegin = null;
    private ?int $absoluteEnd = null;
    private ?string $relativeTriggerName = null;
    private ?int $repeatBeginDayOfMonth = null;
    private ?int $repeatEndDayOfMonth = null;
    private ?EventRepeatBeginDayOfWeek $repeatBeginDayOfWeek = null;
    private ?EventRepeatEndDayOfWeek $repeatEndDayOfWeek = null;
    private ?int $repeatBeginHour = null;
    private ?int $repeatEndHour = null;

    public function __construct(
        string $name,
        EventScheduleType $scheduleType,
        RepeatSetting $repeatSetting,
        EventRepeatType $repeatType,
        ?EventOptions $options = null,
    ) {
        $this->name = $name;
        $this->scheduleType = $scheduleType;
        $this->repeatSetting = $repeatSetting;
        $this->repeatType = $repeatType;
        $this->metadata = $options?->metadata ?? null;
        $this->absoluteBegin = $options?->absoluteBegin ?? null;
        $this->absoluteEnd = $options?->absoluteEnd ?? null;
        $this->relativeTriggerName = $options?->relativeTriggerName ?? null;
        $this->repeatBeginDayOfMonth = $options?->repeatBeginDayOfMonth ?? null;
        $this->repeatEndDayOfMonth = $options?->repeatEndDayOfMonth ?? null;
        $this->repeatBeginDayOfWeek = $options?->repeatBeginDayOfWeek ?? null;
        $this->repeatEndDayOfWeek = $options?->repeatEndDayOfWeek ?? null;
        $this->repeatBeginHour = $options?->repeatBeginHour ?? null;
        $this->repeatEndHour = $options?->repeatEndHour ?? null;
    }

    public static function scheduleTypeIsAbsolute(
        string $name,
        RepeatSetting $repeatSetting,
        EventRepeatType $repeatType,
        ?EventScheduleTypeIsAbsoluteOptions $options = null,
    ): Event {
        return (new Event(
            $name,
            EventScheduleType::ABSOLUTE,
            $repeatSetting,
            $repeatType,
            new EventOptions(
                metadata: $options?->metadata,
                absoluteBegin: $options?->absoluteBegin,
                absoluteEnd: $options?->absoluteEnd,
            ),
        ));
    }

    public static function scheduleTypeIsRelative(
        string $name,
        RepeatSetting $repeatSetting,
        EventRepeatType $repeatType,
        string $relativeTriggerName,
        ?EventScheduleTypeIsRelativeOptions $options = null,
    ): Event {
        return (new Event(
            $name,
            EventScheduleType::RELATIVE,
            $repeatSetting,
            $repeatType,
            new EventOptions(
                relativeTriggerName: $relativeTriggerName,
                metadata: $options?->metadata,
                absoluteBegin: $options?->absoluteBegin,
                absoluteEnd: $options?->absoluteEnd,
            ),
        ));
    }

    public static function repeatTypeIsAlways(
        string $name,
        EventScheduleType $scheduleType,
        RepeatSetting $repeatSetting,
        ?EventRepeatTypeIsAlwaysOptions $options = null,
    ): Event {
        return (new Event(
            $name,
            $scheduleType,
            $repeatSetting,
            EventRepeatType::ALWAYS,
            new EventOptions(
                metadata: $options?->metadata,
                absoluteBegin: $options?->absoluteBegin,
                absoluteEnd: $options?->absoluteEnd,
            ),
        ));
    }

    public static function repeatTypeIsDaily(
        string $name,
        EventScheduleType $scheduleType,
        RepeatSetting $repeatSetting,
        int $repeatBeginHour,
        int $repeatEndHour,
        ?EventRepeatTypeIsDailyOptions $options = null,
    ): Event {
        return (new Event(
            $name,
            $scheduleType,
            $repeatSetting,
            EventRepeatType::DAILY,
            new EventOptions(
                repeatBeginHour: $repeatBeginHour,
                repeatEndHour: $repeatEndHour,
                metadata: $options?->metadata,
                absoluteBegin: $options?->absoluteBegin,
                absoluteEnd: $options?->absoluteEnd,
            ),
        ));
    }

    public static function repeatTypeIsWeekly(
        string $name,
        EventScheduleType $scheduleType,
        RepeatSetting $repeatSetting,
        EventRepeatBeginDayOfWeek $repeatBeginDayOfWeek,
        EventRepeatEndDayOfWeek $repeatEndDayOfWeek,
        int $repeatBeginHour,
        int $repeatEndHour,
        ?EventRepeatTypeIsWeeklyOptions $options = null,
    ): Event {
        return (new Event(
            $name,
            $scheduleType,
            $repeatSetting,
            EventRepeatType::WEEKLY,
            new EventOptions(
                repeatBeginDayOfWeek: $repeatBeginDayOfWeek,
                repeatEndDayOfWeek: $repeatEndDayOfWeek,
                repeatBeginHour: $repeatBeginHour,
                repeatEndHour: $repeatEndHour,
                metadata: $options?->metadata,
                absoluteBegin: $options?->absoluteBegin,
                absoluteEnd: $options?->absoluteEnd,
            ),
        ));
    }

    public static function repeatTypeIsMonthly(
        string $name,
        EventScheduleType $scheduleType,
        RepeatSetting $repeatSetting,
        int $repeatBeginDayOfMonth,
        int $repeatEndDayOfMonth,
        int $repeatBeginHour,
        int $repeatEndHour,
        ?EventRepeatTypeIsMonthlyOptions $options = null,
    ): Event {
        return (new Event(
            $name,
            $scheduleType,
            $repeatSetting,
            EventRepeatType::MONTHLY,
            new EventOptions(
                repeatBeginDayOfMonth: $repeatBeginDayOfMonth,
                repeatEndDayOfMonth: $repeatEndDayOfMonth,
                repeatBeginHour: $repeatBeginHour,
                repeatEndHour: $repeatEndHour,
                metadata: $options?->metadata,
                absoluteBegin: $options?->absoluteBegin,
                absoluteEnd: $options?->absoluteEnd,
            ),
        ));
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
        if ($this->scheduleType != null) {
            $properties["scheduleType"] = $this->scheduleType?->toString(
            );
        }
        if ($this->absoluteBegin != null) {
            $properties["absoluteBegin"] = $this->absoluteBegin;
        }
        if ($this->absoluteEnd != null) {
            $properties["absoluteEnd"] = $this->absoluteEnd;
        }
        if ($this->relativeTriggerName != null) {
            $properties["relativeTriggerName"] = $this->relativeTriggerName;
        }
        if ($this->repeatSetting != null) {
            $properties["repeatSetting"] = $this->repeatSetting?->properties(
            );
        }
        if ($this->repeatType != null) {
            $properties["repeatType"] = $this->repeatType?->toString(
            );
        }
        if ($this->repeatBeginDayOfMonth != null) {
            $properties["repeatBeginDayOfMonth"] = $this->repeatBeginDayOfMonth;
        }
        if ($this->repeatEndDayOfMonth != null) {
            $properties["repeatEndDayOfMonth"] = $this->repeatEndDayOfMonth;
        }
        if ($this->repeatBeginDayOfWeek != null) {
            $properties["repeatBeginDayOfWeek"] = $this->repeatBeginDayOfWeek?->toString(
            );
        }
        if ($this->repeatEndDayOfWeek != null) {
            $properties["repeatEndDayOfWeek"] = $this->repeatEndDayOfWeek?->toString(
            );
        }
        if ($this->repeatBeginHour != null) {
            $properties["repeatBeginHour"] = $this->repeatBeginHour;
        }
        if ($this->repeatEndHour != null) {
            $properties["repeatEndHour"] = $this->repeatEndHour;
        }

        return $properties;
    }
}
