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
namespace Gs2Cdk\Exchange\Model\Options;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Exchange\Model\Enums\IncrementalRateModelCalculateType;

class IncrementalRateModelOptions {
    public ?string $metadata;
    public ?int $baseValue;
    public ?int $coefficientValue;
    public ?string $calculateScriptId;
    public ?array $acquireActions;
    
    public function __construct(
        ?string $metadata = null,
        ?int $baseValue = null,
        ?int $coefficientValue = null,
        ?string $calculateScriptId = null,
        ?array $acquireActions = null,
    ) {
        $this->metadata = $metadata;
        $this->baseValue = $baseValue;
        $this->coefficientValue = $coefficientValue;
        $this->calculateScriptId = $calculateScriptId;
        $this->acquireActions = $acquireActions;
    }}

