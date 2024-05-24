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
namespace Gs2Cdk\Buff\Model\Options;
use Gs2Cdk\Buff\Model\BuffTargetGrn;
use Gs2Cdk\Buff\Model\BuffTargetModel;
use Gs2Cdk\Buff\Model\BuffTargetAction;
use Gs2Cdk\Buff\Model\Enum\BuffEntryModelTargetType;
use Gs2Cdk\Buff\Model\Enum\BuffEntryModelExpression;

class BuffEntryModelOptions {
    public ?string $metadata;
    public ?BuffTargetModel $targetModel;
    public ?BuffTargetAction $targetAction;
    public ?string $applyPeriodScheduleEventId;
    
    public function __construct(
        ?string $metadata = null,
        ?BuffTargetModel $targetModel = null,
        ?BuffTargetAction $targetAction = null,
        ?string $applyPeriodScheduleEventId = null,
    ) {
        $this->metadata = $metadata;
        $this->targetModel = $targetModel;
        $this->targetAction = $targetAction;
        $this->applyPeriodScheduleEventId = $applyPeriodScheduleEventId;
    }}

