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
namespace Gs2Cdk\Ranking2\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Ranking2\Ref\GlobalRankingModelRef;
use Gs2Cdk\Ranking2\Ref\SubscribeRankingModelRef;
use Gs2Cdk\Ranking2\Ref\ClusterRankingModelRef;
use Gs2Cdk\Ranking2\StampSheet\CreateGlobalRankingReceivedRewardByUserId;
use Gs2Cdk\Ranking2\StampSheet\CreateClusterRankingReceivedRewardByUserId;
use Gs2Cdk\Ranking2\StampSheet\VerifyGlobalRankingScoreByUserId;
use Gs2Cdk\Ranking2\StampSheet\VerifyClusterRankingScoreByUserId;
use Gs2Cdk\Ranking2\StampSheet\VerifySubscribeRankingScoreByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function globalRankingModel(
        string $rankingName,
    ): GlobalRankingModelRef {
        return (new GlobalRankingModelRef(
            $this->namespaceName,
            $rankingName,
        ));
    }

    public function subscribeRankingModel(
        string $rankingName,
    ): SubscribeRankingModelRef {
        return (new SubscribeRankingModelRef(
            $this->namespaceName,
            $rankingName,
        ));
    }

    public function clusterRankingModel(
        string $rankingName,
    ): ClusterRankingModelRef {
        return (new ClusterRankingModelRef(
            $this->namespaceName,
            $rankingName,
        ));
    }

    public function createGlobalRankingReceivedReward(
        string $rankingName,
        ?int $season = null,
        ?string $userId = "#{userId}",
    ): CreateGlobalRankingReceivedRewardByUserId {
        return (new CreateGlobalRankingReceivedRewardByUserId(
            $this->namespaceName,
            $rankingName,
            $season,
            $userId,
        ));
    }

    public function createClusterRankingReceivedReward(
        string $rankingName,
        string $clusterName,
        ?int $season = null,
        ?string $userId = "#{userId}",
    ): CreateClusterRankingReceivedRewardByUserId {
        return (new CreateClusterRankingReceivedRewardByUserId(
            $this->namespaceName,
            $rankingName,
            $clusterName,
            $season,
            $userId,
        ));
    }

    public function verifyGlobalRankingScore(
        string $rankingName,
        string $verifyType,
        int $score,
        bool $multiplyValueSpecifyingQuantity,
        ?int $season = null,
        ?string $userId = "#{userId}",
    ): VerifyGlobalRankingScoreByUserId {
        return (new VerifyGlobalRankingScoreByUserId(
            $this->namespaceName,
            $rankingName,
            $verifyType,
            $score,
            $multiplyValueSpecifyingQuantity,
            $season,
            $userId,
        ));
    }

    public function verifyClusterRankingScore(
        string $rankingName,
        string $clusterName,
        string $verifyType,
        int $score,
        bool $multiplyValueSpecifyingQuantity,
        ?int $season = null,
        ?string $userId = "#{userId}",
    ): VerifyClusterRankingScoreByUserId {
        return (new VerifyClusterRankingScoreByUserId(
            $this->namespaceName,
            $rankingName,
            $clusterName,
            $verifyType,
            $score,
            $multiplyValueSpecifyingQuantity,
            $season,
            $userId,
        ));
    }

    public function verifySubscribeRankingScore(
        string $rankingName,
        string $verifyType,
        int $score,
        bool $multiplyValueSpecifyingQuantity,
        ?int $season = null,
        ?string $userId = "#{userId}",
    ): VerifySubscribeRankingScoreByUserId {
        return (new VerifySubscribeRankingScoreByUserId(
            $this->namespaceName,
            $rankingName,
            $verifyType,
            $score,
            $multiplyValueSpecifyingQuantity,
            $season,
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
                "ranking2",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
