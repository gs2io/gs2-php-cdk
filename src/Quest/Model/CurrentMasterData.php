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
namespace Gs2Cdk\Quest\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Quest\Model\QuestGroupModel;

class CurrentMasterData extends CdkResource {
    private string $version= "2019-05-14";
    private string $namespaceName;
    private array $groups;

    public function __construct(
        Stack $stack,
        string $namespaceName,
        array $groups,
    ) {
        parent::__construct(
            "Quest_CurrentQuestMaster_" . $namespaceName
        );

        $this->namespaceName = $namespaceName;
        $this->groups = $groups;
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
        return "GS2::Quest::CurrentQuestMaster";
    }

    public function properties(
    ): array {
        $properties = [];
        $settings = [];

        $settings["version"] = $this->version;
        if ($this->groups != null) {
            $settings["groups"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->groups
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