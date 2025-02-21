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
use Gs2Cdk\Schedule\Model\RepeatSetting;
use Gs2Cdk\Schedule\Model\Enums\EventScheduleType;
use Gs2Cdk\Schedule\Model\Enums\EventRepeatType;
use Gs2Cdk\Schedule\Model\Enums\EventRepeatBeginDayOfWeek;
use Gs2Cdk\Schedule\Model\Enums\EventRepeatEndDayOfWeek;

class EventScheduleTypeIsAbsoluteOptions {
    public ?string $metadata;
    public ?int $absoluteBegin;
    public ?int $absoluteEnd;
    
    public function __construct(
        ?string $metadata = null,
        ?int $absoluteBegin = null,
        ?int $absoluteEnd = null,
    ) {
        $this->metadata = $metadata;
        $this->absoluteBegin = $absoluteBegin;
        $this->absoluteEnd = $absoluteEnd;
    }}
