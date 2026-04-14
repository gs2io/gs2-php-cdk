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
use Gs2Cdk\Log\Model\FacetValueCount;
use Gs2Cdk\Log\Model\NumericRange;
use Gs2Cdk\Log\Model\Options\FacetOptions;

class Facet {
    private string $field;
    private ?array $values = null;
    private ?NumericRange $range = null;
    private ?NumericRange $globalRange = null;

    public function __construct(
        string $field,
        ?FacetOptions $options = null,
    ) {
        $this->field = $field;
        $this->values = $options?->values ?? null;
        $this->range = $options?->range ?? null;
        $this->globalRange = $options?->globalRange ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->field != null) {
            $properties["field"] = $this->field;
        }
        if ($this->values != null) {
            $properties["values"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->values
            );
        }
        if ($this->range != null) {
            $properties["range"] = $this->range?->properties(
            );
        }
        if ($this->globalRange != null) {
            $properties["globalRange"] = $this->globalRange?->properties(
            );
        }

        return $properties;
    }
}
