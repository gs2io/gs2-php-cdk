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
namespace Gs2Cdk\SkillTree\Model\Options;
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;

class NodeModelOptions {
    public ?string $metadata;
    public ?array $releaseVerifyActions;
    public ?array $returnAcquireActions;
    public ?array $premiseNodeNames;
    
    public function __construct(
        ?string $metadata = null,
        ?array $releaseVerifyActions = null,
        ?array $returnAcquireActions = null,
        ?array $premiseNodeNames = null,
    ) {
        $this->metadata = $metadata;
        $this->releaseVerifyActions = $releaseVerifyActions;
        $this->returnAcquireActions = $returnAcquireActions;
        $this->premiseNodeNames = $premiseNodeNames;
    }}

