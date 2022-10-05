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

namespace Gs2Cdk\Mission\Model;

use Gs2Cdk\Mission\Model\Enum\ScopedValueResetType;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class ScopedValue {
	public ScopedValueResetType $resetType;
	public int $value;
	public ?int $nextResetAt;
	public int $updatedAt;

    public function __construct(
            ScopedValueResetType $resetType,
            int $value,
            int $updatedAt,
            int $nextResetAt = null,
    ) {
        $this->resetType = $resetType;
        $this->value = $value;
        $this->nextResetAt = $nextResetAt;
        $this->updatedAt = $updatedAt;
    }

    public function properties(): array {
        $properties = [];
        if ($this->resetType != null) {
            $properties["ResetType"] = $this->resetType->toString();
        }
        if ($this->value != null) {
            $properties["Value"] = $this->value;
        }
        if ($this->nextResetAt != null) {
            $properties["NextResetAt"] = $this->nextResetAt;
        }
        if ($this->updatedAt != null) {
            $properties["UpdatedAt"] = $this->updatedAt;
        }
        return $properties;
    }
}
