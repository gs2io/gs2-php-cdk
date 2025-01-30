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
namespace Gs2Cdk\Limit\Model;
use Gs2Cdk\Limit\Model\Options\LimitModelOptions;
use Gs2Cdk\Limit\Model\Options\LimitModelResetTypeIsNotResetOptions;
use Gs2Cdk\Limit\Model\Options\LimitModelResetTypeIsDailyOptions;
use Gs2Cdk\Limit\Model\Options\LimitModelResetTypeIsWeeklyOptions;
use Gs2Cdk\Limit\Model\Options\LimitModelResetTypeIsMonthlyOptions;
use Gs2Cdk\Limit\Model\Options\LimitModelResetTypeIsDaysOptions;
use Gs2Cdk\Limit\Model\Enum\LimitModelResetType;
use Gs2Cdk\Limit\Model\Enum\LimitModelResetDayOfWeek;

class LimitModel {
    private string $name;
    private LimitModelResetType $resetType;
    private ?string $metadata = null;
    private ?int $resetDayOfMonth = null;
    private ?LimitModelResetDayOfWeek $resetDayOfWeek = null;
    private ?int $resetHour = null;
    private ?int $anchorTimestamp = null;
    private ?int $days = null;

    public function __construct(
        string $name,
        LimitModelResetType $resetType,
        ?LimitModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->resetType = $resetType;
        $this->metadata = $options?->metadata ?? null;
        $this->resetDayOfMonth = $options?->resetDayOfMonth ?? null;
        $this->resetDayOfWeek = $options?->resetDayOfWeek ?? null;
        $this->resetHour = $options?->resetHour ?? null;
        $this->anchorTimestamp = $options?->anchorTimestamp ?? null;
        $this->days = $options?->days ?? null;
    }

    public static function resetTypeIsNotReset(
        string $name,
        ?LimitModelResetTypeIsNotResetOptions $options = null,
    ): LimitModel {
        return (new LimitModel(
            $name,
            LimitModelResetType::NOT_RESET,
            new LimitModelOptions(
                metadata: $options?->metadata,
            ),
        ));
    }

    public static function resetTypeIsDaily(
        string $name,
        int $resetHour,
        ?LimitModelResetTypeIsDailyOptions $options = null,
    ): LimitModel {
        return (new LimitModel(
            $name,
            LimitModelResetType::DAILY,
            new LimitModelOptions(
                resetHour: $resetHour,
                metadata: $options?->metadata,
            ),
        ));
    }

    public static function resetTypeIsWeekly(
        string $name,
        LimitModelResetDayOfWeek $resetDayOfWeek,
        int $resetHour,
        ?LimitModelResetTypeIsWeeklyOptions $options = null,
    ): LimitModel {
        return (new LimitModel(
            $name,
            LimitModelResetType::WEEKLY,
            new LimitModelOptions(
                resetDayOfWeek: $resetDayOfWeek,
                resetHour: $resetHour,
                metadata: $options?->metadata,
            ),
        ));
    }

    public static function resetTypeIsMonthly(
        string $name,
        int $resetDayOfMonth,
        int $resetHour,
        ?LimitModelResetTypeIsMonthlyOptions $options = null,
    ): LimitModel {
        return (new LimitModel(
            $name,
            LimitModelResetType::MONTHLY,
            new LimitModelOptions(
                resetDayOfMonth: $resetDayOfMonth,
                resetHour: $resetHour,
                metadata: $options?->metadata,
            ),
        ));
    }

    public static function resetTypeIsDays(
        string $name,
        int $anchorTimestamp,
        int $days,
        ?LimitModelResetTypeIsDaysOptions $options = null,
    ): LimitModel {
        return (new LimitModel(
            $name,
            LimitModelResetType::DAYS,
            new LimitModelOptions(
                anchorTimestamp: $anchorTimestamp,
                days: $days,
                metadata: $options?->metadata,
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
        if ($this->anchorTimestamp != null) {
            $properties["anchorTimestamp"] = $this->anchorTimestamp;
        }
        if ($this->days != null) {
            $properties["days"] = $this->days;
        }

        return $properties;
    }
}
