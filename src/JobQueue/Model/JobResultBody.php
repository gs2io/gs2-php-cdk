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
use Gs2Cdk\JobQueue\Model\Options\JobResultBodyOptions;

class JobResultBody {
    private int $tryNumber;
    private int $statusCode;
    private string $result;

    public function __construct(
        int $tryNumber,
        int $statusCode,
        string $result,
        ?JobResultBodyOptions $options = null,
    ) {
        $this->tryNumber = $tryNumber;
        $this->statusCode = $statusCode;
        $this->result = $result;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->tryNumber != null) {
            $properties["tryNumber"] = $this->tryNumber;
        }
        if ($this->statusCode != null) {
            $properties["statusCode"] = $this->statusCode;
        }
        if ($this->result != null) {
            $properties["result"] = $this->result;
        }

        return $properties;
    }
}
