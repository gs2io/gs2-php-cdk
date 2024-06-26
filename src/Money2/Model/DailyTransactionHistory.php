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
use Gs2Cdk\Money2\Model\Options\DailyTransactionHistoryOptions;

class DailyTransactionHistory {
    private int $year;
    private int $month;
    private int $day;
    private string $currency;
    private float $depositAmount;
    private float $withdrawAmount;
    private ?int $revision = null;

    public function __construct(
        int $year,
        int $month,
        int $day,
        string $currency,
        float $depositAmount,
        float $withdrawAmount,
        ?DailyTransactionHistoryOptions $options = null,
    ) {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->currency = $currency;
        $this->depositAmount = $depositAmount;
        $this->withdrawAmount = $withdrawAmount;
        $this->revision = $options?->revision ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->year != null) {
            $properties["year"] = $this->year;
        }
        if ($this->month != null) {
            $properties["month"] = $this->month;
        }
        if ($this->day != null) {
            $properties["day"] = $this->day;
        }
        if ($this->currency != null) {
            $properties["currency"] = $this->currency;
        }
        if ($this->depositAmount != null) {
            $properties["depositAmount"] = $this->depositAmount;
        }
        if ($this->withdrawAmount != null) {
            $properties["withdrawAmount"] = $this->withdrawAmount;
        }

        return $properties;
    }
}
