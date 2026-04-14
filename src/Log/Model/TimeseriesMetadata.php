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
use Gs2Cdk\Log\Model\Options\TimeseriesMetadataOptions;

class TimeseriesMetadata {
    private ?array $keys = null;
    private ?array $groupBy = null;

    public function __construct(
        ?TimeseriesMetadataOptions $options = null,
    ) {
        $this->keys = $options?->keys ?? null;
        $this->groupBy = $options?->groupBy ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->keys != null) {
            $properties["keys"] = $this->keys;
        }
        if ($this->groupBy != null) {
            $properties["groupBy"] = $this->groupBy;
        }

        return $properties;
    }
}
