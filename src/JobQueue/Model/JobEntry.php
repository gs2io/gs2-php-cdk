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
namespace Gs2Cdk\JobQueue\Model;
use Gs2Cdk\JobQueue\Model\Options\JobEntryOptions;

class JobEntry {
    private string $scriptId;
    private string $args;
    private int $maxTryCount;

    public function __construct(
        string $scriptId,
        string $args,
        int $maxTryCount,
        ?JobEntryOptions $options = null,
    ) {
        $this->scriptId = $scriptId;
        $this->args = $args;
        $this->maxTryCount = $maxTryCount;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->scriptId != null) {
            $properties["scriptId"] = $this->scriptId;
        }
        if ($this->args != null) {
            $properties["args"] = $this->args;
        }
        if ($this->maxTryCount != null) {
            $properties["maxTryCount"] = $this->maxTryCount;
        }

        return $properties;
    }
}
