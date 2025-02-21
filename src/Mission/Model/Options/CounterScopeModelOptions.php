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
namespace Gs2Cdk\Mission\Model\Options;
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Mission\Model\Enums\CounterScopeModelScopeType;
use Gs2Cdk\Mission\Model\Enums\CounterScopeModelResetType;
use Gs2Cdk\Mission\Model\Enums\CounterScopeModelResetDayOfWeek;

class CounterScopeModelOptions {
    public ?CounterScopeModelResetType $resetType;
    public ?int $resetDayOfMonth;
    public ?CounterScopeModelResetDayOfWeek $resetDayOfWeek;
    public ?int $resetHour;
    public ?string $conditionName;
    public ?VerifyAction $condition;
    public ?int $anchorTimestamp;
    public ?int $days;
    
    public function __construct(
        ?CounterScopeModelResetType $resetType = null,
        ?int $resetDayOfMonth = null,
        ?CounterScopeModelResetDayOfWeek $resetDayOfWeek = null,
        ?int $resetHour = null,
        ?string $conditionName = null,
        ?VerifyAction $condition = null,
        ?int $anchorTimestamp = null,
        ?int $days = null,
    ) {
        $this->resetType = $resetType;
        $this->resetDayOfMonth = $resetDayOfMonth;
        $this->resetDayOfWeek = $resetDayOfWeek;
        $this->resetHour = $resetHour;
        $this->conditionName = $conditionName;
        $this->condition = $condition;
        $this->anchorTimestamp = $anchorTimestamp;
        $this->days = $days;
    }}

