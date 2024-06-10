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
namespace Gs2Cdk\Ranking2\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Ranking2\Model\GlobalRankingModel;
use Gs2Cdk\Ranking2\Model\ClusterRankingModel;
use Gs2Cdk\Ranking2\Model\SubscribeRankingModel;

class CurrentMasterData extends CdkResource {
    private string $version= "2024-05-30";
    private string $namespaceName;
    private array $globalRankingModels;
    private array $clusterRankingModels;
    private array $subscribeRankingModels;

    public function __construct(
        Stack $stack,
        string $namespaceName,
        array $globalRankingModels,
        array $clusterRankingModels,
        array $subscribeRankingModels,
    ) {
        parent::__construct(
            "Ranking2_CurrentRankingMaster_" . $namespaceName
        );

        $this->namespaceName = $namespaceName;
        $this->globalRankingModels = $globalRankingModels;
        $this->clusterRankingModels = $clusterRankingModels;
        $this->subscribeRankingModels = $subscribeRankingModels;
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
        return "GS2::Ranking2::CurrentRankingMaster";
    }

    public function properties(
    ): array {
        $properties = [];
        $settings = [];

        $settings["version"] = $this->version;
        if ($this->globalRankingModels != null) {
            $settings["globalRankingModels"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->globalRankingModels
            );
        }
        if ($this->clusterRankingModels != null) {
            $settings["clusterRankingModels"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->clusterRankingModels
            );
        }
        if ($this->subscribeRankingModels != null) {
            $settings["subscribeRankingModels"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->subscribeRankingModels
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