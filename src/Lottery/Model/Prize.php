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

namespace Gs2Cdk\Lottery\Model;

use Gs2Cdk\Lottery\Model\Enum\PrizeType;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class Prize {
	public string $prizeId;
	public PrizeType $type;
	public ?array $acquireActions;
	public ?int $drawnLimit;
	public ?string $limitFailOverPrizeId;
	public ?string $prizeTableName;
	public int $weight;

    public function __construct(
            string $prizeId,
            PrizeType $type,
            int $weight,
            array $acquireActions = null,
            int $drawnLimit = null,
            string $limitFailOverPrizeId = null,
            string $prizeTableName = null,
    ) {
        $this->prizeId = $prizeId;
        $this->type = $type;
        $this->acquireActions = $acquireActions;
        $this->drawnLimit = $drawnLimit;
        $this->limitFailOverPrizeId = $limitFailOverPrizeId;
        $this->prizeTableName = $prizeTableName;
        $this->weight = $weight;
    }

    public static function action(
        array $acquireActions,
        string $prizeId = null,
        int $drawnLimit = null,
        string $limitFailOverPrizeId = null,
        int $weight = null,
    ): Prize {
        return new Prize(
            type: PrizeType::ACTION,
            prizeId: $prizeId,
            acquireActions: $acquireActions,
            drawnLimit: $drawnLimit,
            limitFailOverPrizeId: $limitFailOverPrizeId,
            weight: $weight,
        );
    }

    public static function prizeTable(
        string $prizeTableName,
        string $prizeId = null,
        int $drawnLimit = null,
        int $weight = null,
    ): Prize {
        return new Prize(
            type: PrizeType::PRIZE_TABLE,
            prizeId: $prizeId,
            drawnLimit: $drawnLimit,
            prizeTableName: $prizeTableName,
            weight: $weight,
        );
    }

    public function properties(): array {
        $properties = [];
        if ($this->prizeId != null) {
            $properties["PrizeId"] = $this->prizeId;
        }
        if ($this->type != null) {
            $properties["Type"] = $this->type->toString();
        }
        if ($this->acquireActions != null) {
            $properties["AcquireActions"] = array_map(fn($v) => $v->properties(), $this->acquireActions);
        }
        if ($this->drawnLimit != null) {
            $properties["DrawnLimit"] = $this->drawnLimit;
        }
        if ($this->limitFailOverPrizeId != null) {
            $properties["LimitFailOverPrizeId"] = $this->limitFailOverPrizeId;
        }
        if ($this->prizeTableName != null) {
            $properties["PrizeTableName"] = $this->prizeTableName;
        }
        if ($this->weight != null) {
            $properties["Weight"] = $this->weight;
        }
        return $properties;
    }
}
