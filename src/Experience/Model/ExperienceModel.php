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
namespace Gs2Cdk\Experience\Model;
use Gs2Cdk\Experience\Model\Threshold;
use Gs2Cdk\Experience\Model\Options\ExperienceModelOptions;

class ExperienceModel {
    private string $name;
    private int $defaultExperience;
    private int $defaultRankCap;
    private int $maxRankCap;
    private Threshold $rankThreshold;
    private ?string $metadata = null;

    public function __construct(
        string $name,
        int $defaultExperience,
        int $defaultRankCap,
        int $maxRankCap,
        Threshold $rankThreshold,
        ?ExperienceModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->defaultExperience = $defaultExperience;
        $this->defaultRankCap = $defaultRankCap;
        $this->maxRankCap = $maxRankCap;
        $this->rankThreshold = $rankThreshold;
        $this->metadata = $options?->metadata ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->defaultExperience != null) {
            $properties["defaultExperience"] = $this->defaultExperience;
        }
        if ($this->defaultRankCap != null) {
            $properties["defaultRankCap"] = $this->defaultRankCap;
        }
        if ($this->maxRankCap != null) {
            $properties["maxRankCap"] = $this->maxRankCap;
        }
        if ($this->rankThreshold != null) {
            $properties["rankThreshold"] = $this->rankThreshold?->properties(
            );
        }

        return $properties;
    }
}
