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
use Gs2Cdk\Mission\Model\TargetCounterModel;
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Mission\Model\Enums\MissionTaskModelVerifyCompleteType;
use Gs2Cdk\Mission\Model\Enums\MissionTaskModelTargetResetType;

class MissionTaskModelOptions {
    public ?string $metadata;
    public ?TargetCounterModel $targetCounter;
    public ?array $verifyCompleteConsumeActions;
    public ?array $completeAcquireActions;
    public ?string $challengePeriodEventId;
    public ?string $premiseMissionTaskName;
    public ?MissionTaskModelTargetResetType $targetResetType;
    
    public function __construct(
        ?string $metadata = null,
        ?TargetCounterModel $targetCounter = null,
        ?array $verifyCompleteConsumeActions = null,
        ?array $completeAcquireActions = null,
        ?string $challengePeriodEventId = null,
        ?string $premiseMissionTaskName = null,
        ?MissionTaskModelTargetResetType $targetResetType = null,
    ) {
        $this->metadata = $metadata;
        $this->targetCounter = $targetCounter;
        $this->verifyCompleteConsumeActions = $verifyCompleteConsumeActions;
        $this->completeAcquireActions = $completeAcquireActions;
        $this->challengePeriodEventId = $challengePeriodEventId;
        $this->premiseMissionTaskName = $premiseMissionTaskName;
        $this->targetResetType = $targetResetType;
    }}

