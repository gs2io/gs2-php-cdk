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
namespace Gs2Cdk\Distributor\Model;
use Gs2Cdk\Distributor\Model\Options\DistributeResourceOptions;

class DistributeResource {
    private string $action;
    private string $request;

    public function __construct(
        string $action,
        string $request,
        ?DistributeResourceOptions $options = null,
    ) {
        $this->action = $action;
        $this->request = $request;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->action != null) {
            $properties["action"] = $this->action?->toString(
            );
        }
        if ($this->request != null) {
            $properties["request"] = $this->request;
        }

        return $properties;
    }
}
