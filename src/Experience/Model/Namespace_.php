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

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Experience\Ref\NamespaceRef;
use Gs2Cdk\Experience\Model\CurrentMasterData;
use Gs2Cdk\Experience\Model\ExperienceModel;

use Gs2Cdk\Experience\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private ?string $description = null;
    private ?string $experienceCapScriptId = null;
    private ?ScriptSetting $changeExperienceScript = null;
    private ?ScriptSetting $changeRankScript = null;
    private ?ScriptSetting $changeRankCapScript = null;
    private ?ScriptSetting $overflowExperienceScript = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Experience_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $options?->description ?? null;
        $this->experienceCapScriptId = $options?->experienceCapScriptId ?? null;
        $this->changeExperienceScript = $options?->changeExperienceScript ?? null;
        $this->changeRankScript = $options?->changeRankScript ?? null;
        $this->changeRankCapScript = $options?->changeRankCapScript ?? null;
        $this->overflowExperienceScript = $options?->overflowExperienceScript ?? null;
        $this->logSetting = $options?->logSetting ?? null;
        $stack->addResource(
            $this,
        );
    }


    public function alternateKeys(
    ) {
        return "name";
    }

    public function resourceType(
    ): string {
        return "GS2::Experience::Namespace";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->experienceCapScriptId != null) {
            $properties["ExperienceCapScriptId"] = $this->experienceCapScriptId;
        }
        if ($this->changeExperienceScript != null) {
            $properties["ChangeExperienceScript"] = $this->changeExperienceScript?->properties(
            );
        }
        if ($this->changeRankScript != null) {
            $properties["ChangeRankScript"] = $this->changeRankScript?->properties(
            );
        }
        if ($this->changeRankCapScript != null) {
            $properties["ChangeRankCapScript"] = $this->changeRankCapScript?->properties(
            );
        }
        if ($this->overflowExperienceScript != null) {
            $properties["OverflowExperienceScript"] = $this->overflowExperienceScript?->properties(
            );
        }
        if ($this->logSetting != null) {
            $properties["LogSetting"] = $this->logSetting?->properties(
            );
        }

        return $properties;
    }

    public function ref(
    ): NamespaceRef {
        return (new NamespaceRef(
            $this->name,
        ));
    }

    public function getAttrNamespaceId(
    ): GetAttr {
        return (new GetAttr(
            null,
            null,
            "Item.NamespaceId",
        ));
    }

    public function masterData(
        array $experienceModels,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $experienceModels,
        ))->addDependsOn(
            $this,
        );
        return $this;
    }
}
