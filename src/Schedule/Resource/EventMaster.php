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

use Gs2Cdk\Schedule\Resource\Enum\EventMasterScheduleType;
use Gs2Cdk\Schedule\Resource\Enum\EventMasterRepeatType;
use Gs2Cdk\Schedule\Resource\Enum\EventMasterRepeatBeginDayOfWeek;
use Gs2Cdk\Schedule\Resource\Enum\EventMasterRepeatEndDayOfWeek;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

use Gs2Cdk\Schedule\Ref\EventMasterRef;

class EventMaster extends CdkResource {

    public Stack $stack;
    public string $namespaceName;
    public string $name;
    public string $scheduleType;
    public ?int $absoluteBegin;
    public ?int $absoluteEnd;
    public ?string $repeatType;
    public ?int $repeatBeginDayOfMonth;
    public ?int $repeatEndDayOfMonth;
    public ?string $repeatBeginDayOfWeek;
    public ?string $repeatEndDayOfWeek;
    public ?int $repeatBeginHour;
    public ?int $repeatEndHour;
    public ?string $relativeTriggerName;
    public ?int $relativeDuration;

    public function __construct(
            Stack $stack,
            string $namespaceName,
            string $name,
            string $scheduleType,
            int $absoluteBegin,
            int $absoluteEnd,
            string $repeatType,
            int $repeatBeginDayOfMonth,
            int $repeatEndDayOfMonth,
            string $repeatBeginDayOfWeek,
            string $repeatEndDayOfWeek,
            int $repeatBeginHour,
            int $repeatEndHour,
            string $relativeTriggerName,
            int $relativeDuration,
            string $description = null,
            string $metadata = null,
    ) {
        parent::__construct("Schedule_EventMaster_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->name = $name;
        $this->description = $description;
        $this->metadata = $metadata;
        $this->scheduleType = $scheduleType;
        $this->absoluteBegin = $absoluteBegin;
        $this->absoluteEnd = $absoluteEnd;
        $this->repeatType = $repeatType;
        $this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
        $this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
        $this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
        $this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
        $this->repeatBeginHour = $repeatBeginHour;
        $this->repeatEndHour = $repeatEndHour;
        $this->relativeTriggerName = $relativeTriggerName;
        $this->relativeDuration = $relativeDuration;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Schedule::EventMaster";
    }

    public function properties(): array {
        $properties = [];
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->scheduleType != null) {
            $properties["ScheduleType"] = $this->scheduleType->toString();
        }
        if ($this->absoluteBegin != null) {
            $properties["AbsoluteBegin"] = $this->absoluteBegin;
        }
        if ($this->absoluteEnd != null) {
            $properties["AbsoluteEnd"] = $this->absoluteEnd;
        }
        if ($this->repeatType != null) {
            $properties["RepeatType"] = $this->repeatType->toString();
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
    ): EventMasterRef {
        return new EventMasterRef(
            namespaceName: namespaceName,
            eventName: $this->name,
        );
    }

    public function getAttrEventId(): GetAttr {
        return new GetAttr(
            key: "Item.EventId"
        );
    }
}
