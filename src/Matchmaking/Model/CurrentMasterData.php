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
namespace Gs2Cdk\Matchmaking\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Matchmaking\Model\RatingModel;
use Gs2Cdk\Matchmaking\Model\SeasonModel;

class CurrentMasterData extends CdkResource {
    private string $version= "2020-06-24";
    private string $namespaceName;
    private array $ratingModels;
    private array $seasonModels;

    public function __construct(
        Stack $stack,
        string $namespaceName,
        array $ratingModels,
        array $seasonModels,
    ) {
        parent::__construct(
            "Matchmaking_CurrentModelMaster_" . $namespaceName
        );

        $this->namespaceName = $namespaceName;
        $this->ratingModels = $ratingModels;
        $this->seasonModels = $seasonModels;
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
        return "GS2::Matchmaking::CurrentModelMaster";
    }

    public function properties(
    ): array {
        $properties = [];
        $settings = [];

        $settings["version"] = $this->version;
        if ($this->ratingModels != null) {
            $settings["ratingModels"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->ratingModels
            );
        }
        if ($this->seasonModels != null) {
            $settings["seasonModels"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->seasonModels
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