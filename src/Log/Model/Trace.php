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
use Gs2Cdk\Log\Model\Label;
use Gs2Cdk\Log\Model\LogEntry;
use Gs2Cdk\Log\Model\Options\TraceOptions;

class Trace {
    private bool $truncated;
    private ?array $spans = null;

    public function __construct(
        bool $truncated,
        ?TraceOptions $options = null,
    ) {
        $this->truncated = $truncated;
        $this->spans = $options?->spans ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->spans != null) {
            $properties["spans"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->spans
            );
        }
        if ($this->truncated != null) {
            $properties["truncated"] = $this->truncated;
        }

        return $properties;
    }
}
