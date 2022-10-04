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

class NamespaceRef {
    public String $namespaceName;

    public function __construct(
            String $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function currentItemModelMaster(
    ): CurrentItemModelMasterRef {
        return new CurrentItemModelMasterRef(
            namespaceName: $this->namespaceName,
        );
    }

    public function inventoryModel(
            String $inventoryName,
    ): InventoryModelRef {
        return new InventoryModelRef(
            namespaceName: $this->namespaceName,
            inventoryName: $inventoryName,
        );
    }

    public function inventoryModelMaster(
            String $inventoryName,
    ): InventoryModelMasterRef {
        return new InventoryModelMasterRef(
            namespaceName: $this->namespaceName,
            inventoryName: $inventoryName,
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
                $this->namespaceName
            ]
        ))->str();
    }
}
