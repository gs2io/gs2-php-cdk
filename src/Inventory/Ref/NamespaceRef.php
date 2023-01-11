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
use Gs2Cdk\Inventory\Ref\InventoryModelRef;
use Gs2Cdk\Inventory\StampSheet\AddCapacityByUserId;
use Gs2Cdk\Inventory\StampSheet\SetCapacityByUserId;
use Gs2Cdk\Inventory\StampSheet\AcquireItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\AddReferenceOfByUserId;
use Gs2Cdk\Inventory\StampSheet\DeleteReferenceOfByUserId;
use Gs2Cdk\Inventory\StampSheet\ConsumeItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyReferenceOfByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function inventoryModel(
        string $inventoryName,
    ): InventoryModelRef {
        return (new InventoryModelRef(
            $this->namespaceName,
            $inventoryName,
        ));
    }

    public function addCapacity(
        string $inventoryName,
        int $addCapacityValue,
        ?string $userId = "#{userId}",
    ): AddCapacityByUserId {
        return (new AddCapacityByUserId(
            $this->namespaceName,
            $inventoryName,
            $addCapacityValue,
            $userId,
        ));
    }

    public function setCapacity(
        string $inventoryName,
        int $newCapacityValue,
        ?string $userId = "#{userId}",
    ): SetCapacityByUserId {
        return (new SetCapacityByUserId(
            $this->namespaceName,
            $inventoryName,
            $newCapacityValue,
            $userId,
        ));
    }

    public function acquireItemSet(
        string $inventoryName,
        string $itemName,
        int $acquireCount,
        int $expiresAt,
        bool $createNewItemSet,
        ?string $itemSetName = null,
        ?string $userId = "#{userId}",
    ): AcquireItemSetByUserId {
        return (new AcquireItemSetByUserId(
            $this->namespaceName,
            $inventoryName,
            $itemName,
            $acquireCount,
            $expiresAt,
            $createNewItemSet,
            $itemSetName,
            $userId,
        ));
    }

    public function addReferenceOf(
        string $inventoryName,
        string $itemName,
        string $itemSetName,
        string $referenceOf,
        ?string $userId = "#{userId}",
    ): AddReferenceOfByUserId {
        return (new AddReferenceOfByUserId(
            $this->namespaceName,
            $inventoryName,
            $itemName,
            $itemSetName,
            $referenceOf,
            $userId,
        ));
    }

    public function deleteReferenceOf(
        string $inventoryName,
        string $itemName,
        string $itemSetName,
        string $referenceOf,
        ?string $userId = "#{userId}",
    ): DeleteReferenceOfByUserId {
        return (new DeleteReferenceOfByUserId(
            $this->namespaceName,
            $inventoryName,
            $itemName,
            $itemSetName,
            $referenceOf,
            $userId,
        ));
    }

    public function consumeItemSet(
        string $inventoryName,
        string $itemName,
        int $consumeCount,
        ?string $itemSetName = null,
        ?string $userId = "#{userId}",
    ): ConsumeItemSetByUserId {
        return (new ConsumeItemSetByUserId(
            $this->namespaceName,
            $inventoryName,
            $itemName,
            $consumeCount,
            $itemSetName,
            $userId,
        ));
    }

    public function verifyReferenceOf(
        string $inventoryName,
        string $itemName,
        string $itemSetName,
        string $referenceOf,
        string $verifyType,
        ?string $userId = "#{userId}",
    ): VerifyReferenceOfByUserId {
        return (new VerifyReferenceOfByUserId(
            $this->namespaceName,
            $inventoryName,
            $itemName,
            $itemSetName,
            $referenceOf,
            $verifyType,
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
            ],
        ))->str(
        );
    }
}
