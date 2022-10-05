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

namespace Gs2Cdk\Formation\Model;

use Gs2Cdk\Formation\Model\Enum\SlotWithSignaturePropertyType;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class SlotWithSignature {
	public string $name;
	public SlotWithSignaturePropertyType $propertyType;
	public string $body;
	public string $signature;
	public ?string $metadata;

    public function __construct(
            string $name,
            SlotWithSignaturePropertyType $propertyType,
            string $body,
            string $signature,
            string $metadata = null,
    ) {
        $this->name = $name;
        $this->propertyType = $propertyType;
        $this->body = $body;
        $this->signature = $signature;
        $this->metadata = $metadata;
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->propertyType != null) {
            $properties["PropertyType"] = $this->propertyType->toString();
        }
        if ($this->body != null) {
            $properties["Body"] = $this->body;
        }
        if ($this->signature != null) {
            $properties["Signature"] = $this->signature;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        return $properties;
    }
}
