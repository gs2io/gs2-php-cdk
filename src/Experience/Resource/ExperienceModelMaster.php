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

use Gs2Cdk\Experience\Ref\ExperienceModelMasterRef;

class ExperienceModelMaster extends CdkResource {

    public Stack $stack;
    public string $namespaceName;
    public string $name;
    public int $defaultExperience;
    public int $defaultRankCap;
    public int $maxRankCap;
    public string $rankThresholdName;

    public function __construct(
            Stack $stack,
            string $namespaceName,
            string $name,
            int $defaultExperience,
            int $defaultRankCap,
            int $maxRankCap,
            string $rankThresholdName,
            string $description = null,
            string $metadata = null,
    ) {
        parent::__construct("Experience_ExperienceModelMaster_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->name = $name;
        $this->description = $description;
        $this->metadata = $metadata;
        $this->defaultExperience = $defaultExperience;
        $this->defaultRankCap = $defaultRankCap;
        $this->maxRankCap = $maxRankCap;
        $this->rankThresholdName = $rankThresholdName;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Experience::ExperienceModelMaster";
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
        if ($this->defaultExperience != null) {
            $properties["DefaultExperience"] = $this->defaultExperience;
        }
        if ($this->defaultRankCap != null) {
            $properties["DefaultRankCap"] = $this->defaultRankCap;
        }
        if ($this->maxRankCap != null) {
            $properties["MaxRankCap"] = $this->maxRankCap;
        }
        if ($this->rankThresholdName != null) {
            $properties["RankThresholdName"] = $this->rankThresholdName;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): ExperienceModelMasterRef {
        return new ExperienceModelMasterRef(
            namespaceName: namespaceName,
            experienceName: $this->name,
        );
    }

    public function getAttrExperienceModelId(): GetAttr {
        return new GetAttr(
            key: "Item.ExperienceModelId"
        );
    }
}