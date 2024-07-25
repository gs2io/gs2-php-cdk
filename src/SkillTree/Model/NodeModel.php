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
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\SkillTree\Model\Options\NodeModelOptions;

class NodeModel {
    private string $name;
    private array $releaseConsumeActions;
    private float $restrainReturnRate;
    private ?string $metadata = null;
    private ?array $releaseVerifyActions = null;
    private ?array $returnAcquireActions = null;
    private ?array $premiseNodeNames = null;

    public function __construct(
        string $name,
        array $releaseConsumeActions,
        float $restrainReturnRate,
        ?NodeModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->releaseConsumeActions = $releaseConsumeActions;
        $this->restrainReturnRate = $restrainReturnRate;
        $this->metadata = $options?->metadata ?? null;
        $this->releaseVerifyActions = $options?->releaseVerifyActions ?? null;
        $this->returnAcquireActions = $options?->returnAcquireActions ?? null;
        $this->premiseNodeNames = $options?->premiseNodeNames ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->releaseVerifyActions != null) {
            $properties["releaseVerifyActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->releaseVerifyActions
            );
        }
        if ($this->releaseConsumeActions != null) {
            $properties["releaseConsumeActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->releaseConsumeActions
            );
        }
        if ($this->restrainReturnRate != null) {
            $properties["restrainReturnRate"] = $this->restrainReturnRate;
        }
        if ($this->premiseNodeNames != null) {
            $properties["premiseNodeNames"] = $this->premiseNodeNames;
        }

        return $properties;
    }
}
