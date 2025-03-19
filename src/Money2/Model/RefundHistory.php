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
use Gs2Cdk\Money2\Model\AppleAppStoreVerifyReceiptEvent;
use Gs2Cdk\Money2\Model\GooglePlayVerifyReceiptEvent;
use Gs2Cdk\Money2\Model\RefundEvent;
use Gs2Cdk\Money2\Model\Options\RefundHistoryOptions;

class RefundHistory {
    private string $transactionId;
    private int $year;
    private int $month;
    private int $day;
    private RefundEvent $detail;
    private ?string $userId = null;

    public function __construct(
        string $transactionId,
        int $year,
        int $month,
        int $day,
        RefundEvent $detail,
        ?RefundHistoryOptions $options = null,
    ) {
        $this->transactionId = $transactionId;
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->detail = $detail;
        $this->userId = $options?->userId ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->transactionId != null) {
            $properties["transactionId"] = $this->transactionId;
        }
        if ($this->year != null) {
            $properties["year"] = $this->year;
        }
        if ($this->month != null) {
            $properties["month"] = $this->month;
        }
        if ($this->day != null) {
            $properties["day"] = $this->day;
        }
        if ($this->userId != null) {
            $properties["userId"] = $this->userId;
        }
        if ($this->detail != null) {
            $properties["detail"] = $this->detail?->properties(
            );
        }

        return $properties;
    }
}
