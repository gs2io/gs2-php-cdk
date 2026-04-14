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
use Gs2Cdk\Log\Model\TimeseriesValue;
use Gs2Cdk\Log\Model\Options\TimeseriesPointOptions;

class TimeseriesPoint {
    private int $timestamp;
    private ?array $values = null;

    public function __construct(
        int $timestamp,
        ?TimeseriesPointOptions $options = null,
    ) {
        $this->timestamp = $timestamp;
        $this->values = $options?->values ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->timestamp != null) {
            $properties["timestamp"] = $this->timestamp;
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

        return $properties;
    }
}
