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
use Gs2Cdk\Lottery\StampSheet\DrawByUserId;
use Gs2Cdk\Lottery\Model\Array;

class LotteryModelRef {
    private string $namespaceName;
    private string $lotteryName;

    public function __construct(
        string $namespaceName,
        string $lotteryName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->lotteryName = $lotteryName;
    }

    public function draw(
        int $count,
        ?array $config = null,
        ?string $userId = "#{userId}",
    ): DrawByUserId {
        return (new DrawByUserId(
            $this->namespaceName,
            $this->lotteryName,
            $count,
            $config,
            $userId,
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
                "lotteryModel",
                $this->lotteryName,
            ],
        ))->str(
        );
    }
}
