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
namespace Gs2Cdk\Lottery\Model;
use Gs2Cdk\Lottery\Model\Options\PrizeLimitOptions;

class PrizeLimit {
    private string $prizeId;
    private int $drawnCount;

    public function __construct(
        string $prizeId,
        int $drawnCount,
        ?PrizeLimitOptions $options = null,
    ) {
        $this->prizeId = $prizeId;
        $this->drawnCount = $drawnCount;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->prizeId != null) {
            $properties["prizeId"] = $this->prizeId;
        }
        if ($this->drawnCount != null) {
            $properties["drawnCount"] = $this->drawnCount;
        }

        return $properties;
    }
}
