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
namespace Gs2Cdk\Money\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Money\StampSheet\DepositByUserId;
use Gs2Cdk\Money\StampSheet\WithdrawByUserId;
use Gs2Cdk\Money\StampSheet\RecordReceipt;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function deposit(
        int $slot,
        float $price,
        int $count,
        ?string $userId = "#{userId}",
    ): DepositByUserId {
        return (new DepositByUserId(
            $this->namespaceName,
            $slot,
            $price,
            $count,
            $userId,
        ));
    }

    public function withdraw(
        int $slot,
        int $count,
        bool $paidOnly,
        ?string $userId = "#{userId}",
    ): WithdrawByUserId {
        return (new WithdrawByUserId(
            $this->namespaceName,
            $slot,
            $count,
            $paidOnly,
            $userId,
        ));
    }

    public function recordReceipt(
        string $contentsId,
        string $receipt,
        ?string $userId = "#{userId}",
    ): RecordReceipt {
        return (new RecordReceipt(
            $this->namespaceName,
            $contentsId,
            $receipt,
            $userId,
        ));
    }

    public function grn(
    ): string {
        return (new Join(
            ":",
            [
                "grn",
                "gs2",
                GetAttr::region(
                )->str(
                ),
                GetAttr::ownerId(
                )->str(
                ),
                "money",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
