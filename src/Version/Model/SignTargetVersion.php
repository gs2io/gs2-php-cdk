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

class SignTargetVersion {
	public string $region;
	public string $ownerId;
	public string $namespaceName;
	public string $versionName;
	public Version $version;

    public function __construct(
            string $region,
            string $ownerId,
            string $namespaceName,
            string $versionName,
            Version $version,
    ) {
        $this->region = $region;
        $this->ownerId = $ownerId;
        $this->namespaceName = $namespaceName;
        $this->versionName = $versionName;
        $this->version = $version;
    }

    public function properties(): array {
        $properties = [];
        if ($this->region != null) {
            $properties["Region"] = $this->region;
        }
        if ($this->ownerId != null) {
            $properties["OwnerId"] = $this->ownerId;
        }
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->versionName != null) {
            $properties["VersionName"] = $this->versionName;
        }
        if ($this->version != null) {
            $properties["Version"] = $this->version->properties();
        }
        return $properties;
    }
}
