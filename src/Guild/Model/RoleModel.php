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
namespace Gs2Cdk\Guild\Model;
use Gs2Cdk\Guild\Model\Options\RoleModelOptions;

class RoleModel {
    private string $name;
    private string $policyDocument;
    private ?string $metadata = null;

    public function __construct(
        string $name,
        string $policyDocument,
        ?RoleModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->policyDocument = $policyDocument;
        $this->metadata = $options?->metadata ?? null;
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
        if ($this->policyDocument != null) {
            $properties["policyDocument"] = $this->policyDocument;
        }

        return $properties;
    }
}
