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

class TargetVersion {
	public string $versionName;
	public Version $version;
	public ?string $body;
	public ?string $signature;

    public function __construct(
            string $versionName,
            Version $version,
            string $body = null,
            string $signature = null,
    ) {
        $this->versionName = $versionName;
        $this->version = $version;
        $this->body = $body;
        $this->signature = $signature;
    }

    public function properties(): array {
        $properties = [];
        if ($this->versionName != null) {
            $properties["VersionName"] = $this->versionName;
        }
        if ($this->version != null) {
            $properties["Version"] = $this->version->properties();
        }
        if ($this->body != null) {
            $properties["Body"] = $this->body;
        }
        if ($this->signature != null) {
            $properties["Signature"] = $this->signature;
        }
        return $properties;
    }
}
