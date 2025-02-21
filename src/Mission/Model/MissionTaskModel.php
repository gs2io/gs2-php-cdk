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
 *
 * deny overwrite
 */
namespace Gs2Cdk\Mission\Model;
use Gs2Cdk\Mission\Model\TargetCounterModel;
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Mission\Model\Options\MissionTaskModelOptions;
use Gs2Cdk\Mission\Model\Options\MissionTaskModelVerifyCompleteTypeIsCounterOptions;
use Gs2Cdk\Mission\Model\Options\MissionTaskModelVerifyCompleteTypeIsVerifyActionsOptions;
use Gs2Cdk\Mission\Model\Enums\MissionTaskModelVerifyCompleteType;
use Gs2Cdk\Mission\Model\Enums\MissionTaskModelTargetResetType;

class MissionTaskModel {
    private string $name;
    private MissionTaskModelVerifyCompleteType $verifyCompleteType;
    private ?string $metadata = null;
    private ?TargetCounterModel $targetCounter = null;
    private ?array $verifyCompleteConsumeActions = null;
    private ?array $completeAcquireActions = null;
    private ?string $challengePeriodEventId = null;
    private ?string $premiseMissionTaskName = null;
    private ?MissionTaskModelTargetResetType $targetResetType = null;

    public function __construct(
        string $name,
        MissionTaskModelVerifyCompleteType $verifyCompleteType,
        ?MissionTaskModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->verifyCompleteType = $verifyCompleteType;
        $this->metadata = $options?->metadata ?? null;
        $this->targetCounter = $options?->targetCounter ?? null;
        $this->verifyCompleteConsumeActions = $options?->verifyCompleteConsumeActions ?? null;
        $this->completeAcquireActions = $options?->completeAcquireActions ?? null;
        $this->challengePeriodEventId = $options?->challengePeriodEventId ?? null;
        $this->premiseMissionTaskName = $options?->premiseMissionTaskName ?? null;
        $this->targetResetType = $options?->targetResetType ?? null;
    }

    public static function verifyCompleteTypeIsCounter(
        string $name,
        TargetCounterModel $targetCounter,
        ?MissionTaskModelVerifyCompleteTypeIsCounterOptions $options = null,
    ): MissionTaskModel {
        return (new MissionTaskModel(
            $name,
            MissionTaskModelVerifyCompleteType::COUNTER,
            new MissionTaskModelOptions(
                targetCounter: $targetCounter,
                metadata: $options?->metadata,
                verifyCompleteConsumeActions: $options?->verifyCompleteConsumeActions,
                completeAcquireActions: $options?->completeAcquireActions,
                challengePeriodEventId: $options?->challengePeriodEventId,
                premiseMissionTaskName: $options?->premiseMissionTaskName,
                targetResetType: $options?->targetResetType,
            ),
        ));
    }

    public static function verifyCompleteTypeIsVerifyActions(
        string $name,
        ?MissionTaskModelVerifyCompleteTypeIsVerifyActionsOptions $options = null,
    ): MissionTaskModel {
        return (new MissionTaskModel(
            $name,
            MissionTaskModelVerifyCompleteType::VERIFY_ACTIONS,
            new MissionTaskModelOptions(
                metadata: $options?->metadata,
                verifyCompleteConsumeActions: $options?->verifyCompleteConsumeActions,
                completeAcquireActions: $options?->completeAcquireActions,
                challengePeriodEventId: $options?->challengePeriodEventId,
                premiseMissionTaskName: $options?->premiseMissionTaskName,
                targetResetType: $options?->targetResetType,
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
        if ($this->verifyCompleteType != null) {
            $properties["verifyCompleteType"] = $this->verifyCompleteType?->toString(
            );
        }
        if ($this->targetCounter != null) {
            $properties["targetCounter"] = $this->targetCounter?->properties(
            );
        }
        if ($this->verifyCompleteConsumeActions != null) {
            $properties["verifyCompleteConsumeActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->verifyCompleteConsumeActions
            );
        }
        if ($this->completeAcquireActions != null) {
            $properties["completeAcquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->completeAcquireActions
            );
        }
        if ($this->challengePeriodEventId != null) {
            $properties["challengePeriodEventId"] = $this->challengePeriodEventId;
        }
        if ($this->premiseMissionTaskName != null) {
            $properties["premiseMissionTaskName"] = $this->premiseMissionTaskName;
        }
        if ($this->targetResetType != null) {
            $properties["targetResetType"] = $this->targetResetType?->toString(
            );
        }

        return $properties;
    }
}
