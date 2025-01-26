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
namespace Gs2Cdk\Mission\Model;
use Gs2Cdk\Mission\Model\TargetCounterModel;
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Mission\Model\MissionTaskModel;
use Gs2Cdk\Mission\Model\Options\MissionGroupModelOptions;
use Gs2Cdk\Mission\Model\Options\MissionGroupModelResetTypeIsNotResetOptions;
use Gs2Cdk\Mission\Model\Options\MissionGroupModelResetTypeIsDailyOptions;
use Gs2Cdk\Mission\Model\Options\MissionGroupModelResetTypeIsWeeklyOptions;
use Gs2Cdk\Mission\Model\Options\MissionGroupModelResetTypeIsMonthlyOptions;
use Gs2Cdk\Mission\Model\Options\MissionGroupModelResetTypeIsDaysOptions;
use Gs2Cdk\Mission\Model\Enum\MissionGroupModelResetType;
use Gs2Cdk\Mission\Model\Enum\MissionGroupModelResetDayOfWeek;

class MissionGroupModel {
    private string $name;
    private MissionGroupModelResetType $resetType;
    private ?string $metadata = null;
    private ?array $tasks = null;
    private ?int $resetDayOfMonth = null;
    private ?MissionGroupModelResetDayOfWeek $resetDayOfWeek = null;
    private ?int $resetHour = null;
    private ?string $completeNotificationNamespaceId = null;
    private ?int $anchorTimestamp = null;
    private ?int $days = null;

    public function __construct(
        string $name,
        MissionGroupModelResetType $resetType,
        ?MissionGroupModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->resetType = $resetType;
        $this->metadata = $options?->metadata ?? null;
        $this->tasks = $options?->tasks ?? null;
        $this->resetDayOfMonth = $options?->resetDayOfMonth ?? null;
        $this->resetDayOfWeek = $options?->resetDayOfWeek ?? null;
        $this->resetHour = $options?->resetHour ?? null;
        $this->completeNotificationNamespaceId = $options?->completeNotificationNamespaceId ?? null;
        $this->anchorTimestamp = $options?->anchorTimestamp ?? null;
        $this->days = $options?->days ?? null;
    }

    public static function resetTypeIsNotReset(
        string $name,
        ?MissionGroupModelResetTypeIsNotResetOptions $options = null,
    ): MissionGroupModel {
        return (new MissionGroupModel(
            $name,
            MissionGroupModelResetType::NOT_RESET,
            new MissionGroupModelOptions(
                metadata: $options?->metadata,
                tasks: $options?->tasks,
                completeNotificationNamespaceId: $options?->completeNotificationNamespaceId,
            ),
        ));
    }

    public static function resetTypeIsDaily(
        string $name,
        int $resetHour,
        ?MissionGroupModelResetTypeIsDailyOptions $options = null,
    ): MissionGroupModel {
        return (new MissionGroupModel(
            $name,
            MissionGroupModelResetType::DAILY,
            new MissionGroupModelOptions(
                resetHour: $resetHour,
                metadata: $options?->metadata,
                tasks: $options?->tasks,
                completeNotificationNamespaceId: $options?->completeNotificationNamespaceId,
            ),
        ));
    }

    public static function resetTypeIsWeekly(
        string $name,
        MissionGroupModelResetDayOfWeek $resetDayOfWeek,
        int $resetHour,
        ?MissionGroupModelResetTypeIsWeeklyOptions $options = null,
    ): MissionGroupModel {
        return (new MissionGroupModel(
            $name,
            MissionGroupModelResetType::WEEKLY,
            new MissionGroupModelOptions(
                resetDayOfWeek: $resetDayOfWeek,
                resetHour: $resetHour,
                metadata: $options?->metadata,
                tasks: $options?->tasks,
                completeNotificationNamespaceId: $options?->completeNotificationNamespaceId,
            ),
        ));
    }

    public static function resetTypeIsMonthly(
        string $name,
        int $resetDayOfMonth,
        int $resetHour,
        ?MissionGroupModelResetTypeIsMonthlyOptions $options = null,
    ): MissionGroupModel {
        return (new MissionGroupModel(
            $name,
            MissionGroupModelResetType::MONTHLY,
            new MissionGroupModelOptions(
                resetDayOfMonth: $resetDayOfMonth,
                resetHour: $resetHour,
                metadata: $options?->metadata,
                tasks: $options?->tasks,
                completeNotificationNamespaceId: $options?->completeNotificationNamespaceId,
            ),
        ));
    }

    public static function resetTypeIsDays(
        string $name,
        int $anchorTimestamp,
        int $days,
        ?MissionGroupModelResetTypeIsDaysOptions $options = null,
    ): MissionGroupModel {
        return (new MissionGroupModel(
            $name,
            MissionGroupModelResetType::DAYS,
            new MissionGroupModelOptions(
                anchorTimestamp: $anchorTimestamp,
                days: $days,
                metadata: $options?->metadata,
                tasks: $options?->tasks,
                completeNotificationNamespaceId: $options?->completeNotificationNamespaceId,
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
        if ($this->tasks != null) {
            $properties["tasks"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->tasks
            );
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
        if ($this->completeNotificationNamespaceId != null) {
            $properties["completeNotificationNamespaceId"] = $this->completeNotificationNamespaceId;
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
