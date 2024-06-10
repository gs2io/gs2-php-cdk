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
namespace Gs2Cdk\Ranking2\Model;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Ranking2\Model\Options\RankingRewardOptions;

class RankingReward {
    private int $thresholdRank;
    private ?string $metadata = null;
    private ?array $acquireActions = null;

    public function __construct(
        int $thresholdRank,
        ?RankingRewardOptions $options = null,
    ) {
        $this->thresholdRank = $thresholdRank;
        $this->metadata = $options?->metadata ?? null;
        $this->acquireActions = $options?->acquireActions ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->thresholdRank != null) {
            $properties["thresholdRank"] = $this->thresholdRank;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->acquireActions != null) {
            $properties["acquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->acquireActions
            );
        }

        return $properties;
    }
}
