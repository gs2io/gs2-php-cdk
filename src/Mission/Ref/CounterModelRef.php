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
namespace Gs2Cdk\Mission\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Mission\StampSheet\IncreaseCounterByUserId;
use Gs2Cdk\Mission\StampSheet\SetCounterByUserId;
use Gs2Cdk\Mission\Model\ScopedValue;
use Gs2Cdk\Mission\StampSheet\DecreaseCounterByUserId;
use Gs2Cdk\Mission\StampSheet\VerifyCounterValueByUserId;

class CounterModelRef {
    private string $namespaceName;
    private string $counterName;

    public function __construct(
        string $namespaceName,
        string $counterName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->counterName = $counterName;
    }

    public function increaseCounter(
        int $value,
        ?string $userId = "#{userId}",
    ): IncreaseCounterByUserId {
        return (new IncreaseCounterByUserId(
            $this->namespaceName,
            $this->counterName,
            $value,
            $userId,
        ));
    }

    public function setCounter(
        ?array $values = null,
        ?string $userId = "#{userId}",
    ): SetCounterByUserId {
        return (new SetCounterByUserId(
            $this->namespaceName,
            $this->counterName,
            $values,
            $userId,
        ));
    }

    public function decreaseCounter(
        int $value,
        ?string $userId = "#{userId}",
    ): DecreaseCounterByUserId {
        return (new DecreaseCounterByUserId(
            $this->namespaceName,
            $this->counterName,
            $value,
            $userId,
        ));
    }

    public function verifyCounterValue(
        string $verifyType,
        string $scopeType,
        string $resetType,
        string $conditionName,
        int $value,
        bool $multiplyValueSpecifyingQuantity,
        ?string $userId = "#{userId}",
    ): VerifyCounterValueByUserId {
        return (new VerifyCounterValueByUserId(
            $this->namespaceName,
            $this->counterName,
            $verifyType,
            $scopeType,
            $resetType,
            $conditionName,
            $value,
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
                "mission",
                $this->namespaceName,
                "counter",
                $this->counterName,
            ],
        ))->str(
        );
    }
}
