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
use Gs2Cdk\Inventory\Ref\ItemModelRef;
use Gs2Cdk\Inventory\StampSheet\AddCapacityByUserId;
use Gs2Cdk\Inventory\StampSheet\SetCapacityByUserId;
use Gs2Cdk\Inventory\StampSheet\AcquireItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\AcquireItemSetWithGradeByUserId;
use Gs2Cdk\Inventory\StampSheet\AddReferenceOfByUserId;
use Gs2Cdk\Inventory\StampSheet\DeleteReferenceOfByUserId;
use Gs2Cdk\Inventory\StampSheet\ConsumeItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyInventoryCurrentMaxCapacityByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyReferenceOfByUserId;

class InventoryModelRef {
    private string $namespaceName;
    private string $inventoryName;

    public function __construct(
        string $namespaceName,
        string $inventoryName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
    }

    public function itemModel(
        string $itemName,
    ): ItemModelRef {
        return (new ItemModelRef(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
        ));
    }

    public function addCapacity(
        int $addCapacityValue,
        ?string $userId = "#{userId}",
    ): AddCapacityByUserId {
        return (new AddCapacityByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $addCapacityValue,
            $userId,
        ));
    }

    public function setCapacity(
        int $newCapacityValue,
        ?string $userId = "#{userId}",
    ): SetCapacityByUserId {
        return (new SetCapacityByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $newCapacityValue,
            $userId,
        ));
    }

    public function acquireItemSet(
        string $itemName,
        int $acquireCount,
        int $expiresAt,
        bool $createNewItemSet,
        ?string $itemSetName = null,
        ?string $userId = "#{userId}",
    ): AcquireItemSetByUserId {
        return (new AcquireItemSetByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
            $acquireCount,
            $expiresAt,
            $createNewItemSet,
            $itemSetName,
            $userId,
        ));
    }

    public function acquireItemSetWithGrade(
        string $itemName,
        string $gradeModelId,
        int $gradeValue,
        ?string $userId = "#{userId}",
    ): AcquireItemSetWithGradeByUserId {
        return (new AcquireItemSetWithGradeByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
            $gradeModelId,
            $gradeValue,
            $userId,
        ));
    }

    public function addReferenceOf(
        string $itemName,
        string $itemSetName,
        string $referenceOf,
        ?string $userId = "#{userId}",
    ): AddReferenceOfByUserId {
        return (new AddReferenceOfByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
            $itemSetName,
            $referenceOf,
            $userId,
        ));
    }

    public function deleteReferenceOf(
        string $itemName,
        string $itemSetName,
        string $referenceOf,
        ?string $userId = "#{userId}",
    ): DeleteReferenceOfByUserId {
        return (new DeleteReferenceOfByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
            $itemSetName,
            $referenceOf,
            $userId,
        ));
    }

    public function consumeItemSet(
        string $itemName,
        int $consumeCount,
        ?string $itemSetName = null,
        ?string $userId = "#{userId}",
    ): ConsumeItemSetByUserId {
        return (new ConsumeItemSetByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
            $consumeCount,
            $itemSetName,
            $userId,
        ));
    }

    public function verifyInventoryCurrentMaxCapacity(
        string $verifyType,
        int $currentInventoryMaxCapacity,
        bool $multiplyValueSpecifyingQuantity,
        ?string $userId = "#{userId}",
    ): VerifyInventoryCurrentMaxCapacityByUserId {
        return (new VerifyInventoryCurrentMaxCapacityByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $verifyType,
            $currentInventoryMaxCapacity,
            $multiplyValueSpecifyingQuantity,
            $userId,
        ));
    }

    public function verifyItemSet(
        string $itemName,
        string $verifyType,
        int $count,
        bool $multiplyValueSpecifyingQuantity,
        ?string $itemSetName = null,
        ?string $userId = "#{userId}",
    ): VerifyItemSetByUserId {
        return (new VerifyItemSetByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $itemName,
            $verifyType,
            $count,
            $multiplyValueSpecifyingQuantity,
            $itemSetName,
            $userId,
        ));
    }

    public function verifyReferenceOf(
        string $itemName,
        string $itemSetName,
        string $referenceOf,
        string $verifyType,
        ?string $userId = "#{userId}",
    ): VerifyReferenceOfByUserId {
        return (new VerifyReferenceOfByUserId(
            $this->namespaceName,
            $this->inventoryName,
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
                "model",
                $this->inventoryName,
            ],
        ))->str(
        );
    }
}
