<?php /** @noinspection ALL */
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2Cdk\Experience\Resource;


class ExperienceModel {
	public string $name;
	public ?string $metadata;
	public int $defaultExperience;
	public int $defaultRankCap;
	public int $maxRankCap;
	public Threshold $rankThreshold;

    public function __construct(
            string $name,
            int $defaultExperience,
            int $defaultRankCap,
            int $maxRankCap,
            Threshold $rankThreshold,
            string $metadata = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->defaultExperience = $defaultExperience;
        $this->defaultRankCap = $defaultRankCap;
        $this->maxRankCap = $maxRankCap;
        $this->rankThreshold = $rankThreshold;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->defaultExperience != null) {
            $properties["DefaultExperience"] = $this->defaultExperience;
        }
        if ($this->defaultRankCap != null) {
            $properties["DefaultRankCap"] = $this->defaultRankCap;
        }
        if ($this->maxRankCap != null) {
            $properties["MaxRankCap"] = $this->maxRankCap;
        }
        if ($this->rankThreshold != null) {
            $properties["RankThreshold"] = $this->rankThreshold->properties();
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): ExperienceModelRef {
        return new ExperienceModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
