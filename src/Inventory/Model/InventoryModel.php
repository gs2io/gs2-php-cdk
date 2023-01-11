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
use Gs2Cdk\Inventory\Model\ItemModel;
use Gs2Cdk\Inventory\Model\Options\InventoryModelOptions;

class InventoryModel {
    private string $name;
    private int $initialCapacity;
    private int $maxCapacity;
    private array $itemModels;
    private ?string $metadata = null;
    private ?bool $protectReferencedItem = null;

    public function __construct(
        string $name,
        int $initialCapacity,
        int $maxCapacity,
        array $itemModels,
        ?InventoryModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->initialCapacity = $initialCapacity;
        $this->maxCapacity = $maxCapacity;
        $this->itemModels = $itemModels;
        $this->metadata = $options?->metadata ?? null;
        $this->protectReferencedItem = $options?->protectReferencedItem ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->initialCapacity != null) {
            $properties["initialCapacity"] = $this->initialCapacity;
        }
        if ($this->maxCapacity != null) {
            $properties["maxCapacity"] = $this->maxCapacity;
        }
        if ($this->protectReferencedItem != null) {
            $properties["protectReferencedItem"] = $this->protectReferencedItem;
        }
        if ($this->itemModels != null) {
            $properties["itemModels"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->itemModels
            );
        }

        return $properties;
    }
}
