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


use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

use Gs2Cdk\Enhance\Ref\RateModelMasterRef;

class RateModelMaster extends CdkResource {

    public Stack $stack;
    public string $namespaceName;
    public string $name;
    public string $targetInventoryModelId;
    public string $acquireExperienceSuffix;
    public string $materialInventoryModelId;
    public string $experienceModelId;

    public function __construct(
            Stack $stack,
            string $namespaceName,
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
        parent::__construct("Enhance_RateModelMaster_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->name = $name;
        $this->description = $description;
        $this->metadata = $metadata;
        $this->targetInventoryModelId = $targetInventoryModelId;
        $this->acquireExperienceSuffix = $acquireExperienceSuffix;
        $this->materialInventoryModelId = $materialInventoryModelId;
        $this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
        $this->experienceModelId = $experienceModelId;
        $this->bonusRates = $bonusRates;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Enhance::RateModelMaster";
    }

    public function properties(): array {
        $properties = [];
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
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
    ): RateModelMasterRef {
        return new RateModelMasterRef(
            namespaceName: namespaceName,
            rateName: $this->name,
        );
    }

    public function getAttrRateModelId(): GetAttr {
        return new GetAttr(
            key: "Item.RateModelId"
        );
    }
}
