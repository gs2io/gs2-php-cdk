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
use Gs2Cdk\Mission\Ref\MissionGroupModelRef;
use Gs2Cdk\Mission\Ref\CounterModelRef;
use Gs2Cdk\Mission\StampSheet\RevertReceiveByUserId;
use Gs2Cdk\Mission\StampSheet\IncreaseCounterByUserId;
use Gs2Cdk\Mission\StampSheet\SetCounterByUserId;
use Gs2Cdk\Mission\Model\ScopedValue;
use Gs2Cdk\Mission\StampSheet\ReceiveByUserId;
use Gs2Cdk\Mission\StampSheet\DecreaseCounterByUserId;
use Gs2Cdk\Mission\StampSheet\VerifyCompleteByUserId;
use Gs2Cdk\Mission\StampSheet\VerifyCounterValueByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function missionGroupModel(
        string $missionGroupName,
    ): MissionGroupModelRef {
        return (new MissionGroupModelRef(
            $this->namespaceName,
            $missionGroupName,
        ));
    }

    public function counterModel(
        string $counterName,
    ): CounterModelRef {
        return (new CounterModelRef(
            $this->namespaceName,
            $counterName,
        ));
    }

    public function revertReceive(
        string $missionGroupName,
        string $missionTaskName,
        ?string $userId = "#{userId}",
    ): RevertReceiveByUserId {
        return (new RevertReceiveByUserId(
            $this->namespaceName,
            $missionGroupName,
            $missionTaskName,
            $userId,
        ));
    }

    public function increaseCounter(
        string $counterName,
        int $value,
        ?string $userId = "#{userId}",
    ): IncreaseCounterByUserId {
        return (new IncreaseCounterByUserId(
            $this->namespaceName,
            $counterName,
            $value,
            $userId,
        ));
    }

    public function setCounter(
        string $counterName,
        ?array $values = null,
        ?string $userId = "#{userId}",
    ): SetCounterByUserId {
        return (new SetCounterByUserId(
            $this->namespaceName,
            $counterName,
            $values,
            $userId,
        ));
    }

    public function receive(
        string $missionGroupName,
        string $missionTaskName,
        ?string $userId = "#{userId}",
    ): ReceiveByUserId {
        return (new ReceiveByUserId(
            $this->namespaceName,
            $missionGroupName,
            $missionTaskName,
            $userId,
        ));
    }

    public function decreaseCounter(
        string $counterName,
        int $value,
        ?string $userId = "#{userId}",
    ): DecreaseCounterByUserId {
        return (new DecreaseCounterByUserId(
            $this->namespaceName,
            $counterName,
            $value,
            $userId,
        ));
    }

    public function verifyComplete(
        string $missionGroupName,
        string $verifyType,
        string $missionTaskName,
        bool $multiplyValueSpecifyingQuantity,
        ?string $userId = "#{userId}",
    ): VerifyCompleteByUserId {
        return (new VerifyCompleteByUserId(
            $this->namespaceName,
            $missionGroupName,
            $verifyType,
            $missionTaskName,
            $multiplyValueSpecifyingQuantity,
            $userId,
        ));
    }

    public function verifyCounterValue(
        string $counterName,
        string $verifyType,
        string $resetType,
        int $value,
        bool $multiplyValueSpecifyingQuantity,
        ?string $userId = "#{userId}",
    ): VerifyCounterValueByUserId {
        return (new VerifyCounterValueByUserId(
            $this->namespaceName,
            $counterName,
            $verifyType,
            $resetType,
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
            ],
        ))->str(
        );
    }
}
