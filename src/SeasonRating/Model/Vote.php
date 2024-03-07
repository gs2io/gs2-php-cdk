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
use Gs2Cdk\SeasonRating\Model\WrittenBallot;
use Gs2Cdk\SeasonRating\Model\Options\VoteOptions;

class Vote {
    private string $seasonName;
    private string $sessionName;
    private ?array $writtenBallots = null;
    private ?int $revision = null;

    public function __construct(
        string $seasonName,
        string $sessionName,
        ?VoteOptions $options = null,
    ) {
        $this->seasonName = $seasonName;
        $this->sessionName = $sessionName;
        $this->writtenBallots = $options?->writtenBallots ?? null;
        $this->revision = $options?->revision ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->seasonName != null) {
            $properties["seasonName"] = $this->seasonName;
        }
        if ($this->sessionName != null) {
            $properties["sessionName"] = $this->sessionName;
        }
        if ($this->writtenBallots != null) {
            $properties["writtenBallots"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->writtenBallots
            );
        }

        return $properties;
    }
}
