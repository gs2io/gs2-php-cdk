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
namespace Gs2Cdk\Distributor\Model;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Distributor\Model\Options\StampSheetResultOptions;

class StampSheetResult {
    private string $userId;
    private string $transactionId;
    private AcquireAction $sheetRequest;
    private int $createdAt;
    private int $ttlAt;
    private ?array $taskRequests = null;
    private ?array $taskResults = null;
    private ?string $sheetResult = null;
    private ?string $nextTransactionId = null;

    public function __construct(
        string $userId,
        string $transactionId,
        AcquireAction $sheetRequest,
        int $createdAt,
        int $ttlAt,
        ?StampSheetResultOptions $options = null,
    ) {
        $this->userId = $userId;
        $this->transactionId = $transactionId;
        $this->sheetRequest = $sheetRequest;
        $this->createdAt = $createdAt;
        $this->ttlAt = $ttlAt;
        $this->taskRequests = $options?->taskRequests ?? null;
        $this->taskResults = $options?->taskResults ?? null;
        $this->sheetResult = $options?->sheetResult ?? null;
        $this->nextTransactionId = $options?->nextTransactionId ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->userId != null) {
            $properties["userId"] = $this->userId;
        }
        if ($this->transactionId != null) {
            $properties["transactionId"] = $this->transactionId;
        }
        if ($this->taskRequests != null) {
            $properties["taskRequests"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->taskRequests
            );
        }
        if ($this->sheetRequest != null) {
            $properties["sheetRequest"] = $this->sheetRequest?->properties(
            );
        }
        if ($this->taskResults != null) {
            $properties["taskResults"] = $this->taskResults;
        }
        if ($this->sheetResult != null) {
            $properties["sheetResult"] = $this->sheetResult;
        }
        if ($this->nextTransactionId != null) {
            $properties["nextTransactionId"] = $this->nextTransactionId;
        }
        if ($this->createdAt != null) {
            $properties["createdAt"] = $this->createdAt;
        }
        if ($this->ttlAt != null) {
            $properties["ttlAt"] = $this->ttlAt;
        }

        return $properties;
    }
}
