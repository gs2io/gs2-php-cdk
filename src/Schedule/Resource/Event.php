<?php /** @noinspection ALL */
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2Cdk\Schedule\Resource;

use Gs2Cdk\Schedule\Resource\Enum\EventScheduleType;
use Gs2Cdk\Schedule\Resource\Enum\EventRepeatType;
use Gs2Cdk\Schedule\Resource\Enum\EventRepeatBeginDayOfWeek;
use Gs2Cdk\Schedule\Resource\Enum\EventRepeatEndDayOfWeek;

class Event {
	public string $name;
	public ?string $metadata;
	public EventScheduleType $scheduleType;
	public ?EventRepeatType $repeatType;
	public ?int $absoluteBegin;
	public ?int $absoluteEnd;
	public ?int $repeatBeginDayOfMonth;
	public ?int $repeatEndDayOfMonth;
	public ?EventRepeatBeginDayOfWeek $repeatBeginDayOfWeek;
	public ?EventRepeatEndDayOfWeek $repeatEndDayOfWeek;
	public ?int $repeatBeginHour;
	public ?int $repeatEndHour;
	public ?string $relativeTriggerName;
	public ?int $relativeDuration;

    public function __construct(
            string $name,
            EventScheduleType $scheduleType,
            string $metadata = null,
            EventRepeatType $repeatType = null,
            int $absoluteBegin = null,
            int $absoluteEnd = null,
            int $repeatBeginDayOfMonth = null,
            int $repeatEndDayOfMonth = null,
            EventRepeatBeginDayOfWeek $repeatBeginDayOfWeek = null,
            EventRepeatEndDayOfWeek $repeatEndDayOfWeek = null,
            int $repeatBeginHour = null,
            int $repeatEndHour = null,
            string $relativeTriggerName = null,
            int $relativeDuration = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->scheduleType = $scheduleType;
        $this->repeatType = $repeatType;
        $this->absoluteBegin = $absoluteBegin;
        $this->absoluteEnd = $absoluteEnd;
        $this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
        $this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
        $this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
        $this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
        $this->repeatBeginHour = $repeatBeginHour;
        $this->repeatEndHour = $repeatEndHour;
        $this->relativeTriggerName = $relativeTriggerName;
        $this->relativeDuration = $relativeDuration;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->scheduleType != null) {
            $properties["ScheduleType"] = $this->scheduleType->toString();
        }
        if ($this->repeatType != null) {
            $properties["RepeatType"] = $this->repeatType->toString();
        }
        if ($this->absoluteBegin != null) {
            $properties["AbsoluteBegin"] = $this->absoluteBegin;
        }
        if ($this->absoluteEnd != null) {
            $properties["AbsoluteEnd"] = $this->absoluteEnd;
        }
        if ($this->repeatBeginDayOfMonth != null) {
            $properties["RepeatBeginDayOfMonth"] = $this->repeatBeginDayOfMonth;
        }
        if ($this->repeatEndDayOfMonth != null) {
            $properties["RepeatEndDayOfMonth"] = $this->repeatEndDayOfMonth;
        }
        if ($this->repeatBeginDayOfWeek != null) {
            $properties["RepeatBeginDayOfWeek"] = $this->repeatBeginDayOfWeek->toString();
        }
        if ($this->repeatEndDayOfWeek != null) {
            $properties["RepeatEndDayOfWeek"] = $this->repeatEndDayOfWeek->toString();
        }
        if ($this->repeatBeginHour != null) {
            $properties["RepeatBeginHour"] = $this->repeatBeginHour;
        }
        if ($this->repeatEndHour != null) {
            $properties["RepeatEndHour"] = $this->repeatEndHour;
        }
        if ($this->relativeTriggerName != null) {
            $properties["RelativeTriggerName"] = $this->relativeTriggerName;
        }
        if ($this->relativeDuration != null) {
            $properties["RelativeDuration"] = $this->relativeDuration;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): EventRef {
        return new EventRef(
            $namespaceName,
            $this->name,
        );
    }
}
