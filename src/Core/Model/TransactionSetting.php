<?php /** @noinspection ALL */
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

class TransactionSetting
{

    public ?bool $enableAtomicCommit = null;
    public ?bool $transactionUseDistributor = null;
    public ?bool $acquireActionUseJobQueue = null;
    public ?String $distributorNamespaceId = null;

    public ?String $queueNamespaceId = null;

    public function __construct(
        TransactionSettingOptions $options = null,
    ) {
        $this->enableAtomicCommit = $options?->enableAtomicCommit ?? false;
        $this->transactionUseDistributor = $options?->transactionUseDistributor ?? false;
        $this->acquireActionUseJobQueue = $options?->acquireActionUseJobQueue ?? false;
        $this->distributorNamespaceId = $options?->distributorNamespaceId ?? null;
        $this->queueNamespaceId = $options?->queueNamespaceId ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        $properties["EnableAutoRun"] = true;
        if ($this->enableAtomicCommit != null) {
            $properties["EnableAtomicCommit"] = $this->enableAtomicCommit;
        }
        if ($this->transactionUseDistributor != null) {
            $properties["TransactionUseDistributor"] = $this->transactionUseDistributor;
        }
        if ($this->acquireActionUseJobQueue != null) {
            $properties["AcquireActionUseJobQueue"] = $this->acquireActionUseJobQueue;
        }
        if ($this->distributorNamespaceId != null) {
            $properties["DistributorNamespaceId"] = $this->distributorNamespaceId;
        }
        if ($this->queueNamespaceId != null) {
            $properties["QueueNamespaceId"] = $this->queueNamespaceId;
        }

        return $properties;
    }
}