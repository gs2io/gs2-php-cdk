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
use Gs2Cdk\Inventory\Ref\SimpleItemModelRef;
use Gs2Cdk\Inventory\StampSheet\AcquireSimpleItemsByUserId;
use Gs2Cdk\Inventory\Model\AcquireCount;
use Gs2Cdk\Inventory\StampSheet\ConsumeSimpleItemsByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifySimpleItemByUserId;

class SimpleInventoryModelRef {
    private string $namespaceName;
    private string $inventoryName;

    public function __construct(
        string $namespaceName,
        string $inventoryName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
    }

    public function simpleItemModel(
        string $itemName,
    ): SimpleItemModelRef {
        return (new SimpleItemModelRef(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
        ));
    }

    public function acquireSimpleItems(
        array $acquireCounts,
        ?string $userId = "#{userId}",
    ): AcquireSimpleItemsByUserId {
        return (new AcquireSimpleItemsByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $acquireCounts,
            $userId,
        ));
    }

    public function consumeSimpleItems(
        array $consumeCounts,
        ?string $userId = "#{userId}",
    ): ConsumeSimpleItemsByUserId {
        return (new ConsumeSimpleItemsByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $consumeCounts,
            $userId,
        ));
    }

    public function verifySimpleItem(
        string $itemName,
        string $verifyType,
        int $count,
        ?string $userId = "#{userId}",
    ): VerifySimpleItemByUserId {
        return (new VerifySimpleItemByUserId(
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
                "simple",
                "model",
                $this->inventoryName,
            ],
        ))->str(
        );
    }
}
