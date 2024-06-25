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
use Gs2Cdk\Money2\Model\AppleAppStoreSetting;
use Gs2Cdk\Money2\Model\GooglePlaySetting;
use Gs2Cdk\Money2\Model\FakeSetting;
use Gs2Cdk\Money2\Model\Options\PlatformSettingOptions;

class PlatformSetting {
    private ?AppleAppStoreSetting $appleAppStore = null;
    private ?GooglePlaySetting $googlePlay = null;
    private ?FakeSetting $fake = null;

    public function __construct(
        ?PlatformSettingOptions $options = null,
    ) {
        $this->appleAppStore = $options?->appleAppStore ?? null;
        $this->googlePlay = $options?->googlePlay ?? null;
        $this->fake = $options?->fake ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->appleAppStore != null) {
            $properties["appleAppStore"] = $this->appleAppStore?->properties(
            );
        }
        if ($this->googlePlay != null) {
            $properties["googlePlay"] = $this->googlePlay?->properties(
            );
        }
        if ($this->fake != null) {
            $properties["fake"] = $this->fake?->properties(
            );
        }

        return $properties;
    }
}
