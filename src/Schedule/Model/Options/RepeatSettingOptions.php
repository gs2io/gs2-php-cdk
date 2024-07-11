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
use Gs2Cdk\Schedule\Model\Enum\RepeatSettingRepeatType;
use Gs2Cdk\Schedule\Model\Enum\RepeatSettingBeginDayOfWeek;
use Gs2Cdk\Schedule\Model\Enum\RepeatSettingEndDayOfWeek;

class RepeatSettingOptions {
    public ?int $beginDayOfMonth;
    public ?int $endDayOfMonth;
    public ?RepeatSettingBeginDayOfWeek $beginDayOfWeek;
    public ?RepeatSettingEndDayOfWeek $endDayOfWeek;
    public ?int $beginHour;
    public ?int $endHour;
    public ?int $anchorTimestamp;
    public ?int $activeDays;
    public ?int $inactiveDays;
    
    public function __construct(
        ?int $beginDayOfMonth = null,
        ?int $endDayOfMonth = null,
        ?RepeatSettingBeginDayOfWeek $beginDayOfWeek = null,
        ?RepeatSettingEndDayOfWeek $endDayOfWeek = null,
        ?int $beginHour = null,
        ?int $endHour = null,
        ?int $anchorTimestamp = null,
        ?int $activeDays = null,
        ?int $inactiveDays = null,
    ) {
        $this->beginDayOfMonth = $beginDayOfMonth;
        $this->endDayOfMonth = $endDayOfMonth;
        $this->beginDayOfWeek = $beginDayOfWeek;
        $this->endDayOfWeek = $endDayOfWeek;
        $this->beginHour = $beginHour;
        $this->endHour = $endHour;
        $this->anchorTimestamp = $anchorTimestamp;
        $this->activeDays = $activeDays;
        $this->inactiveDays = $inactiveDays;
    }}

