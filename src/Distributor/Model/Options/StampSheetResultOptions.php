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
namespace Gs2Cdk\Distributor\Model\Options;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;

class StampSheetResultOptions {
    public ?array $taskRequests;
    public ?array $taskResults;
    public ?string $sheetResult;
    public ?string $nextTransactionId;
    
    public function __construct(
        ?array $taskRequests = null,
        ?array $taskResults = null,
        ?string $sheetResult = null,
        ?string $nextTransactionId = null,
    ) {
        $this->taskRequests = $taskRequests;
        $this->taskResults = $taskResults;
        $this->sheetResult = $sheetResult;
        $this->nextTransactionId = $nextTransactionId;
    }}

