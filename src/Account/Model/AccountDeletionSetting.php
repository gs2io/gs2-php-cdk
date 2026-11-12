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
use Gs2Cdk\Account\Model\Options\AccountDeletionSettingOptions;
use Gs2Cdk\Account\Model\Enums\AccountDeletionSettingLoginDuringGracePeriod;
use Gs2Cdk\Account\Model\Enums\AccountDeletionSettingCleanUserDataScope;

class AccountDeletionSetting {
    private int $gracePeriodMinutes;
    private AccountDeletionSettingLoginDuringGracePeriod $loginDuringGracePeriod;
    private AccountDeletionSettingCleanUserDataScope $cleanUserDataScope;

    public function __construct(
        int $gracePeriodMinutes,
        AccountDeletionSettingLoginDuringGracePeriod $loginDuringGracePeriod,
        AccountDeletionSettingCleanUserDataScope $cleanUserDataScope,
        ?AccountDeletionSettingOptions $options = null,
    ) {
        $this->gracePeriodMinutes = $gracePeriodMinutes;
        $this->loginDuringGracePeriod = $loginDuringGracePeriod;
        $this->cleanUserDataScope = $cleanUserDataScope;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->gracePeriodMinutes != null) {
            $properties["gracePeriodMinutes"] = $this->gracePeriodMinutes;
        }
        if ($this->loginDuringGracePeriod != null) {
            $properties["loginDuringGracePeriod"] = $this->loginDuringGracePeriod?->toString(
            );
        }
        if ($this->cleanUserDataScope != null) {
            $properties["cleanUserDataScope"] = $this->cleanUserDataScope?->toString(
            );
        }

        return $properties;
    }
}
