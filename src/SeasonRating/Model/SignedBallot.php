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
namespace Gs2Cdk\SeasonRating\Model;
use Gs2Cdk\SeasonRating\Model\Options\SignedBallotOptions;

class SignedBallot {
    private string $body;
    private string $signature;

    public function __construct(
        string $body,
        string $signature,
        ?SignedBallotOptions $options = null,
    ) {
        $this->body = $body;
        $this->signature = $signature;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->body != null) {
            $properties["body"] = $this->body;
        }
        if ($this->signature != null) {
            $properties["signature"] = $this->signature;
        }

        return $properties;
    }
}
