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
namespace Gs2Cdk\LoginReward\Model;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\LoginReward\Model\Reward;
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\LoginReward\Model\Options\BonusModelOptions;
use Gs2Cdk\LoginReward\Model\Options\BonusModelModeIsScheduleOptions;
use Gs2Cdk\LoginReward\Model\Options\BonusModelModeIsStreamingOptions;
use Gs2Cdk\LoginReward\Model\Options\BonusModelMissedReceiveReliefIsEnabledOptions;
use Gs2Cdk\LoginReward\Model\Options\BonusModelMissedReceiveReliefIsDisabledOptions;
use Gs2Cdk\LoginReward\Model\Enums\BonusModelMode;
use Gs2Cdk\LoginReward\Model\Enums\BonusModelRepeat;
use Gs2Cdk\LoginReward\Model\Enums\BonusModelMissedReceiveRelief;

class BonusModel {
    private string $name;
    private BonusModelMode $mode;
    private BonusModelMissedReceiveRelief $missedReceiveRelief;
    private ?string $metadata = null;
    private ?string $periodEventId = null;
    private ?int $resetHour = null;
    private ?BonusModelRepeat $repeat = null;
    private ?array $rewards = null;
    private ?array $missedReceiveReliefVerifyActions = null;
    private ?array $missedReceiveReliefConsumeActions = null;

    public function __construct(
        string $name,
        BonusModelMode $mode,
        BonusModelMissedReceiveRelief $missedReceiveRelief,
        ?BonusModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->mode = $mode;
        $this->missedReceiveRelief = $missedReceiveRelief;
        $this->metadata = $options?->metadata ?? null;
        $this->periodEventId = $options?->periodEventId ?? null;
        $this->resetHour = $options?->resetHour ?? null;
        $this->repeat = $options?->repeat ?? null;
        $this->rewards = $options?->rewards ?? null;
        $this->missedReceiveReliefVerifyActions = $options?->missedReceiveReliefVerifyActions ?? null;
        $this->missedReceiveReliefConsumeActions = $options?->missedReceiveReliefConsumeActions ?? null;
    }

    public static function modeIsSchedule(
        string $name,
        BonusModelMissedReceiveRelief $missedReceiveRelief,
        ?BonusModelModeIsScheduleOptions $options = null,
    ): BonusModel {
        return (new BonusModel(
            $name,
            BonusModelMode::SCHEDULE,
            $missedReceiveRelief,
            new BonusModelOptions(
                metadata: $options?->metadata,
                periodEventId: $options?->periodEventId,
                rewards: $options?->rewards,
                missedReceiveReliefVerifyActions: $options?->missedReceiveReliefVerifyActions,
                missedReceiveReliefConsumeActions: $options?->missedReceiveReliefConsumeActions,
            ),
        ));
    }

    public static function modeIsStreaming(
        string $name,
        BonusModelMissedReceiveRelief $missedReceiveRelief,
        BonusModelRepeat $repeat,
        ?BonusModelModeIsStreamingOptions $options = null,
    ): BonusModel {
        return (new BonusModel(
            $name,
            BonusModelMode::STREAMING,
            $missedReceiveRelief,
            new BonusModelOptions(
                repeat: $repeat,
                metadata: $options?->metadata,
                periodEventId: $options?->periodEventId,
                rewards: $options?->rewards,
                missedReceiveReliefVerifyActions: $options?->missedReceiveReliefVerifyActions,
                missedReceiveReliefConsumeActions: $options?->missedReceiveReliefConsumeActions,
            ),
        ));
    }

    public static function missedReceiveReliefIsEnabled(
        string $name,
        BonusModelMode $mode,
        ?BonusModelMissedReceiveReliefIsEnabledOptions $options = null,
    ): BonusModel {
        return (new BonusModel(
            $name,
            $mode,
            BonusModelMissedReceiveRelief::ENABLED,
            new BonusModelOptions(
                metadata: $options?->metadata,
                periodEventId: $options?->periodEventId,
                rewards: $options?->rewards,
                missedReceiveReliefVerifyActions: $options?->missedReceiveReliefVerifyActions,
                missedReceiveReliefConsumeActions: $options?->missedReceiveReliefConsumeActions,
            ),
        ));
    }

    public static function missedReceiveReliefIsDisabled(
        string $name,
        BonusModelMode $mode,
        ?BonusModelMissedReceiveReliefIsDisabledOptions $options = null,
    ): BonusModel {
        return (new BonusModel(
            $name,
            $mode,
            BonusModelMissedReceiveRelief::DISABLED,
            new BonusModelOptions(
                metadata: $options?->metadata,
                periodEventId: $options?->periodEventId,
                rewards: $options?->rewards,
                missedReceiveReliefVerifyActions: $options?->missedReceiveReliefVerifyActions,
                missedReceiveReliefConsumeActions: $options?->missedReceiveReliefConsumeActions,
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
        if ($this->mode != null) {
            $properties["mode"] = $this->mode?->toString(
            );
        }
        if ($this->periodEventId != null) {
            $properties["periodEventId"] = $this->periodEventId;
        }
        if ($this->resetHour != null) {
            $properties["resetHour"] = $this->resetHour;
        }
        if ($this->repeat != null) {
            $properties["repeat"] = $this->repeat?->toString(
            );
        }
        if ($this->rewards != null) {
            $properties["rewards"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->rewards
            );
        }
        if ($this->missedReceiveRelief != null) {
            $properties["missedReceiveRelief"] = $this->missedReceiveRelief?->toString(
            );
        }
        if ($this->missedReceiveReliefVerifyActions != null) {
            $properties["missedReceiveReliefVerifyActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->missedReceiveReliefVerifyActions
            );
        }
        if ($this->missedReceiveReliefConsumeActions != null) {
            $properties["missedReceiveReliefConsumeActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->missedReceiveReliefConsumeActions
            );
        }

        return $properties;
    }
}
