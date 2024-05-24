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
namespace Gs2Cdk\Inbox\Model;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Inbox\Model\TimeSpan;
use Gs2Cdk\Inbox\Model\Options\GlobalMessageOptions;

class GlobalMessage {
    private string $name;
    private string $metadata;
    private ?array $readAcquireActions = null;
    private ?TimeSpan $expiresTimeSpan = null;
    private ?int $expiresAt = null;
    private ?string $messageReceptionPeriodEventId = null;

    public function __construct(
        string $name,
        string $metadata,
        ?GlobalMessageOptions $options = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->readAcquireActions = $options?->readAcquireActions ?? null;
        $this->expiresTimeSpan = $options?->expiresTimeSpan ?? null;
        $this->expiresAt = $options?->expiresAt ?? null;
        $this->messageReceptionPeriodEventId = $options?->messageReceptionPeriodEventId ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->readAcquireActions != null) {
            $properties["readAcquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->readAcquireActions
            );
        }
        if ($this->expiresTimeSpan != null) {
            $properties["expiresTimeSpan"] = $this->expiresTimeSpan?->properties(
            );
        }
        if ($this->expiresAt != null) {
            $properties["expiresAt"] = $this->expiresAt;
        }
        if ($this->messageReceptionPeriodEventId != null) {
            $properties["messageReceptionPeriodEventId"] = $this->messageReceptionPeriodEventId;
        }

        return $properties;
    }
}
