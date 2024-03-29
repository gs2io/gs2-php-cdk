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
namespace Gs2Cdk\Matchmaking\Model;
use Gs2Cdk\Matchmaking\Model\Options\RatingModelOptions;

class RatingModel {
    private string $name;
    private int $initialValue;
    private int $volatility;
    private ?string $metadata = null;

    public function __construct(
        string $name,
        int $initialValue,
        int $volatility,
        ?RatingModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->initialValue = $initialValue;
        $this->volatility = $volatility;
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
        if ($this->initialValue != null) {
            $properties["initialValue"] = $this->initialValue;
        }
        if ($this->volatility != null) {
            $properties["volatility"] = $this->volatility;
        }

        return $properties;
    }
}
