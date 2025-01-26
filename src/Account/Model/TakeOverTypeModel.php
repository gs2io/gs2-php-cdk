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
namespace Gs2Cdk\Account\Model;
use Gs2Cdk\Account\Model\ScopeValue;
use Gs2Cdk\Account\Model\OpenIdConnectSetting;
use Gs2Cdk\Account\Model\Options\TakeOverTypeModelOptions;

class TakeOverTypeModel {
    private int $type;
    private OpenIdConnectSetting $openIdConnectSetting;
    private ?string $metadata = null;

    public function __construct(
        int $type,
        OpenIdConnectSetting $openIdConnectSetting,
        ?TakeOverTypeModelOptions $options = null,
    ) {
        $this->type = $type;
        $this->openIdConnectSetting = $openIdConnectSetting;
        $this->metadata = $options?->metadata ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->type != null) {
            $properties["type"] = $this->type;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->openIdConnectSetting != null) {
            $properties["openIdConnectSetting"] = $this->openIdConnectSetting?->properties(
            );
        }

        return $properties;
    }
}
