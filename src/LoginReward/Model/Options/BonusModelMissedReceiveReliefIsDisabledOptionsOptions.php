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
namespace Gs2Cdk\LoginReward\Model\Options;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\LoginReward\Model\Reward;
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\LoginReward\Model\Enums\BonusModelMode;
use Gs2Cdk\LoginReward\Model\Enums\BonusModelRepeat;
use Gs2Cdk\LoginReward\Model\Enums\BonusModelMissedReceiveRelief;

class BonusModelMissedReceiveReliefIsDisabledOptions {
    public ?string $metadata;
    public ?string $periodEventId;
    public ?array $rewards;
    public ?array $missedReceiveReliefVerifyActions;
    public ?array $missedReceiveReliefConsumeActions;
    
    public function __construct(
        ?string $metadata = null,
        ?string $periodEventId = null,
        ?array $rewards = null,
        ?array $missedReceiveReliefVerifyActions = null,
        ?array $missedReceiveReliefConsumeActions = null,
    ) {
        $this->metadata = $metadata;
        $this->periodEventId = $periodEventId;
        $this->rewards = $rewards;
        $this->missedReceiveReliefVerifyActions = $missedReceiveReliefVerifyActions;
        $this->missedReceiveReliefConsumeActions = $missedReceiveReliefConsumeActions;
    }}
