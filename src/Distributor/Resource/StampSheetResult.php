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

namespace Gs2Cdk\Distributor\Resource;


class StampSheetResult {
	public string $userId;
	public string $transactionId;
	public ?array $taskRequests;
	public AcquireAction $sheetRequest;
	public ?array $taskResults;
	public ?string $sheetResult;
	public ?string $nextTransactionId;
	public int $createdAt;
	public int $ttlAt;

    public function __construct(
            string $userId,
            string $transactionId,
            AcquireAction $sheetRequest,
            int $createdAt,
            int $ttlAt,
            array $taskRequests = null,
            array $taskResults = null,
            string $sheetResult = null,
            string $nextTransactionId = null,
    ) {
        $this->userId = $userId;
        $this->transactionId = $transactionId;
        $this->taskRequests = $taskRequests;
        $this->sheetRequest = $sheetRequest;
        $this->taskResults = $taskResults;
        $this->sheetResult = $sheetResult;
        $this->nextTransactionId = $nextTransactionId;
        $this->createdAt = $createdAt;
        $this->ttlAt = $ttlAt;
  }

    public function properties(): array {
        $properties = [];
        if ($this->userId != null) {
            $properties["UserId"] = $this->userId;
        }
        if ($this->transactionId != null) {
            $properties["TransactionId"] = $this->transactionId;
        }
        if ($this->taskRequests != null) {
            $properties["TaskRequests"] = array_map(fn($v) => $v->properties(), $this->taskRequests);
        }
        if ($this->sheetRequest != null) {
            $properties["SheetRequest"] = $this->sheetRequest->properties();
        }
        if ($this->taskResults != null) {
            $properties["TaskResults"] = $this->taskResults;
        }
        if ($this->sheetResult != null) {
            $properties["SheetResult"] = $this->sheetResult;
        }
        if ($this->nextTransactionId != null) {
            $properties["NextTransactionId"] = $this->nextTransactionId;
        }
        if ($this->createdAt != null) {
            $properties["CreatedAt"] = $this->createdAt;
        }
        if ($this->ttlAt != null) {
            $properties["TtlAt"] = $this->ttlAt;
        }
        return $properties;
    }
}
