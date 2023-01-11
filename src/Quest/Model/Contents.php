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
namespace Gs2Cdk\Quest\Model;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Quest\Model\Options\ContentsOptions;

class Contents {
    private int $weight;
    private ?string $metadata = null;
    private ?array $completeAcquireActions = null;

    public function __construct(
        int $weight,
        ?ContentsOptions $options = null,
    ) {
        $this->weight = $weight;
        $this->metadata = $options?->metadata ?? null;
        $this->completeAcquireActions = $options?->completeAcquireActions ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->completeAcquireActions != null) {
            $properties["completeAcquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->completeAcquireActions
            );
        }
        if ($this->weight != null) {
            $properties["weight"] = $this->weight;
        }

        return $properties;
    }
}
