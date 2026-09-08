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
namespace Gs2Cdk\JobQueue\Model;
use Gs2Cdk\JobQueue\Model\Options\TransactionSettingV2Options;

class TransactionSettingV2 {
    private string $distributorNamespaceId;
    private bool $enableParallelExecution;

    public function __construct(
        string $distributorNamespaceId,
        bool $enableParallelExecution,
        ?TransactionSettingV2Options $options = null,
    ) {
        $this->distributorNamespaceId = $distributorNamespaceId;
        $this->enableParallelExecution = $enableParallelExecution;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->distributorNamespaceId != null) {
            $properties["distributorNamespaceId"] = $this->distributorNamespaceId;
        }
        if ($this->enableParallelExecution != null) {
            $properties["enableParallelExecution"] = $this->enableParallelExecution;
        }

        return $properties;
    }
}
