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

namespace Gs2Cdk\Lottery\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;

class NamespaceRef {
    public String $namespaceName;

    public function __construct(
            String $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function currentLotteryMaster(
    ): CurrentLotteryMasterRef {
        return new CurrentLotteryMasterRef(
            namespaceName: $this->namespaceName,
        );
    }

    public function prizeTable(
            String $prizeTableName,
    ): PrizeTableRef {
        return new PrizeTableRef(
            namespaceName: $this->namespaceName,
            prizeTableName: $prizeTableName,
        );
    }

    public function lotteryModel(
            String $lotteryName,
    ): LotteryModelRef {
        return new LotteryModelRef(
            namespaceName: $this->namespaceName,
            lotteryName: $lotteryName,
        );
    }

    public function prizeTableMaster(
            String $prizeTableName,
    ): PrizeTableMasterRef {
        return new PrizeTableMasterRef(
            namespaceName: $this->namespaceName,
            prizeTableName: $prizeTableName,
        );
    }

    public function lotteryModelMaster(
            String $lotteryName,
    ): LotteryModelMasterRef {
        return new LotteryModelMasterRef(
            namespaceName: $this->namespaceName,
            lotteryName: $lotteryName,
        );
    }

    public function grn(): String {
        return (new Join(
            ":",
            [
                "grn",
                "gs2",
                GetAttr::region()->str(),
                GetAttr::ownerId()->str(),
                "lottery",
                $this->namespaceName
            ]
        ))->str();
    }
}
