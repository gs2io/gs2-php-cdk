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

namespace Gs2Cdk\Exchange\Resource;

use Gs2Cdk\Exchange\Resource\Enum\RateModelTimingType;

class RateModel {
	public string $name;
	public ?string $metadata;
	public ?array $consumeActions;
	public RateModelTimingType $timingType;
	public ?int $lockTime;
	public ?bool $enableSkip;
	public ?array $skipConsumeActions;
	public ?array $acquireActions;

    public function __construct(
            string $name,
            RateModelTimingType $timingType,
            string $metadata = null,
            array $consumeActions = null,
            int $lockTime = null,
            bool $enableSkip = null,
            array $skipConsumeActions = null,
            array $acquireActions = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->consumeActions = $consumeActions;
        $this->timingType = $timingType;
        $this->lockTime = $lockTime;
        $this->enableSkip = $enableSkip;
        $this->skipConsumeActions = $skipConsumeActions;
        $this->acquireActions = $acquireActions;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->consumeActions != null) {
            $properties["ConsumeActions"] = array_map(fn($v) => $v->properties(), $this->consumeActions);
        }
        if ($this->timingType != null) {
            $properties["TimingType"] = $this->timingType->toString();
        }
        if ($this->lockTime != null) {
            $properties["LockTime"] = $this->lockTime;
        }
        if ($this->enableSkip != null) {
            $properties["EnableSkip"] = $this->enableSkip;
        }
        if ($this->skipConsumeActions != null) {
            $properties["SkipConsumeActions"] = array_map(fn($v) => $v->properties(), $this->skipConsumeActions);
        }
        if ($this->acquireActions != null) {
            $properties["AcquireActions"] = array_map(fn($v) => $v->properties(), $this->acquireActions);
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): RateModelRef {
        return new RateModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
