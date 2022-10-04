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

namespace Gs2Cdk\Showcase\Model;

use Gs2Cdk\Showcase\Model\Enum\DisplayItemMasterType;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class DisplayItemMaster {
	public string $displayItemId;
	public DisplayItemMasterType $type;
	public ?string $salesItemName;
	public ?string $salesItemGroupName;
	public ?string $salesPeriodEventId;

    public function __construct(
            string $displayItemId,
            DisplayItemMasterType $type,
            string $salesItemName = null,
            string $salesItemGroupName = null,
            string $salesPeriodEventId = null,
    ) {
        $this->displayItemId = $displayItemId;
        $this->type = $type;
        $this->salesItemName = $salesItemName;
        $this->salesItemGroupName = $salesItemGroupName;
        $this->salesPeriodEventId = $salesPeriodEventId;
    }

    public static function salesItem(
        string $salesItemName,
        string $displayItemId = null,
        string $salesPeriodEventId = null,
    ): DisplayItemMaster {
        return new DisplayItemMaster(
            type: DisplayItemMasterType::SALES_ITEM,
            displayItemId: $displayItemId,
            salesItemName: $salesItemName,
            salesPeriodEventId: $salesPeriodEventId,
        );
    }

    public static function salesItemGroup(
        string $salesItemGroupName,
        string $displayItemId = null,
        string $salesPeriodEventId = null,
    ): DisplayItemMaster {
        return new DisplayItemMaster(
            type: DisplayItemMasterType::SALES_ITEM_GROUP,
            displayItemId: $displayItemId,
            salesItemGroupName: $salesItemGroupName,
            salesPeriodEventId: $salesPeriodEventId,
        );
    }

    public function properties(): array {
        $properties = [];
        if ($this->displayItemId != null) {
            $properties["DisplayItemId"] = $this->displayItemId;
        }
        if ($this->type != null) {
            $properties["Type"] = $this->type->toString();
        }
        if ($this->salesItemName != null) {
            $properties["SalesItemName"] = $this->salesItemName;
        }
        if ($this->salesItemGroupName != null) {
            $properties["SalesItemGroupName"] = $this->salesItemGroupName;
        }
        if ($this->salesPeriodEventId != null) {
            $properties["SalesPeriodEventId"] = $this->salesPeriodEventId;
        }
        return $properties;
    }
}
