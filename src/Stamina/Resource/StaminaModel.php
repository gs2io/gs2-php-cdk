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


class StaminaModel {
	public string $name;
	public ?string $metadata;
	public int $recoverIntervalMinutes;
	public int $recoverValue;
	public int $initialCapacity;
	public bool $isOverflow;
	public ?int $maxCapacity;
	public ?MaxStaminaTable $maxStaminaTable;
	public ?RecoverIntervalTable $recoverIntervalTable;
	public ?RecoverValueTable $recoverValueTable;

    public function __construct(
            string $name,
            int $recoverIntervalMinutes,
            int $recoverValue,
            int $initialCapacity,
            bool $isOverflow,
            string $metadata = null,
            int $maxCapacity = null,
            MaxStaminaTable $maxStaminaTable = null,
            RecoverIntervalTable $recoverIntervalTable = null,
            RecoverValueTable $recoverValueTable = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->recoverIntervalMinutes = $recoverIntervalMinutes;
        $this->recoverValue = $recoverValue;
        $this->initialCapacity = $initialCapacity;
        $this->isOverflow = $isOverflow;
        $this->maxCapacity = $maxCapacity;
        $this->maxStaminaTable = $maxStaminaTable;
        $this->recoverIntervalTable = $recoverIntervalTable;
        $this->recoverValueTable = $recoverValueTable;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
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
        if ($this->maxStaminaTable != null) {
            $properties["MaxStaminaTable"] = $this->maxStaminaTable->properties();
        }
        if ($this->recoverIntervalTable != null) {
            $properties["RecoverIntervalTable"] = $this->recoverIntervalTable->properties();
        }
        if ($this->recoverValueTable != null) {
            $properties["RecoverValueTable"] = $this->recoverValueTable->properties();
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): StaminaModelRef {
        return new StaminaModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
