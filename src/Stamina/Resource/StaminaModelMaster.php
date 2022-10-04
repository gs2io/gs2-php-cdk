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

namespace Gs2Cdk\Stamina\Resource;


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

use Gs2Cdk\Stamina\Ref\StaminaModelMasterRef;

class StaminaModelMaster extends CdkResource {

    public Stack $stack;
    public string $namespaceName;
    public string $name;
    public int $recoverIntervalMinutes;
    public int $recoverValue;
    public int $initialCapacity;
    public bool $isOverflow;
    public ?int $maxCapacity;

    public function __construct(
            Stack $stack,
            string $namespaceName,
            string $name,
            int $recoverIntervalMinutes,
            int $recoverValue,
            int $initialCapacity,
            bool $isOverflow,
            int $maxCapacity,
            string $description = null,
            string $metadata = null,
            string $maxStaminaTableName = null,
            string $recoverIntervalTableName = null,
            string $recoverValueTableName = null,
    ) {
        parent::__construct("Stamina_StaminaModelMaster_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->name = $name;
        $this->description = $description;
        $this->metadata = $metadata;
        $this->recoverIntervalMinutes = $recoverIntervalMinutes;
        $this->recoverValue = $recoverValue;
        $this->initialCapacity = $initialCapacity;
        $this->isOverflow = $isOverflow;
        $this->maxCapacity = $maxCapacity;
        $this->maxStaminaTableName = $maxStaminaTableName;
        $this->recoverIntervalTableName = $recoverIntervalTableName;
        $this->recoverValueTableName = $recoverValueTableName;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Stamina::StaminaModelMaster";
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
        if ($this->recoverIntervalMinutes != null) {
            $properties["RecoverIntervalMinutes"] = $this->recoverIntervalMinutes;
        }
        if ($this->recoverValue != null) {
            $properties["RecoverValue"] = $this->recoverValue;
        }
        if ($this->initialCapacity != null) {
            $properties["InitialCapacity"] = $this->initialCapacity;
        }
        if ($this->isOverflow != null) {
            $properties["IsOverflow"] = $this->isOverflow;
        }
        if ($this->maxCapacity != null) {
            $properties["MaxCapacity"] = $this->maxCapacity;
        }
        if ($this->maxStaminaTableName != null) {
            $properties["MaxStaminaTableName"] = $this->maxStaminaTableName;
        }
        if ($this->recoverIntervalTableName != null) {
            $properties["RecoverIntervalTableName"] = $this->recoverIntervalTableName;
        }
        if ($this->recoverValueTableName != null) {
            $properties["RecoverValueTableName"] = $this->recoverValueTableName;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): StaminaModelMasterRef {
        return new StaminaModelMasterRef(
            namespaceName: namespaceName,
            staminaName: $this->name,
        );
    }

    public function getAttrStaminaModelId(): GetAttr {
        return new GetAttr(
            key: "Item.StaminaModelId"
        );
    }
}
