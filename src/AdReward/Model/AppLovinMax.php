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
namespace Gs2Cdk\AdReward\Model;
use Gs2Cdk\AdReward\Model\Options\AppLovinMaxOptions;

class AppLovinMax {
    private string $allowAdUnitId;
    private string $eventKey;

    public function __construct(
        string $allowAdUnitId,
        string $eventKey,
        ?AppLovinMaxOptions $options = null,
    ) {
        $this->allowAdUnitId = $allowAdUnitId;
        $this->eventKey = $eventKey;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->allowAdUnitId != null) {
            $properties["allowAdUnitId"] = $this->allowAdUnitId;
        }
        if ($this->eventKey != null) {
            $properties["eventKey"] = $this->eventKey;
        }

        return $properties;
    }
}
