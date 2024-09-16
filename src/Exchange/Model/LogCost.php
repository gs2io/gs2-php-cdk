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
namespace Gs2Cdk\Exchange\Model;
use Gs2Cdk\Exchange\Model\Options\LogCostOptions;

class LogCost {
    private float $base;
    private array $adds;
    private ?array $subs = null;

    public function __construct(
        float $base,
        array $adds,
        ?LogCostOptions $options = null,
    ) {
        $this->base = $base;
        $this->adds = $adds;
        $this->subs = $options?->subs ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->base != null) {
            $properties["base"] = $this->base;
        }
        if ($this->adds != null) {
            $properties["adds"] = $this->adds;
        }
        if ($this->subs != null) {
            $properties["subs"] = $this->subs;
        }

        return $properties;
    }
}
