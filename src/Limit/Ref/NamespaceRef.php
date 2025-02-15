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
namespace Gs2Cdk\Limit\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Limit\Ref\LimitModelRef;
use Gs2Cdk\Limit\Ref\MasterDataObjectRef;
use Gs2Cdk\Limit\StampSheet\CountDownByUserId;
use Gs2Cdk\Limit\StampSheet\DeleteCounterByUserId;
use Gs2Cdk\Limit\StampSheet\CountUpByUserId;
use Gs2Cdk\Limit\StampSheet\VerifyCounterByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function limitModel(
        string $limitName,
    ): LimitModelRef {
        return (new LimitModelRef(
            $this->namespaceName,
            $limitName,
        ));
    }

    public function countDown(
        string $limitName,
        string $counterName,
        int $countDownValue,
        ?string $userId = "#{userId}",
    ): CountDownByUserId {
        return (new CountDownByUserId(
            $this->namespaceName,
            $limitName,
            $counterName,
            $countDownValue,
            $userId,
        ));
    }

    public function deleteCounter(
        string $limitName,
        string $counterName,
        ?string $userId = "#{userId}",
    ): DeleteCounterByUserId {
        return (new DeleteCounterByUserId(
            $this->namespaceName,
            $limitName,
            $counterName,
            $userId,
        ));
    }

    public function countUp(
        string $limitName,
        string $counterName,
        int $countUpValue,
        ?int $maxValue = null,
        ?string $userId = "#{userId}",
    ): CountUpByUserId {
        return (new CountUpByUserId(
            $this->namespaceName,
            $limitName,
            $counterName,
            $countUpValue,
            $maxValue,
            $userId,
        ));
    }

    public function verifyCounter(
        string $limitName,
        string $counterName,
        string $verifyType,
        int $count,
        bool $multiplyValueSpecifyingQuantity,
        ?string $userId = "#{userId}",
    ): VerifyCounterByUserId {
        return (new VerifyCounterByUserId(
            $this->namespaceName,
            $limitName,
            $counterName,
            $verifyType,
            $count,
            $multiplyValueSpecifyingQuantity,
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
                "limit",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
