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
use Gs2Cdk\SeasonRating\Model\Options\TierModelOptions;

class TierModel {
    private int $raiseRankBonus;
    private int $entryFee;
    private int $minimumChangePoint;
    private int $maximumChangePoint;
    private ?string $metadata = null;

    public function __construct(
        int $raiseRankBonus,
        int $entryFee,
        int $minimumChangePoint,
        int $maximumChangePoint,
        ?TierModelOptions $options = null,
    ) {
        $this->raiseRankBonus = $raiseRankBonus;
        $this->entryFee = $entryFee;
        $this->minimumChangePoint = $minimumChangePoint;
        $this->maximumChangePoint = $maximumChangePoint;
        $this->metadata = $options?->metadata ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->raiseRankBonus != null) {
            $properties["raiseRankBonus"] = $this->raiseRankBonus;
        }
        if ($this->entryFee != null) {
            $properties["entryFee"] = $this->entryFee;
        }
        if ($this->minimumChangePoint != null) {
            $properties["minimumChangePoint"] = $this->minimumChangePoint;
        }
        if ($this->maximumChangePoint != null) {
            $properties["maximumChangePoint"] = $this->maximumChangePoint;
        }

        return $properties;
    }
}
