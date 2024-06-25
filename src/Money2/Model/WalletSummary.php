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
use Gs2Cdk\Money2\Model\Options\WalletSummaryOptions;

class WalletSummary {
    private int $paid;
    private int $free;
    private int $total;

    public function __construct(
        int $paid,
        int $free,
        int $total,
        ?WalletSummaryOptions $options = null,
    ) {
        $this->paid = $paid;
        $this->free = $free;
        $this->total = $total;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->paid != null) {
            $properties["paid"] = $this->paid;
        }
        if ($this->free != null) {
            $properties["free"] = $this->free;
        }
        if ($this->total != null) {
            $properties["total"] = $this->total;
        }

        return $properties;
    }
}
