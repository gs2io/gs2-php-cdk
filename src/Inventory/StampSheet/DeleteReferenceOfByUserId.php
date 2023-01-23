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
namespace Gs2Cdk\Inventory\StampSheet;

use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class DeleteReferenceOfByUserId extends AcquireAction {

    public function __construct(
        string $namespaceName,
        string $inventoryName,
        string $itemName,
        string $referenceOf,
        ?string $itemSetName = null,
        ?string $userId = "#{userId}",
    ) {
        $properties = [];

        $properties["namespaceName"] = $namespaceName;
        $properties["inventoryName"] = $inventoryName;
        $properties["itemName"] = $itemName;
        $properties["referenceOf"] = $referenceOf;
        $properties["itemSetName"] = $itemSetName;
        $properties["userId"] = $userId;

        parent::__construct(
            "Gs2Inventory:DeleteReferenceOfByUserId",
            $properties,
        );
    }
}
