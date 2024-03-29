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
namespace Gs2Cdk\SkillTree\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\SkillTree\Model\NodeModel;

class CurrentMasterData extends CdkResource {
    private string $version= "2023-09-06";
    private string $namespaceName;
    private array $nodeModels;

    public function __construct(
        Stack $stack,
        string $namespaceName,
        array $nodeModels,
    ) {
        parent::__construct(
            "SkillTree_CurrentTreeMaster_" . $namespaceName
        );

        $this->namespaceName = $namespaceName;
        $this->nodeModels = $nodeModels;
        $stack->addResource(
            $this,
        );
    }

    public function alternateKeys(
    ) {
        return $this->namespaceName;
    }

    public function resourceType(
    ): string {
        return "GS2::SkillTree::CurrentTreeMaster";
    }

    public function properties(
    ): array {
        $properties = [];
        $settings = [];

        $settings["version"] = $this->version;
        if ($this->nodeModels != null) {
            $settings["nodeModels"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->nodeModels
            );
        }

        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($settings != null) {
            $properties["Settings"] = $settings;
        }

        return $properties;
    }
}