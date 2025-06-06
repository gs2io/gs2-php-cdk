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
namespace Gs2Cdk\Idle\Model\Options;
use Gs2Cdk\Idle\Model\VerifyActionResult;
use Gs2Cdk\Idle\Model\ConsumeActionResult;
use Gs2Cdk\Idle\Model\AcquireActionResult;

class TransactionResultOptions {
    public ?array $verifyResults;
    public ?array $consumeResults;
    public ?array $acquireResults;
    
    public function __construct(
        ?array $verifyResults = null,
        ?array $consumeResults = null,
        ?array $acquireResults = null,
    ) {
        $this->verifyResults = $verifyResults;
        $this->consumeResults = $consumeResults;
        $this->acquireResults = $acquireResults;
    }}

