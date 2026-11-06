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
namespace Gs2Cdk\Realtime\Model;
use Gs2Cdk\Realtime\Model\Options\StateMachineSettingOptions;

class StateMachineSetting {
    private string $namespaceId;
    private ?int $version = null;

    public function __construct(
        string $namespaceId,
        ?StateMachineSettingOptions $options = null,
    ) {
        $this->namespaceId = $namespaceId;
        $this->version = $options?->version ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->namespaceId != null) {
            $properties["namespaceId"] = $this->namespaceId;
        }
        if ($this->version != null) {
            $properties["version"] = $this->version;
        }

        return $properties;
    }
}
