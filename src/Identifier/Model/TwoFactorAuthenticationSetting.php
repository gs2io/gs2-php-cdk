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
namespace Gs2Cdk\Identifier\Model;
use Gs2Cdk\Identifier\Model\Options\TwoFactorAuthenticationSettingOptions;
use Gs2Cdk\Identifier\Model\Enum\TwoFactorAuthenticationSettingStatus;

class TwoFactorAuthenticationSetting {
    private string $authenticationKey;
    private TwoFactorAuthenticationSettingStatus $status;

    public function __construct(
        string $authenticationKey,
        TwoFactorAuthenticationSettingStatus $status,
        ?TwoFactorAuthenticationSettingOptions $options = null,
    ) {
        $this->authenticationKey = $authenticationKey;
        $this->status = $status;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->authenticationKey != null) {
            $properties["authenticationKey"] = $this->authenticationKey;
        }
        if ($this->status != null) {
            $properties["status"] = $this->status?->toString(
            );
        }

        return $properties;
    }
}
