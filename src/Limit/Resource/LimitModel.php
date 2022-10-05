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

namespace Gs2Cdk\Limit\Resource;

use Gs2Cdk\Limit\Resource\Enum\LimitModelResetType;
use Gs2Cdk\Limit\Resource\Enum\LimitModelResetDayOfWeek;

class LimitModel {
	public string $name;
	public ?string $metadata;
	public LimitModelResetType $resetType;
	public ?int $resetDayOfMonth;
	public ?LimitModelResetDayOfWeek $resetDayOfWeek;
	public ?int $resetHour;

    public function __construct(
            string $name,
            LimitModelResetType $resetType,
            string $metadata = null,
            int $resetDayOfMonth = null,
            LimitModelResetDayOfWeek $resetDayOfWeek = null,
            int $resetHour = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->resetType = $resetType;
        $this->resetDayOfMonth = $resetDayOfMonth;
        $this->resetDayOfWeek = $resetDayOfWeek;
        $this->resetHour = $resetHour;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->resetType != null) {
            $properties["ResetType"] = $this->resetType->toString();
        }
        if ($this->resetDayOfMonth != null) {
            $properties["ResetDayOfMonth"] = $this->resetDayOfMonth;
        }
        if ($this->resetDayOfWeek != null) {
            $properties["ResetDayOfWeek"] = $this->resetDayOfWeek->toString();
        }
        if ($this->resetHour != null) {
            $properties["ResetHour"] = $this->resetHour;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): LimitModelRef {
        return new LimitModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
