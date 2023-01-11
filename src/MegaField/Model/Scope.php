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
use Gs2Cdk\MegaField\Model\Options\ScopeOptions;

class Scope {
    private string $layerName;
    private float $r;
    private int $limit;

    public function __construct(
        string $layerName,
        float $r,
        int $limit,
        ?ScopeOptions $options = null,
    ) {
        $this->layerName = $layerName;
        $this->r = $r;
        $this->limit = $limit;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->layerName != null) {
            $properties["layerName"] = $this->layerName;
        }
        if ($this->r != null) {
            $properties["r"] = $this->r;
        }
        if ($this->limit != null) {
            $properties["limit"] = $this->limit;
        }

        return $properties;
    }
}
