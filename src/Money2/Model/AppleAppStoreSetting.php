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
use Gs2Cdk\Money2\Model\Options\AppleAppStoreSettingOptions;

class AppleAppStoreSetting {
    private ?string $bundleId = null;
    private ?string $sharedSecretKey = null;
    private ?string $issuerId = null;
    private ?string $keyId = null;
    private ?string $privateKeyPem = null;

    public function __construct(
        ?AppleAppStoreSettingOptions $options = null,
    ) {
        $this->bundleId = $options?->bundleId ?? null;
        $this->sharedSecretKey = $options?->sharedSecretKey ?? null;
        $this->issuerId = $options?->issuerId ?? null;
        $this->keyId = $options?->keyId ?? null;
        $this->privateKeyPem = $options?->privateKeyPem ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->bundleId != null) {
            $properties["bundleId"] = $this->bundleId;
        }
        if ($this->sharedSecretKey != null) {
            $properties["sharedSecretKey"] = $this->sharedSecretKey;
        }
        if ($this->issuerId != null) {
            $properties["issuerId"] = $this->issuerId;
        }
        if ($this->keyId != null) {
            $properties["keyId"] = $this->keyId;
        }
        if ($this->privateKeyPem != null) {
            $properties["privateKeyPem"] = $this->privateKeyPem;
        }

        return $properties;
    }
}
