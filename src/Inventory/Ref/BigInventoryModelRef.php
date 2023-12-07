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
use Gs2Cdk\Inventory\Ref\BigItemModelRef;
use Gs2Cdk\Inventory\StampSheet\AcquireBigItemByUserId;
use Gs2Cdk\Inventory\StampSheet\SetBigItemByUserId;
use Gs2Cdk\Inventory\StampSheet\ConsumeBigItemByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyBigItemByUserId;

class BigInventoryModelRef {
    private string $namespaceName;
    private string $inventoryName;

    public function __construct(
        string $namespaceName,
        string $inventoryName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
    }

    public function bigItemModel(
        string $itemName,
    ): BigItemModelRef {
        return (new BigItemModelRef(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
        ));
    }

    public function acquireBigItem(
        string $itemName,
        string $acquireCount,
        ?string $userId = "#{userId}",
    ): AcquireBigItemByUserId {
        return (new AcquireBigItemByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
            $acquireCount,
            $userId,
        ));
    }

    public function setBigItem(
        string $itemName,
        string $count,
        ?string $userId = "#{userId}",
    ): SetBigItemByUserId {
        return (new SetBigItemByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
            $count,
            $userId,
        ));
    }

    public function consumeBigItem(
        string $itemName,
        string $consumeCount,
        ?string $userId = "#{userId}",
    ): ConsumeBigItemByUserId {
        return (new ConsumeBigItemByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
            $consumeCount,
            $userId,
        ));
    }

    public function verifyBigItem(
        string $itemName,
        string $verifyType,
        string $count,
        ?string $userId = "#{userId}",
    ): VerifyBigItemByUserId {
        return (new VerifyBigItemByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
            $verifyType,
            $count,
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
            ],
        ))->str(
        );
    }
}
