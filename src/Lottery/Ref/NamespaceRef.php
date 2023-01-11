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
namespace Gs2Cdk\Lottery\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Lottery\Ref\PrizeTableRef;
use Gs2Cdk\Lottery\Ref\LotteryModelRef;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function prizeTable(
        string $prizeTableName,
    ): PrizeTableRef {
        return (new PrizeTableRef(
            $this->namespaceName,
            $prizeTableName,
        ));
    }

    public function lotteryModel(
        string $lotteryName,
    ): LotteryModelRef {
        return (new LotteryModelRef(
            $this->namespaceName,
            $lotteryName,
        ));
    }

    public function grn(
    ): string {
        return (new Join(
            ":",
            [
                "grn",
                "gs2",
                GetAttr::region(
                )->str(
                ),
                GetAttr::ownerId(
                )->str(
                ),
                "lottery",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
