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
use Gs2Cdk\Inventory\StampSheet\AcquireItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\AddReferenceOfByUserId;
use Gs2Cdk\Inventory\StampSheet\DeleteReferenceOfByUserId;
use Gs2Cdk\Inventory\StampSheet\ConsumeItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyItemSetByUserId;
use Gs2Cdk\Inventory\StampSheet\VerifyReferenceOfByUserId;

class ItemModelRef {
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

    public function acquireItemSet(
        int $acquireCount,
        int $expiresAt,
        bool $createNewItemSet,
        ?string $itemSetName = null,
        ?string $userId = "#{userId}",
    ): AcquireItemSetByUserId {
        return (new AcquireItemSetByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $this->itemName,
            $acquireCount,
            $expiresAt,
            $createNewItemSet,
            $itemSetName,
            $userId,
        ));
    }

    public function addReferenceOf(
        string $itemSetName,
        string $referenceOf,
        ?string $userId = "#{userId}",
    ): AddReferenceOfByUserId {
        return (new AddReferenceOfByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $this->itemName,
            $itemSetName,
            $referenceOf,
            $userId,
        ));
    }

    public function deleteReferenceOf(
        string $itemSetName,
        string $referenceOf,
        ?string $userId = "#{userId}",
    ): DeleteReferenceOfByUserId {
        return (new DeleteReferenceOfByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $this->itemName,
            $itemSetName,
            $referenceOf,
            $userId,
        ));
    }

    public function consumeItemSet(
        int $consumeCount,
        ?string $itemSetName = null,
        ?string $userId = "#{userId}",
    ): ConsumeItemSetByUserId {
        return (new ConsumeItemSetByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $this->itemName,
            $consumeCount,
            $itemSetName,
            $userId,
        ));
    }

    public function verifyItemSet(
        string $verifyType,
        int $count,
        ?string $itemSetName = null,
        ?string $userId = "#{userId}",
    ): VerifyItemSetByUserId {
        return (new VerifyItemSetByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $this->itemName,
            $verifyType,
            $count,
            $itemSetName,
            $userId,
        ));
    }

    public function verifyReferenceOf(
        string $itemSetName,
        string $referenceOf,
        string $verifyType,
        ?string $userId = "#{userId}",
    ): VerifyReferenceOfByUserId {
        return (new VerifyReferenceOfByUserId(
            $this->namespaceName,
            $this->inventoryName,
            $this->itemName,
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
                "item",
                $this->itemName,
            ],
        ))->str(
        );
    }
}
