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
use Gs2Cdk\Matchmaking\Ref\RatingModelRef;
use Gs2Cdk\Matchmaking\Ref\SeasonModelRef;
use Gs2Cdk\Matchmaking\Ref\MasterDataObjectRef;
use Gs2Cdk\Matchmaking\StampSheet\VerifyIncludeParticipantByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function ratingModel(
        string $ratingName,
    ): RatingModelRef {
        return (new RatingModelRef(
            $this->namespaceName,
            $ratingName,
        ));
    }

    public function seasonModel(
        string $seasonName,
    ): SeasonModelRef {
        return (new SeasonModelRef(
            $this->namespaceName,
            $seasonName,
        ));
    }

    public function verifyIncludeParticipant(
        string $seasonName,
        int $season,
        int $tier,
        string $seasonGatheringName,
        string $verifyType,
        ?string $userId = "#{userId}",
    ): VerifyIncludeParticipantByUserId {
        return (new VerifyIncludeParticipantByUserId(
            $this->namespaceName,
            $seasonName,
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
            ],
        ))->str(
        );
    }
}
