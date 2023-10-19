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
use Gs2Cdk\Inventory\Ref\SimpleInventoryModelRef;
use Gs2Cdk\Inventory\Ref\BigInventoryModelRef;
use Gs2Cdk\Inventory\StampSheet\AddCapacityByUserId;
use Gs2Cdk\Inventory\StampSheet\SetCapacityByUserId;
use Gs2Cdk\Inventory\StampSheet\AcquireItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\AddReferenceOfByUserId;
use Gs2Cdk\Inventory\StampSheet\DeleteReferenceOfByUserId;
use Gs2Cdk\Inventory\StampSheet\AcquireSimpleItemsByUserId;
use Gs2Cdk\Inventory\Model\AcquireCount;
use Gs2Cdk\Inventory\StampSheet\AcquireBigItemByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyInventoryCurrentMaxCapacityByUserId;
use Gs2Cdk\Inventory\StampSheet\ConsumeItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyReferenceOfByUserId;
use Gs2Cdk\Inventory\StampSheet\ConsumeSimpleItemsByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifySimpleItemByUserId;
use Gs2Cdk\Inventory\StampSheet\ConsumeBigItemByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyBigItemByUserId;

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

    public function simpleInventoryModel(
        string $inventoryName,
    ): SimpleInventoryModelRef {
        return (new SimpleInventoryModelRef(
            $this->namespaceName,
            $inventoryName,
        ));
    }

    public function bigInventoryModel(
        string $inventoryName,
    ): BigInventoryModelRef {
        return (new BigInventoryModelRef(
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

    public function acquireSimpleItems(
        string $inventoryName,
        array $acquireCounts,
        ?string $userId = "#{userId}",
    ): AcquireSimpleItemsByUserId {
        return (new AcquireSimpleItemsByUserId(
            $this->namespaceName,
            $inventoryName,
            $acquireCounts,
            $userId,
        ));
    }

    public function acquireBigItem(
        string $inventoryName,
        string $itemName,
        string $acquireCount,
        ?string $userId = "#{userId}",
    ): AcquireBigItemByUserId {
        return (new AcquireBigItemByUserId(
            $this->namespaceName,
            $inventoryName,
            $itemName,
            $acquireCount,
            $userId,
        ));
    }

    public function verifyInventoryCurrentMaxCapacity(
        string $inventoryName,
        string $verifyType,
        int $currentInventoryMaxCapacity,
        ?string $userId = "#{userId}",
    ): VerifyInventoryCurrentMaxCapacityByUserId {
        return (new VerifyInventoryCurrentMaxCapacityByUserId(
            $this->namespaceName,
            $inventoryName,
            $verifyType,
            $currentInventoryMaxCapacity,
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

    public function verifyItemSet(
        string $inventoryName,
        string $itemName,
        string $verifyType,
        int $count,
        ?string $itemSetName = null,
        ?string $userId = "#{userId}",
    ): VerifyItemSetByUserId {
        return (new VerifyItemSetByUserId(
            $this->namespaceName,
            $inventoryName,
            $itemName,
            $verifyType,
            $count,
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

    public function consumeSimpleItems(
        string $inventoryName,
        array $consumeCounts,
        ?string $userId = "#{userId}",
    ): ConsumeSimpleItemsByUserId {
        return (new ConsumeSimpleItemsByUserId(
            $this->namespaceName,
            $inventoryName,
            $consumeCounts,
            $userId,
        ));
    }

    public function verifySimpleItem(
        string $inventoryName,
        string $itemName,
        string $verifyType,
        int $count,
        ?string $userId = "#{userId}",
    ): VerifySimpleItemByUserId {
        return (new VerifySimpleItemByUserId(
            $this->namespaceName,
            $inventoryName,
            $itemName,
            $verifyType,
            $count,
            $userId,
        ));
    }

    public function consumeBigItem(
        string $inventoryName,
        string $itemName,
        string $consumeCount,
        ?string $userId = "#{userId}",
    ): ConsumeBigItemByUserId {
        return (new ConsumeBigItemByUserId(
            $this->namespaceName,
            $inventoryName,
            $itemName,
            $consumeCount,
            $userId,
        ));
    }

    public function verifyBigItem(
        string $inventoryName,
        string $itemName,
        string $verifyType,
        string $count,
        ?string $userId = "#{userId}",
    ): VerifyBigItemByUserId {
        return (new VerifyBigItemByUserId(
            $this->namespaceName,
            $inventoryName,
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
            ],
        ))->str(
        );
    }
}
