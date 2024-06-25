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
namespace Gs2Cdk\Money2\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Money2\Ref\StoreContentModelRef;
use Gs2Cdk\Money2\StampSheet\DepositByUserId;
use Gs2Cdk\Money2\Model\DepositTransaction;
use Gs2Cdk\Money2\StampSheet\WithdrawByUserId;
use Gs2Cdk\Money2\StampSheet\VerifyReceiptByUserId;
use Gs2Cdk\Money2\Model\Receipt;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function storeContentModel(
        string $contentName,
    ): StoreContentModelRef {
        return (new StoreContentModelRef(
            $this->namespaceName,
            $contentName,
        ));
    }

    public function deposit(
        int $slot,
        array $depositTransactions,
        ?string $userId = "#{userId}",
    ): DepositByUserId {
        return (new DepositByUserId(
            $this->namespaceName,
            $slot,
            $depositTransactions,
            $userId,
        ));
    }

    public function withdraw(
        int $slot,
        int $withdrawCount,
        bool $paidOnly,
        ?string $userId = "#{userId}",
    ): WithdrawByUserId {
        return (new WithdrawByUserId(
            $this->namespaceName,
            $slot,
            $withdrawCount,
            $paidOnly,
            $userId,
        ));
    }

    public function verifyReceipt(
        string $contentName,
        Receipt $receipt,
        ?string $userId = "#{userId}",
    ): VerifyReceiptByUserId {
        return (new VerifyReceiptByUserId(
            $this->namespaceName,
            $contentName,
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
                "money2",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
