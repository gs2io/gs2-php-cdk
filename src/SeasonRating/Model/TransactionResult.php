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
namespace Gs2Cdk\SeasonRating\Model;
use Gs2Cdk\SeasonRating\Model\VerifyActionResult;
use Gs2Cdk\SeasonRating\Model\ConsumeActionResult;
use Gs2Cdk\SeasonRating\Model\AcquireActionResult;
use Gs2Cdk\SeasonRating\Model\Options\TransactionResultOptions;

class TransactionResult {
    private string $transactionId;
    private ?array $verifyResults = null;
    private ?array $consumeResults = null;
    private ?array $acquireResults = null;

    public function __construct(
        string $transactionId,
        ?TransactionResultOptions $options = null,
    ) {
        $this->transactionId = $transactionId;
        $this->verifyResults = $options?->verifyResults ?? null;
        $this->consumeResults = $options?->consumeResults ?? null;
        $this->acquireResults = $options?->acquireResults ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->transactionId != null) {
            $properties["transactionId"] = $this->transactionId;
        }
        if ($this->verifyResults != null) {
            $properties["verifyResults"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->verifyResults
            );
        }
        if ($this->consumeResults != null) {
            $properties["consumeResults"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->consumeResults
            );
        }
        if ($this->acquireResults != null) {
            $properties["acquireResults"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->acquireResults
            );
        }

        return $properties;
    }
}
