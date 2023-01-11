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
namespace Gs2Cdk\Enhance\Model;
use Gs2Cdk\Enhance\Model\Options\MaterialOptions;

class Material {
    private string $materialItemSetId;
    private int $count;

    public function __construct(
        string $materialItemSetId,
        int $count,
        ?MaterialOptions $options = null,
    ) {
        $this->materialItemSetId = $materialItemSetId;
        $this->count = $count;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->materialItemSetId != null) {
            $properties["materialItemSetId"] = $this->materialItemSetId;
        }
        if ($this->count != null) {
            $properties["count"] = $this->count;
        }

        return $properties;
    }
}
