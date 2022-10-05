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

namespace Gs2Cdk\Enhance\Resource;


class RateModel {
	public string $name;
	public ?string $description;
	public ?string $metadata;
	public string $targetInventoryModelId;
	public string $acquireExperienceSuffix;
	public string $materialInventoryModelId;
	public ?array $acquireExperienceHierarchy;
	public string $experienceModelId;
	public ?array $bonusRates;

    public function __construct(
            string $name,
            string $targetInventoryModelId,
            string $acquireExperienceSuffix,
            string $materialInventoryModelId,
            string $experienceModelId,
            string $description = null,
            string $metadata = null,
            array $acquireExperienceHierarchy = null,
            array $bonusRates = null,
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->metadata = $metadata;
        $this->targetInventoryModelId = $targetInventoryModelId;
        $this->acquireExperienceSuffix = $acquireExperienceSuffix;
        $this->materialInventoryModelId = $materialInventoryModelId;
        $this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
        $this->experienceModelId = $experienceModelId;
        $this->bonusRates = $bonusRates;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->targetInventoryModelId != null) {
            $properties["TargetInventoryModelId"] = $this->targetInventoryModelId;
        }
        if ($this->acquireExperienceSuffix != null) {
            $properties["AcquireExperienceSuffix"] = $this->acquireExperienceSuffix;
        }
        if ($this->materialInventoryModelId != null) {
            $properties["MaterialInventoryModelId"] = $this->materialInventoryModelId;
        }
        if ($this->acquireExperienceHierarchy != null) {
            $properties["AcquireExperienceHierarchy"] = $this->acquireExperienceHierarchy;
        }
        if ($this->experienceModelId != null) {
            $properties["ExperienceModelId"] = $this->experienceModelId;
        }
        if ($this->bonusRates != null) {
            $properties["BonusRates"] = array_map(fn($v) => $v->properties(), $this->bonusRates);
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): RateModelRef {
        return new RateModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
