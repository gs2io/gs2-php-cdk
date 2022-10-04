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

namespace Gs2Cdk\Inventory\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Inventory\StampSheet\AcquireItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\AddReferenceOfByUserId;
use Gs2Cdk\Inventory\StampSheet\ConsumeItemSetByUserId;

class ItemModelRef {
    public String $namespaceName;
    public String $inventoryName;
    public String $itemName;

    public function __construct(
            String $namespaceName,
            String $inventoryName,
            String $itemName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
        $this->itemName = $itemName;
    }

    public function acquireItemSet(
            int $acquireCount,
            int $expiresAt,
            bool $createNewItemSet,
            string $itemSetName = null,
            string $userId = '#{userId}',
    ): AcquireItemSetByUserId {
        return new AcquireItemSetByUserId(
            namespaceName: $this->namespaceName,
            inventoryName: $this->inventoryName,
            itemName: $this->itemName,
            userId: $userId,
            acquireCount: $acquireCount,
            expiresAt: $expiresAt,
            createNewItemSet: $createNewItemSet,
            itemSetName: $itemSetName,
        );
    }

    public function addReferenceOf(
            string $itemSetName,
            string $referenceOf,
            string $userId = '#{userId}',
    ): AddReferenceOfByUserId {
        return new AddReferenceOfByUserId(
            namespaceName: $this->namespaceName,
            inventoryName: $this->inventoryName,
            userId: $userId,
            itemName: $this->itemName,
            itemSetName: $itemSetName,
            referenceOf: $referenceOf,
        );
    }

    public function consumeItemSet(
            int $consumeCount,
            string $itemSetName = null,
            string $userId = '#{userId}',
    ): ConsumeItemSetByUserId {
        return new ConsumeItemSetByUserId(
            namespaceName: $this->namespaceName,
            inventoryName: $this->inventoryName,
            userId: $userId,
            itemName: $this->itemName,
            consumeCount: $consumeCount,
            itemSetName: $itemSetName,
        );
    }

    public function grn(): String {
        return (new Join(
            ":",
            [
                "grn",
                "gs2",
                GetAttr::region()->str(),
                GetAttr::ownerId()->str(),
                "inventory",
                $this->namespaceName,
                "model",
                $this->inventoryName,
                "item",
                $this->itemName
            ]
        ))->str();
    }
}
