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
namespace Gs2Cdk\News\Model;
use Gs2Cdk\News\Model\Options\ProgressOptions;

class Progress {
    private string $uploadToken;
    private int $generated;
    private int $patternCount;
    private ?int $revision = null;

    public function __construct(
        string $uploadToken,
        int $generated,
        int $patternCount,
        ?ProgressOptions $options = null,
    ) {
        $this->uploadToken = $uploadToken;
        $this->generated = $generated;
        $this->patternCount = $patternCount;
        $this->revision = $options?->revision ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->uploadToken != null) {
            $properties["uploadToken"] = $this->uploadToken;
        }
        if ($this->generated != null) {
            $properties["generated"] = $this->generated;
        }
        if ($this->patternCount != null) {
            $properties["patternCount"] = $this->patternCount;
        }

        return $properties;
    }
}
