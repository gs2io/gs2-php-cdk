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
namespace Gs2Cdk\Money2\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Money2\Model\StoreContentModel;
use Gs2Cdk\Money2\Model\StoreSubscriptionContentModel;

class CurrentMasterData extends CdkResource {
    private string $version= "2024-06-20";
    private string $namespaceName;
    private array $storeContentModels;
    private array $storeSubscriptionContentModels;

    public function __construct(
        Stack $stack,
        string $namespaceName,
        array $storeContentModels,
        array $storeSubscriptionContentModels,
    ) {
        parent::__construct(
            "Money2_CurrentModelMaster_" . $namespaceName
        );

        $this->namespaceName = $namespaceName;
        $this->storeContentModels = $storeContentModels;
        $this->storeSubscriptionContentModels = $storeSubscriptionContentModels;
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
        return "GS2::Money2::CurrentModelMaster";
    }

    public function properties(
    ): array {
        $properties = [];
        $settings = [];

        $settings["version"] = $this->version;
        if ($this->storeContentModels != null) {
            $settings["storeContentModels"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->storeContentModels
            );
        }
        if ($this->storeSubscriptionContentModels != null) {
            $settings["storeSubscriptionContentModels"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->storeSubscriptionContentModels
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