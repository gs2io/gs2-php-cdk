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

namespace Gs2Cdk\Lottery\Resource;


use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

use Gs2Cdk\Lottery\Ref\PrizeTableMasterRef;

class PrizeTableMaster extends CdkResource {

    public Stack $stack;
    public string $namespaceName;
    public string $name;
    public array $prizes;

    public function __construct(
            Stack $stack,
            string $namespaceName,
            string $name,
            array $prizes,
            string $description = null,
            string $metadata = null,
    ) {
        parent::__construct("Lottery_PrizeTableMaster_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->name = $name;
        $this->description = $description;
        $this->metadata = $metadata;
        $this->prizes = $prizes;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Lottery::PrizeTableMaster";
    }

    public function properties(): array {
        $properties = [];
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->prizes != null) {
            $properties["Prizes"] = array_map(fn($v) => $v->properties(), $this->prizes);
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): PrizeTableMasterRef {
        return new PrizeTableMasterRef(
            namespaceName: namespaceName,
            prizeTableName: $this->name,
        );
    }

    public function getAttrPrizeTableId(): GetAttr {
        return new GetAttr(
            key: "Item.PrizeTableId"
        );
    }
}
