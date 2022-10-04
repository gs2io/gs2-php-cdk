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

namespace Gs2Cdk\Showcase\Resource;

use Gs2Cdk\Showcase\Resource\Enum\DisplayItemType;

class DisplayItem {
	public string $displayItemId;
	public DisplayItemType $type;
	public ?SalesItem $salesItem;
	public ?SalesItemGroup $salesItemGroup;
	public ?string $salesPeriodEventId;

    public function __construct(
            string $displayItemId,
            DisplayItemType $type,
            SalesItem $salesItem = null,
            SalesItemGroup $salesItemGroup = null,
            string $salesPeriodEventId = null,
    ) {
        $this->displayItemId = $displayItemId;
        $this->type = $type;
        $this->salesItem = $salesItem;
        $this->salesItemGroup = $salesItemGroup;
        $this->salesPeriodEventId = $salesPeriodEventId;
  }

    public function properties(): array {
        $properties = [];
        if ($this->displayItemId != null) {
            $properties["DisplayItemId"] = $this->displayItemId;
        }
        if ($this->type != null) {
            $properties["Type"] = $this->type->toString();
        }
        if ($this->salesItem != null) {
            $properties["SalesItem"] = $this->salesItem->properties();
        }
        if ($this->salesItemGroup != null) {
            $properties["SalesItemGroup"] = $this->salesItemGroup->properties();
        }
        if ($this->salesPeriodEventId != null) {
            $properties["SalesPeriodEventId"] = $this->salesPeriodEventId;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): DisplayItemRef {
        return new DisplayItemRef(
            $namespaceName,
        );
    }
}
