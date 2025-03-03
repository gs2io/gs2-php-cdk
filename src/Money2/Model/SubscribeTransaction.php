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
namespace Gs2Cdk\Money2\Model;
use Gs2Cdk\Money2\Model\Options\SubscribeTransactionOptions;
use Gs2Cdk\Money2\Model\Enums\SubscribeTransactionStore;
use Gs2Cdk\Money2\Model\Enums\SubscribeTransactionStatusDetail;

class SubscribeTransaction {
    private string $contentName;
    private string $transactionId;
    private SubscribeTransactionStore $store;
    private SubscribeTransactionStatusDetail $statusDetail;
    private int $expiresAt;
    private ?string $userId = null;
    private ?int $lastAllocatedAt = null;
    private ?int $lastTakeOverAt = null;
    private ?int $revision = null;

    public function __construct(
        string $contentName,
        string $transactionId,
        SubscribeTransactionStore $store,
        SubscribeTransactionStatusDetail $statusDetail,
        int $expiresAt,
        ?SubscribeTransactionOptions $options = null,
    ) {
        $this->contentName = $contentName;
        $this->transactionId = $transactionId;
        $this->store = $store;
        $this->statusDetail = $statusDetail;
        $this->expiresAt = $expiresAt;
        $this->userId = $options?->userId ?? null;
        $this->lastAllocatedAt = $options?->lastAllocatedAt ?? null;
        $this->lastTakeOverAt = $options?->lastTakeOverAt ?? null;
        $this->revision = $options?->revision ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->contentName != null) {
            $properties["contentName"] = $this->contentName;
        }
        if ($this->transactionId != null) {
            $properties["transactionId"] = $this->transactionId;
        }
        if ($this->store != null) {
            $properties["store"] = $this->store?->toString(
            );
        }
        if ($this->userId != null) {
            $properties["userId"] = $this->userId;
        }
        if ($this->statusDetail != null) {
            $properties["statusDetail"] = $this->statusDetail?->toString(
            );
        }
        if ($this->expiresAt != null) {
            $properties["expiresAt"] = $this->expiresAt;
        }
        if ($this->lastAllocatedAt != null) {
            $properties["lastAllocatedAt"] = $this->lastAllocatedAt;
        }
        if ($this->lastTakeOverAt != null) {
            $properties["lastTakeOverAt"] = $this->lastTakeOverAt;
        }

        return $properties;
    }
}
