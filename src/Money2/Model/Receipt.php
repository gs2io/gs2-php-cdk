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
use Gs2Cdk\Money2\Model\Options\ReceiptOptions;
use Gs2Cdk\Money2\Model\Enum\ReceiptStore;

class Receipt {
    private ReceiptStore $store;
    private string $transactionID;
    private string $payload;

    public function __construct(
        ReceiptStore $store,
        string $transactionID,
        string $payload,
        ?ReceiptOptions $options = null,
    ) {
        $this->store = $store;
        $this->transactionID = $transactionID;
        $this->payload = $payload;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->store != null) {
            $properties["store"] = $this->store?->toString(
            );
        }
        if ($this->transactionID != null) {
            $properties["transactionID"] = $this->transactionID;
        }
        if ($this->payload != null) {
            $properties["payload"] = $this->payload;
        }

        return $properties;
    }
}
