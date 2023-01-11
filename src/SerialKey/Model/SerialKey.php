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
namespace Gs2Cdk\SerialKey\Model;
use Gs2Cdk\SerialKey\Model\Options\SerialKeyOptions;
use Gs2Cdk\SerialKey\Model\Options\SerialKeyStatusIsActiveOptions;
use Gs2Cdk\SerialKey\Model\Options\SerialKeyStatusIsUsedOptions;
use Gs2Cdk\SerialKey\Model\Options\SerialKeyStatusIsInactiveOptions;
use Gs2Cdk\SerialKey\Model\Enum\SerialKeyStatus;

class SerialKey {
    private string $campaignModelName;
    private string $code;
    private SerialKeyStatus $status;
    private int $createdAt;
    private int $updatedAt;
    private ?string $metadata = null;
    private ?string $usedUserId = null;
    private ?int $usedAt = null;

    public function __construct(
        string $campaignModelName,
        string $code,
        SerialKeyStatus $status,
        int $createdAt,
        int $updatedAt,
        ?SerialKeyOptions $options = null,
    ) {
        $this->campaignModelName = $campaignModelName;
        $this->code = $code;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->metadata = $options?->metadata ?? null;
        $this->usedUserId = $options?->usedUserId ?? null;
        $this->usedAt = $options?->usedAt ?? null;
    }

    public static function statusIsActive(
        string $campaignModelName,
        string $code,
        int $createdAt,
        int $updatedAt,
        ?SerialKeyStatusIsActiveOptions $options = null,
    ): SerialKey {
        return (new SerialKey(
            $campaignModelName,
            $code,
            SerialKeyStatus::ACTIVE,
            $createdAt,
            $updatedAt,
            new SerialKeyOptions(
                metadata: $options?->metadata,
                usedAt: $options?->usedAt,
            ),
        ));
    }

    public static function statusIsUsed(
        string $campaignModelName,
        string $code,
        int $createdAt,
        int $updatedAt,
        string $usedUserId,
        ?SerialKeyStatusIsUsedOptions $options = null,
    ): SerialKey {
        return (new SerialKey(
            $campaignModelName,
            $code,
            SerialKeyStatus::USED,
            $createdAt,
            $updatedAt,
            new SerialKeyOptions(
                usedUserId: $usedUserId,
                metadata: $options?->metadata,
                usedAt: $options?->usedAt,
            ),
        ));
    }

    public static function statusIsInactive(
        string $campaignModelName,
        string $code,
        int $createdAt,
        int $updatedAt,
        ?SerialKeyStatusIsInactiveOptions $options = null,
    ): SerialKey {
        return (new SerialKey(
            $campaignModelName,
            $code,
            SerialKeyStatus::INACTIVE,
            $createdAt,
            $updatedAt,
            new SerialKeyOptions(
                metadata: $options?->metadata,
                usedAt: $options?->usedAt,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->campaignModelName != null) {
            $properties["campaignModelName"] = $this->campaignModelName;
        }
        if ($this->code != null) {
            $properties["code"] = $this->code;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->status != null) {
            $properties["status"] = $this->status?->toString(
            );
        }
        if ($this->usedUserId != null) {
            $properties["usedUserId"] = $this->usedUserId;
        }
        if ($this->createdAt != null) {
            $properties["createdAt"] = $this->createdAt;
        }
        if ($this->usedAt != null) {
            $properties["usedAt"] = $this->usedAt;
        }
        if ($this->updatedAt != null) {
            $properties["updatedAt"] = $this->updatedAt;
        }

        return $properties;
    }
}
