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
namespace Gs2Cdk\Inventory\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Inventory\StampSheet\AcquireBigItemByUserId;
use Gs2Cdk\Inventory\StampSheet\SetBigItemByUserId;
use Gs2Cdk\Inventory\StampSheet\ConsumeBigItemByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyBigItemByUserId;

class BigItemModelRef {
    private string $namespaceName;
    private string $inventoryName;
    private string $itemName;

    public function __construct(
        string $namespaceName,
        string $inventoryName,
        string $itemName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
        $this->itemName = $itemName;
    }

    public function acquireBigItem(
        string $acquireCount,
        ?string $userId = "#{userId}",
    ): AcquireBigItemByUserId {
        return (new AcquireBigItemByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $this->itemName,
            $acquireCount,
            $userId,
        ));
    }

    public function setBigItem(
        string $count,
        ?string $userId = "#{userId}",
    ): SetBigItemByUserId {
        return (new SetBigItemByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $this->itemName,
            $count,
            $userId,
        ));
    }

    public function consumeBigItem(
        string $consumeCount,
        ?string $userId = "#{userId}",
    ): ConsumeBigItemByUserId {
        return (new ConsumeBigItemByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $this->itemName,
            $consumeCount,
            $userId,
        ));
    }

    public function verifyBigItem(
        string $verifyType,
        string $count,
        bool $multiplyValueSpecifyingQuantity,
        ?string $userId = "#{userId}",
    ): VerifyBigItemByUserId {
        return (new VerifyBigItemByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $this->itemName,
            $verifyType,
            $count,
            $multiplyValueSpecifyingQuantity,
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
                "inventory",
                $this->namespaceName,
                "big",
                "model",
                $this->inventoryName,
                "item",
                $this->itemName,
            ],
        ))->str(
        );
    }
}
