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
namespace Gs2Cdk\StateMachine\Model;
use Gs2Cdk\StateMachine\Model\RandomUsed;
use Gs2Cdk\StateMachine\Model\Options\RandomStatusOptions;

class RandomStatus {
    private int $seed;
    private ?array $used = null;

    public function __construct(
        int $seed,
        ?RandomStatusOptions $options = null,
    ) {
        $this->seed = $seed;
        $this->used = $options?->used ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->seed != null) {
            $properties["seed"] = $this->seed;
        }
        if ($this->used != null) {
            $properties["used"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->used
            );
        }

        return $properties;
    }
}
