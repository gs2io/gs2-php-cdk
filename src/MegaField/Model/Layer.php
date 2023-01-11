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
namespace Gs2Cdk\MegaField\Model;
use Gs2Cdk\MegaField\Model\Options\LayerOptions;

class Layer {
    private string $areaModelName;
    private string $layerModelName;
    private int $numberOfMinEntries;
    private int $numberOfMaxEntries;
    private int $height;
    private int $createdAt;
    private ?string $root = null;

    public function __construct(
        string $areaModelName,
        string $layerModelName,
        int $numberOfMinEntries,
        int $numberOfMaxEntries,
        int $height,
        int $createdAt,
        ?LayerOptions $options = null,
    ) {
        $this->areaModelName = $areaModelName;
        $this->layerModelName = $layerModelName;
        $this->numberOfMinEntries = $numberOfMinEntries;
        $this->numberOfMaxEntries = $numberOfMaxEntries;
        $this->height = $height;
        $this->createdAt = $createdAt;
        $this->root = $options?->root ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->areaModelName != null) {
            $properties["areaModelName"] = $this->areaModelName;
        }
        if ($this->layerModelName != null) {
            $properties["layerModelName"] = $this->layerModelName;
        }
        if ($this->root != null) {
            $properties["root"] = $this->root;
        }
        if ($this->numberOfMinEntries != null) {
            $properties["numberOfMinEntries"] = $this->numberOfMinEntries;
        }
        if ($this->numberOfMaxEntries != null) {
            $properties["numberOfMaxEntries"] = $this->numberOfMaxEntries;
        }
        if ($this->height != null) {
            $properties["height"] = $this->height;
        }
        if ($this->createdAt != null) {
            $properties["createdAt"] = $this->createdAt;
        }

        return $properties;
    }
}
