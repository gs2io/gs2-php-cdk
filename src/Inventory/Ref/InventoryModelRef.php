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
use Gs2Cdk\Inventory\StampSheet\AddCapacityByUserId;
use Gs2Cdk\Inventory\StampSheet\SetCapacityByUserId;

class InventoryModelRef {
    public String $namespaceName;
    public String $inventoryName;

    public function __construct(
            String $namespaceName,
            String $inventoryName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
    }

    public function itemModel(
            String $itemName,
    ): ItemModelRef {
        return new ItemModelRef(
            namespaceName: $this->namespaceName,
            inventoryName: $this->inventoryName,
            itemName: $itemName,
        );
    }

    public function addCapacity(
            int $addCapacityValue,
            string $userId = '#{userId}',
    ): AddCapacityByUserId {
        return new AddCapacityByUserId(
            namespaceName: $this->namespaceName,
            inventoryName: $this->inventoryName,
            userId: $userId,
            addCapacityValue: $addCapacityValue,
        );
    }

    public function setCapacity(
            int $newCapacityValue,
            string $userId = '#{userId}',
    ): SetCapacityByUserId {
        return new SetCapacityByUserId(
            namespaceName: $this->namespaceName,
            inventoryName: $this->inventoryName,
            userId: $userId,
            newCapacityValue: $newCapacityValue,
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
                $this->inventoryName
            ]
        ))->str();
    }
}
