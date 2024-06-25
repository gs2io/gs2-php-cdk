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
use Gs2Cdk\Money2\Model\AppleAppStoreContent;
use Gs2Cdk\Money2\Model\GooglePlayContent;
use Gs2Cdk\Money2\Model\Options\StoreContentModelOptions;

class StoreContentModel {
    private string $name;
    private ?string $metadata = null;
    private ?AppleAppStoreContent $appleAppStore = null;
    private ?GooglePlayContent $googlePlay = null;

    public function __construct(
        string $name,
        ?StoreContentModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->metadata = $options?->metadata ?? null;
        $this->appleAppStore = $options?->appleAppStore ?? null;
        $this->googlePlay = $options?->googlePlay ?? null;
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
        if ($this->appleAppStore != null) {
            $properties["appleAppStore"] = $this->appleAppStore?->properties(
            );
        }
        if ($this->googlePlay != null) {
            $properties["googlePlay"] = $this->googlePlay?->properties(
            );
        }

        return $properties;
    }
}
