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
namespace Gs2Cdk\Log\Model;
use Gs2Cdk\Log\Model\Options\AggregationConfigOptions;
use Gs2Cdk\Log\Model\Enums\AggregationConfigType;

class AggregationConfig {
    private ?AggregationConfigType $type = null;
    private ?string $field = null;

    public function __construct(
        ?AggregationConfigOptions $options = null,
    ) {
        $this->type = $options?->type ?? null;
        $this->field = $options?->field ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->type != null) {
            $properties["type"] = $this->type?->toString(
            );
        }
        if ($this->field != null) {
            $properties["field"] = $this->field;
        }

        return $properties;
    }
}
