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
use Gs2Cdk\Money2\Model\Options\GooglePlaySettingOptions;

class GooglePlaySetting {
    private ?string $packageName = null;
    private ?string $publicKey = null;

    public function __construct(
        ?GooglePlaySettingOptions $options = null,
    ) {
        $this->packageName = $options?->packageName ?? null;
        $this->publicKey = $options?->publicKey ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->packageName != null) {
            $properties["packageName"] = $this->packageName;
        }
        if ($this->publicKey != null) {
            $properties["publicKey"] = $this->publicKey;
        }

        return $properties;
    }
}
