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
namespace Gs2Cdk\Enhance\Model;
use Gs2Cdk\Enhance\Model\BonusRate;
use Gs2Cdk\Enhance\Model\Options\RateModelOptions;

class RateModel {
    private string $name;
    private string $targetInventoryModelId;
    private string $acquireExperienceSuffix;
    private string $materialInventoryModelId;
    private string $experienceModelId;
    private ?string $description = null;
    private ?string $metadata = null;
    private ?array $acquireExperienceHierarchy = null;
    private ?array $bonusRates = null;

    public function __construct(
        string $name,
        string $targetInventoryModelId,
        string $acquireExperienceSuffix,
        string $materialInventoryModelId,
        string $experienceModelId,
        ?RateModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->targetInventoryModelId = $targetInventoryModelId;
        $this->acquireExperienceSuffix = $acquireExperienceSuffix;
        $this->materialInventoryModelId = $materialInventoryModelId;
        $this->experienceModelId = $experienceModelId;
        $this->description = $options?->description ?? null;
        $this->metadata = $options?->metadata ?? null;
        $this->acquireExperienceHierarchy = $options?->acquireExperienceHierarchy ?? null;
        $this->bonusRates = $options?->bonusRates ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["description"] = $this->description;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->targetInventoryModelId != null) {
            $properties["targetInventoryModelId"] = $this->targetInventoryModelId;
        }
        if ($this->acquireExperienceSuffix != null) {
            $properties["acquireExperienceSuffix"] = $this->acquireExperienceSuffix;
        }
        if ($this->materialInventoryModelId != null) {
            $properties["materialInventoryModelId"] = $this->materialInventoryModelId;
        }
        if ($this->acquireExperienceHierarchy != null) {
            $properties["acquireExperienceHierarchy"] = $this->acquireExperienceHierarchy;
        }
        if ($this->experienceModelId != null) {
            $properties["experienceModelId"] = $this->experienceModelId;
        }
        if ($this->bonusRates != null) {
            $properties["bonusRates"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->bonusRates
            );
        }

        return $properties;
    }
}
