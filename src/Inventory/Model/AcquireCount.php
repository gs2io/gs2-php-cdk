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
namespace Gs2Cdk\Inventory\Model;
use Gs2Cdk\Inventory\Model\Options\AcquireCountOptions;

class AcquireCount {
    private string $itemName;
    private int $count;

    public function __construct(
        string $itemName,
        int $count,
        ?AcquireCountOptions $options = null,
    ) {
        $this->itemName = $itemName;
        $this->count = $count;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->itemName != null) {
            $properties["itemName"] = $this->itemName;
        }
        if ($this->count != null) {
            $properties["count"] = $this->count;
        }

        return $properties;
    }
}
