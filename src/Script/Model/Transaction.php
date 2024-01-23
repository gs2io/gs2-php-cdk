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
namespace Gs2Cdk\Script\Model;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Script\Model\Options\TransactionOptions;

class Transaction {
    private ?string $transactionId = null;
    private ?array $consumeActions = null;
    private ?array $acquireActions = null;

    public function __construct(
        ?TransactionOptions $options = null,
    ) {
        $this->transactionId = $options?->transactionId ?? null;
        $this->consumeActions = $options?->consumeActions ?? null;
        $this->acquireActions = $options?->acquireActions ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->transactionId != null) {
            $properties["transactionId"] = $this->transactionId;
        }
        if ($this->consumeActions != null) {
            $properties["consumeActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->consumeActions
            );
        }
        if ($this->acquireActions != null) {
            $properties["acquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->acquireActions
            );
        }

        return $properties;
    }
}
