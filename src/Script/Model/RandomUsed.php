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
namespace Gs2Cdk\Script\Model;
use Gs2Cdk\Script\Model\Options\RandomUsedOptions;

class RandomUsed {
    private int $category;
    private int $used;

    public function __construct(
        int $category,
        int $used,
        ?RandomUsedOptions $options = null,
    ) {
        $this->category = $category;
        $this->used = $used;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->category != null) {
            $properties["category"] = $this->category;
        }
        if ($this->used != null) {
            $properties["used"] = $this->used;
        }

        return $properties;
    }
}
