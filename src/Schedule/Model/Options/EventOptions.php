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
namespace Gs2Cdk\Schedule\Model\Options;
use Gs2Cdk\Schedule\Model\Enum\EventScheduleType;
use Gs2Cdk\Schedule\Model\Enum\EventRepeatType;
use Gs2Cdk\Schedule\Model\Enum\EventRepeatBeginDayOfWeek;
use Gs2Cdk\Schedule\Model\Enum\EventRepeatEndDayOfWeek;

class EventOptions {
    public ?string $metadata;
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
        ?string $metadata = null,
        ?EventRepeatType $repeatType = null,
        ?int $absoluteBegin = null,
        ?int $absoluteEnd = null,
        ?int $repeatBeginDayOfMonth = null,
        ?int $repeatEndDayOfMonth = null,
        ?EventRepeatBeginDayOfWeek $repeatBeginDayOfWeek = null,
        ?EventRepeatEndDayOfWeek $repeatEndDayOfWeek = null,
        ?int $repeatBeginHour = null,
        ?int $repeatEndHour = null,
        ?string $relativeTriggerName = null,
        ?int $relativeDuration = null,
    ) {
        $this->metadata = $metadata;
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
    }}

