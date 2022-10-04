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

namespace Gs2Cdk\Distributor\Resource;


class DistributorModel {
	public string $name;
	public ?string $metadata;
	public ?string $inboxNamespaceId;
	public ?array $whiteListTargetIds;

    public function __construct(
            string $name,
            string $metadata = null,
            string $inboxNamespaceId = null,
            array $whiteListTargetIds = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->inboxNamespaceId = $inboxNamespaceId;
        $this->whiteListTargetIds = $whiteListTargetIds;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->inboxNamespaceId != null) {
            $properties["InboxNamespaceId"] = $this->inboxNamespaceId;
        }
        if ($this->whiteListTargetIds != null) {
            $properties["WhiteListTargetIds"] = $this->whiteListTargetIds;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): DistributorModelRef {
        return new DistributorModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
