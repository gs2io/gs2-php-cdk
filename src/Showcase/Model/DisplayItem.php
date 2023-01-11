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
namespace Gs2Cdk\Showcase\Model;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Showcase\Model\SalesItem;
use Gs2Cdk\Showcase\Model\SalesItemGroup;
use Gs2Cdk\Showcase\Model\Options\DisplayItemOptions;
use Gs2Cdk\Showcase\Model\Options\DisplayItemTypeIsSalesItemOptions;
use Gs2Cdk\Showcase\Model\Options\DisplayItemTypeIsSalesItemGroupOptions;
use Gs2Cdk\Showcase\Model\Enum\DisplayItemType;

class DisplayItem {
    private string $displayItemId;
    private DisplayItemType $type;
    private ?SalesItem $salesItem = null;
    private ?SalesItemGroup $salesItemGroup = null;
    private ?string $salesPeriodEventId = null;

    public function __construct(
        string $displayItemId,
        DisplayItemType $type,
        ?DisplayItemOptions $options = null,
    ) {
        $this->displayItemId = $displayItemId;
        $this->type = $type;
        $this->salesItem = $options?->salesItem ?? null;
        $this->salesItemGroup = $options?->salesItemGroup ?? null;
        $this->salesPeriodEventId = $options?->salesPeriodEventId ?? null;
    }

    public static function typeIsSalesItem(
        string $displayItemId,
        SalesItem $salesItem,
        ?DisplayItemTypeIsSalesItemOptions $options = null,
    ): DisplayItem {
        return (new DisplayItem(
            $displayItemId,
            DisplayItemType::SALES_ITEM,
            new DisplayItemOptions(
                salesItem: $salesItem,
                salesPeriodEventId: $options?->salesPeriodEventId,
            ),
        ));
    }

    public static function typeIsSalesItemGroup(
        string $displayItemId,
        SalesItemGroup $salesItemGroup,
        ?DisplayItemTypeIsSalesItemGroupOptions $options = null,
    ): DisplayItem {
        return (new DisplayItem(
            $displayItemId,
            DisplayItemType::SALES_ITEM_GROUP,
            new DisplayItemOptions(
                salesItemGroup: $salesItemGroup,
                salesPeriodEventId: $options?->salesPeriodEventId,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->displayItemId != null) {
            $properties["displayItemId"] = $this->displayItemId;
        }
        if ($this->type != null) {
            $properties["type"] = $this->type?->toString(
            );
        }
        if ($this->salesItem != null) {
            $properties["salesItem"] = $this->salesItem?->properties(
            );
        }
        if ($this->salesItemGroup != null) {
            $properties["salesItemGroup"] = $this->salesItemGroup?->properties(
            );
        }
        if ($this->salesPeriodEventId != null) {
            $properties["salesPeriodEventId"] = $this->salesPeriodEventId;
        }

        return $properties;
    }
}
