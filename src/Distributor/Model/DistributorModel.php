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
namespace Gs2Cdk\Distributor\Model;
use Gs2Cdk\Distributor\Model\Options\DistributorModelOptions;

class DistributorModel {
    private string $name;
    private ?string $metadata = null;
    private ?string $inboxNamespaceId = null;
    private ?array $whiteListTargetIds = null;

    public function __construct(
        string $name,
        ?DistributorModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->metadata = $options?->metadata ?? null;
        $this->inboxNamespaceId = $options?->inboxNamespaceId ?? null;
        $this->whiteListTargetIds = $options?->whiteListTargetIds ?? null;
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
        if ($this->inboxNamespaceId != null) {
            $properties["inboxNamespaceId"] = $this->inboxNamespaceId;
        }
        if ($this->whiteListTargetIds != null) {
            $properties["whiteListTargetIds"] = $this->whiteListTargetIds;
        }

        return $properties;
    }
}
