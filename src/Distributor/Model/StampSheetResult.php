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
    private ?array $taskRequests = null;
    private ?array $taskResultCodes = null;
    private ?array $taskResults = null;
    private ?int $sheetResultCode = null;
    private ?string $sheetResult = null;
    private ?string $nextTransactionId = null;
    private ?int $revision = null;

    public function __construct(
        string $userId,
        string $transactionId,
        AcquireAction $sheetRequest,
        ?StampSheetResultOptions $options = null,
    ) {
        $this->userId = $userId;
        $this->transactionId = $transactionId;
        $this->sheetRequest = $sheetRequest;
        $this->taskRequests = $options?->taskRequests ?? null;
        $this->taskResultCodes = $options?->taskResultCodes ?? null;
        $this->taskResults = $options?->taskResults ?? null;
        $this->sheetResultCode = $options?->sheetResultCode ?? null;
        $this->sheetResult = $options?->sheetResult ?? null;
        $this->nextTransactionId = $options?->nextTransactionId ?? null;
        $this->revision = $options?->revision ?? null;
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
        if ($this->taskResultCodes != null) {
            $properties["taskResultCodes"] = $this->taskResultCodes;
        }
        if ($this->taskResults != null) {
            $properties["taskResults"] = $this->taskResults;
        }
        if ($this->sheetResultCode != null) {
            $properties["sheetResultCode"] = $this->sheetResultCode;
        }
        if ($this->sheetResult != null) {
            $properties["sheetResult"] = $this->sheetResult;
        }
        if ($this->nextTransactionId != null) {
            $properties["nextTransactionId"] = $this->nextTransactionId;
        }

        return $properties;
    }
}
