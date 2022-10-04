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

namespace Gs2Cdk\Inventory\Resource;


class InventoryModel {
	public string $name;
	public ?string $metadata;
	public int $initialCapacity;
	public int $maxCapacity;
	public ?bool $protectReferencedItem;
	public ?array $itemModels;

    public function __construct(
            string $name,
            int $initialCapacity,
            int $maxCapacity,
            string $metadata = null,
            bool $protectReferencedItem = null,
            array $itemModels = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->initialCapacity = $initialCapacity;
        $this->maxCapacity = $maxCapacity;
        $this->protectReferencedItem = $protectReferencedItem;
        $this->itemModels = $itemModels;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->initialCapacity != null) {
            $properties["InitialCapacity"] = $this->initialCapacity;
        }
        if ($this->maxCapacity != null) {
            $properties["MaxCapacity"] = $this->maxCapacity;
        }
        if ($this->protectReferencedItem != null) {
            $properties["ProtectReferencedItem"] = $this->protectReferencedItem;
        }
        if ($this->itemModels != null) {
            $properties["ItemModels"] = array_map(fn($v) => $v->properties(), $this->itemModels);
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): InventoryModelRef {
        return new InventoryModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
