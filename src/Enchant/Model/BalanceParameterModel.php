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
namespace Gs2Cdk\Enchant\Model;
use Gs2Cdk\Enchant\Model\BalanceParameterValueModel;
use Gs2Cdk\Enchant\Model\Options\BalanceParameterModelOptions;
use Gs2Cdk\Enchant\Model\Enums\BalanceParameterModelInitialValueStrategy;

class BalanceParameterModel {
    private string $name;
    private int $totalValue;
    private BalanceParameterModelInitialValueStrategy $initialValueStrategy;
    private array $parameters;
    private ?string $metadata = null;

    public function __construct(
        string $name,
        int $totalValue,
        BalanceParameterModelInitialValueStrategy $initialValueStrategy,
        array $parameters,
        ?BalanceParameterModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->totalValue = $totalValue;
        $this->initialValueStrategy = $initialValueStrategy;
        $this->parameters = $parameters;
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
        if ($this->totalValue != null) {
            $properties["totalValue"] = $this->totalValue;
        }
        if ($this->initialValueStrategy != null) {
            $properties["initialValueStrategy"] = $this->initialValueStrategy?->toString(
            );
        }
        if ($this->parameters != null) {
            $properties["parameters"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->parameters
            );
        }

        return $properties;
    }
}
