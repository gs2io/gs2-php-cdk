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

namespace Gs2Cdk\Inventory\StampSheet;

use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;


class AcquireItemSetByUserId extends AcquireAction {

    public function __construct(
            string $namespaceName,
            string $inventoryName,
            string $itemName,
            int $acquireCount,
            int $expiresAt,
            bool $createNewItemSet,
            string $itemSetName = null,
            string $userId = '#{userId}',
    ) {
        $properties = [];
        if ($namespaceName != null) {
            $properties["namespaceName"] = $namespaceName;
        }
        if ($inventoryName != null) {
            $properties["inventoryName"] = $inventoryName;
        }
        if ($itemName != null) {
            $properties["itemName"] = $itemName;
        }
        if ($userId != null) {
            $properties["userId"] = $userId;
        }
        if ($acquireCount != null) {
            $properties["acquireCount"] = $acquireCount;
        }
        if ($expiresAt != null) {
            $properties["expiresAt"] = $expiresAt;
        }
        if ($createNewItemSet != null) {
            $properties["createNewItemSet"] = $createNewItemSet;
        }
        if ($itemSetName != null) {
            $properties["itemSetName"] = $itemSetName;
        }
        parent::__construct(
            "Gs2Inventory:AcquireItemSetByUserId",
            $properties,
        );
    }
}
