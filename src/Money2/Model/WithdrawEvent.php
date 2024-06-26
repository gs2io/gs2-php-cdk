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
namespace Gs2Cdk\Money2\Model;
use Gs2Cdk\Money2\Model\DepositTransaction;
use Gs2Cdk\Money2\Model\WalletSummary;
use Gs2Cdk\Money2\Model\Options\WithdrawEventOptions;

class WithdrawEvent {
    private int $slot;
    private WalletSummary $status;
    private ?array $withdrawDetails = null;

    public function __construct(
        int $slot,
        WalletSummary $status,
        ?WithdrawEventOptions $options = null,
    ) {
        $this->slot = $slot;
        $this->status = $status;
        $this->withdrawDetails = $options?->withdrawDetails ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->slot != null) {
            $properties["slot"] = $this->slot;
        }
        if ($this->withdrawDetails != null) {
            $properties["withdrawDetails"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->withdrawDetails
            );
        }
        if ($this->status != null) {
            $properties["status"] = $this->status?->properties(
            );
        }

        return $properties;
    }
}
