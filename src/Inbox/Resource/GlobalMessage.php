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

namespace Gs2Cdk\Inbox\Resource;


class GlobalMessage {
	public string $name;
	public string $metadata;
	public ?array $readAcquireActions;
	public ?TimeSpan $expiresTimeSpan;
	public ?int $expiresAt;

    public function __construct(
            string $name,
            string $metadata,
            array $readAcquireActions = null,
            TimeSpan $expiresTimeSpan = null,
            int $expiresAt = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->readAcquireActions = $readAcquireActions;
        $this->expiresTimeSpan = $expiresTimeSpan;
        $this->expiresAt = $expiresAt;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->readAcquireActions != null) {
            $properties["ReadAcquireActions"] = array_map(fn($v) => $v->properties(), $this->readAcquireActions);
        }
        if ($this->expiresTimeSpan != null) {
            $properties["ExpiresTimeSpan"] = $this->expiresTimeSpan->properties();
        }
        if ($this->expiresAt != null) {
            $properties["ExpiresAt"] = $this->expiresAt;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): GlobalMessageRef {
        return new GlobalMessageRef(
            $namespaceName,
            $this->name,
        );
    }
}
