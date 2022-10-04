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


use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class BoxItems {
	public string $boxId;
	public string $prizeTableName;
	public string $userId;
	public ?array $items;

    public function __construct(
            string $boxId,
            string $prizeTableName,
            string $userId,
            array $items = null,
    ) {
        $this->boxId = $boxId;
        $this->prizeTableName = $prizeTableName;
        $this->userId = $userId;
        $this->items = $items;
    }

    public function properties(): array {
        $properties = [];
        if ($this->boxId != null) {
            $properties["BoxId"] = $this->boxId;
        }
        if ($this->prizeTableName != null) {
            $properties["PrizeTableName"] = $this->prizeTableName;
        }
        if ($this->userId != null) {
            $properties["UserId"] = $this->userId;
        }
        if ($this->items != null) {
            $properties["Items"] = array_map(fn($v) => $v->properties(), $this->items);
        }
        return $properties;
    }
}
