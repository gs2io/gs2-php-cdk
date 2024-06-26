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
namespace Gs2Cdk\Matchmaking\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Matchmaking\StampSheet\VerifyIncludeParticipantByUserId;

class SeasonModelRef {
    private string $namespaceName;
    private string $seasonName;

    public function __construct(
        string $namespaceName,
        string $seasonName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->seasonName = $seasonName;
    }

    public function verifyIncludeParticipant(
        int $season,
        int $tier,
        string $seasonGatheringName,
        string $verifyType,
        ?string $userId = "#{userId}",
    ): VerifyIncludeParticipantByUserId {
        return (new VerifyIncludeParticipantByUserId(
            $this->namespaceName,
            $this->seasonName,
            $season,
            $tier,
            $seasonGatheringName,
            $verifyType,
            $userId,
        ));
    }

    public function grn(
    ): string {
        return (new Join(
            ":",
            [
                "grn",
                "gs2",
                GetAttr::region(
                )->str(
                ),
                GetAttr::ownerId(
                )->str(
                ),
                "matchmaking",
                $this->namespaceName,
                "model",
                $this->seasonName,
            ],
        ))->str(
        );
    }
}
