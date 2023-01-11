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
use Gs2Cdk\Inventory\Model\Options\ItemModelOptions;

class ItemModel {
    private string $name;
    private int $stackingLimit;
    private bool $allowMultipleStacks;
    private int $sortValue;
    private ?string $metadata = null;

    public function __construct(
        string $name,
        int $stackingLimit,
        bool $allowMultipleStacks,
        int $sortValue,
        ?ItemModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->stackingLimit = $stackingLimit;
        $this->allowMultipleStacks = $allowMultipleStacks;
        $this->sortValue = $sortValue;
        $this->metadata = $options?->metadata ?? null;
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
        if ($this->stackingLimit != null) {
            $properties["stackingLimit"] = $this->stackingLimit;
        }
        if ($this->allowMultipleStacks != null) {
            $properties["allowMultipleStacks"] = $this->allowMultipleStacks;
        }
        if ($this->sortValue != null) {
            $properties["sortValue"] = $this->sortValue;
        }

        return $properties;
    }
}
