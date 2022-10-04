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

namespace Gs2Cdk\Stamina\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Stamina\StampSheet\RecoverStaminaByUserId;
use Gs2Cdk\Stamina\StampSheet\RaiseMaxValueByUserId;
use Gs2Cdk\Stamina\StampSheet\SetMaxValueByUserId;
use Gs2Cdk\Stamina\StampSheet\SetRecoverIntervalByUserId;
use Gs2Cdk\Stamina\StampSheet\SetRecoverValueByUserId;
use Gs2Cdk\Stamina\StampSheet\ConsumeStaminaByUserId;

class StaminaModelRef {
    public String $namespaceName;
    public String $staminaName;

    public function __construct(
            String $namespaceName,
            String $staminaName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->staminaName = $staminaName;
    }

    public function recoverStamina(
            int $recoverValue,
            string $userId = '#{userId}',
    ): RecoverStaminaByUserId {
        return new RecoverStaminaByUserId(
            namespaceName: $this->namespaceName,
            staminaName: $this->staminaName,
            userId: $userId,
            recoverValue: $recoverValue,
        );
    }

    public function raiseMaxValue(
            int $raiseValue,
            string $userId = '#{userId}',
    ): RaiseMaxValueByUserId {
        return new RaiseMaxValueByUserId(
            namespaceName: $this->namespaceName,
            staminaName: $this->staminaName,
            userId: $userId,
            raiseValue: $raiseValue,
        );
    }

    public function setMaxValue(
            int $maxValue,
            string $userId = '#{userId}',
    ): SetMaxValueByUserId {
        return new SetMaxValueByUserId(
            namespaceName: $this->namespaceName,
            staminaName: $this->staminaName,
            userId: $userId,
            maxValue: $maxValue,
        );
    }

    public function setRecoverInterval(
            int $recoverIntervalMinutes,
            string $userId = '#{userId}',
    ): SetRecoverIntervalByUserId {
        return new SetRecoverIntervalByUserId(
            namespaceName: $this->namespaceName,
            staminaName: $this->staminaName,
            userId: $userId,
            recoverIntervalMinutes: $recoverIntervalMinutes,
        );
    }

    public function setRecoverValue(
            int $recoverValue,
            string $userId = '#{userId}',
    ): SetRecoverValueByUserId {
        return new SetRecoverValueByUserId(
            namespaceName: $this->namespaceName,
            staminaName: $this->staminaName,
            userId: $userId,
            recoverValue: $recoverValue,
        );
    }

    public function consumeStamina(
            int $consumeValue,
            string $userId = '#{userId}',
    ): ConsumeStaminaByUserId {
        return new ConsumeStaminaByUserId(
            namespaceName: $this->namespaceName,
            staminaName: $this->staminaName,
            userId: $userId,
            consumeValue: $consumeValue,
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
                "stamina",
                $this->namespaceName,
                "model",
                $this->staminaName
            ]
        ))->str();
    }
}
