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

namespace Gs2Cdk\Version\Model;


use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class Version {
	public int $major;
	public int $minor;
	public int $micro;

    public function __construct(
            int $major,
            int $minor,
            int $micro,
    ) {
        $this->major = $major;
        $this->minor = $minor;
        $this->micro = $micro;
    }

    public function properties(): array {
        $properties = [];
        if ($this->major != null) {
            $properties["Major"] = $this->major;
        }
        if ($this->minor != null) {
            $properties["Minor"] = $this->minor;
        }
        if ($this->micro != null) {
            $properties["Micro"] = $this->micro;
        }
        return $properties;
    }
}
