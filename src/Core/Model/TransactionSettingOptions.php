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
namespace Gs2Cdk\Core\Model;

class TransactionSettingOptions {
    public ?bool $enableAtomicCommit = null;
    public ?bool $transactionUseDistributor = null;
    public ?bool $acquireActionUseJobQueue = null;
    public ?String $distributorNamespaceId = null;

    public ?String $queueNamespaceId = null;
    
    public function __construct(
        ?bool $enableAtomicCommit = false,
        ?bool $transactionUseDistributor = false,
        ?bool $acquireActionUseJobQueue = false,
        ?string $distributorNamespaceId = null,
        ?string $queueNamespaceId = null
    ) {
        $this->enableAtomicCommit = $enableAtomicCommit;
        $this->transactionUseDistributor = $transactionUseDistributor;
        $this->acquireActionUseJobQueue = $acquireActionUseJobQueue;
        $this->distributorNamespaceId = $distributorNamespaceId;
        $this->queueNamespaceId = $queueNamespaceId;
    }}

