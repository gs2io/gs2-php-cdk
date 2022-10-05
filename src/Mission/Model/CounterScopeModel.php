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

namespace Gs2Cdk\Mission\Model;

use Gs2Cdk\Mission\Model\Enum\CounterScopeModelResetType;
use Gs2Cdk\Mission\Model\Enum\CounterScopeModelResetDayOfWeek;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class CounterScopeModel {
	public CounterScopeModelResetType $resetType;
	public ?int $resetDayOfMonth;
	public ?CounterScopeModelResetDayOfWeek $resetDayOfWeek;
	public ?int $resetHour;

    public function __construct(
            CounterScopeModelResetType $resetType,
            int $resetDayOfMonth = null,
            CounterScopeModelResetDayOfWeek $resetDayOfWeek = null,
            int $resetHour = null,
    ) {
        $this->resetType = $resetType;
        $this->resetDayOfMonth = $resetDayOfMonth;
        $this->resetDayOfWeek = $resetDayOfWeek;
        $this->resetHour = $resetHour;
    }

    public static function notReset(
    ): CounterScopeModel {
        return new CounterScopeModel(
            resetType: CounterScopeModelResetType::NOT_RESET,
        );
    }

    public static function daily(
        int $resetHour,
    ): CounterScopeModel {
        return new CounterScopeModel(
            resetType: CounterScopeModelResetType::DAILY,
            resetHour: $resetHour,
        );
    }

    public static function weekly(
        string $resetDayOfWeek,
        int $resetHour,
    ): CounterScopeModel {
        return new CounterScopeModel(
            resetType: CounterScopeModelResetType::WEEKLY,
            resetDayOfWeek: $resetDayOfWeek,
            resetHour: $resetHour,
        );
    }

    public static function monthly(
        int $resetDayOfMonth,
        int $resetHour,
    ): CounterScopeModel {
        return new CounterScopeModel(
            resetType: CounterScopeModelResetType::MONTHLY,
            resetDayOfMonth: $resetDayOfMonth,
            resetHour: $resetHour,
        );
    }

    public function properties(): array {
        $properties = [];
        if ($this->resetType != null) {
            $properties["ResetType"] = $this->resetType->toString();
        }
        if ($this->resetDayOfMonth != null) {
            $properties["ResetDayOfMonth"] = $this->resetDayOfMonth;
        }
        if ($this->resetDayOfWeek != null) {
            $properties["ResetDayOfWeek"] = $this->resetDayOfWeek->toString();
        }
        if ($this->resetHour != null) {
            $properties["ResetHour"] = $this->resetHour;
        }
        return $properties;
    }
}
