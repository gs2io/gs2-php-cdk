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
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Exchange\Model\Enums\RateModelTimingType;

class RateModelOptions {
    public ?string $metadata;
    public ?array $verifyActions;
    public ?array $consumeActions;
    public ?int $lockTime;
    public ?array $acquireActions;
    
    public function __construct(
        ?string $metadata = null,
        ?array $verifyActions = null,
        ?array $consumeActions = null,
        ?int $lockTime = null,
        ?array $acquireActions = null,
    ) {
        $this->metadata = $metadata;
        $this->verifyActions = $verifyActions;
        $this->consumeActions = $consumeActions;
        $this->lockTime = $lockTime;
        $this->acquireActions = $acquireActions;
    }}

