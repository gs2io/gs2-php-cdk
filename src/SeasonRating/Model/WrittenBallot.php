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
use Gs2Cdk\SeasonRating\Model\Ballot;
use Gs2Cdk\SeasonRating\Model\GameResult;
use Gs2Cdk\SeasonRating\Model\Options\WrittenBallotOptions;

class WrittenBallot {
    private Ballot $ballot;
    private ?array $gameResults = null;

    public function __construct(
        Ballot $ballot,
        ?WrittenBallotOptions $options = null,
    ) {
        $this->ballot = $ballot;
        $this->gameResults = $options?->gameResults ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->ballot != null) {
            $properties["ballot"] = $this->ballot?->properties(
            );
        }
        if ($this->gameResults != null) {
            $properties["gameResults"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->gameResults
            );
        }

        return $properties;
    }
}
