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
namespace Gs2Cdk\Ranking\Model;
use Gs2Cdk\Ranking\Model\FixedTiming;
use Gs2Cdk\Ranking\Model\Scope;
use Gs2Cdk\Ranking\Model\Options\GlobalRankingSettingOptions;

class GlobalRankingSetting {
    private bool $uniqueByUserId;
    private int $calculateIntervalMinutes;
    private ?FixedTiming $calculateFixedTiming = null;
    private ?array $additionalScopes = null;
    private ?array $ignoreUserIds = null;
    private ?string $generation = null;

    public function __construct(
        bool $uniqueByUserId,
        int $calculateIntervalMinutes,
        ?GlobalRankingSettingOptions $options = null,
    ) {
        $this->uniqueByUserId = $uniqueByUserId;
        $this->calculateIntervalMinutes = $calculateIntervalMinutes;
        $this->calculateFixedTiming = $options?->calculateFixedTiming ?? null;
        $this->additionalScopes = $options?->additionalScopes ?? null;
        $this->ignoreUserIds = $options?->ignoreUserIds ?? null;
        $this->generation = $options?->generation ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->uniqueByUserId != null) {
            $properties["uniqueByUserId"] = $this->uniqueByUserId;
        }
        if ($this->calculateIntervalMinutes != null) {
            $properties["calculateIntervalMinutes"] = $this->calculateIntervalMinutes;
        }
        if ($this->calculateFixedTiming != null) {
            $properties["calculateFixedTiming"] = $this->calculateFixedTiming?->properties(
            );
        }
        if ($this->additionalScopes != null) {
            $properties["additionalScopes"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->additionalScopes
            );
        }
        if ($this->ignoreUserIds != null) {
            $properties["ignoreUserIds"] = $this->ignoreUserIds;
        }
        if ($this->generation != null) {
            $properties["generation"] = $this->generation;
        }

        return $properties;
    }
}
