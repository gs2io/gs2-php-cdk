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
namespace Gs2Cdk\Stamina\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Stamina\Ref\StaminaModelRef;
use Gs2Cdk\Stamina\StampSheet\RecoverStaminaByUserId;
use Gs2Cdk\Stamina\StampSheet\RaiseMaxValueByUserId;
use Gs2Cdk\Stamina\StampSheet\SetMaxValueByUserId;
use Gs2Cdk\Stamina\StampSheet\SetRecoverIntervalByUserId;
use Gs2Cdk\Stamina\StampSheet\SetRecoverValueByUserId;
use Gs2Cdk\Stamina\StampSheet\ConsumeStaminaByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function staminaModel(
        string $staminaName,
    ): StaminaModelRef {
        return (new StaminaModelRef(
            $this->namespaceName,
            $staminaName,
        ));
    }

    public function recoverStamina(
        string $staminaName,
        int $recoverValue,
        ?string $userId = "#{userId}",
    ): RecoverStaminaByUserId {
        return (new RecoverStaminaByUserId(
            $this->namespaceName,
            $staminaName,
            $recoverValue,
            $userId,
        ));
    }

    public function raiseMaxValue(
        string $staminaName,
        int $raiseValue,
        ?string $userId = "#{userId}",
    ): RaiseMaxValueByUserId {
        return (new RaiseMaxValueByUserId(
            $this->namespaceName,
            $staminaName,
            $raiseValue,
            $userId,
        ));
    }

    public function setMaxValue(
        string $staminaName,
        int $maxValue,
        ?string $userId = "#{userId}",
    ): SetMaxValueByUserId {
        return (new SetMaxValueByUserId(
            $this->namespaceName,
            $staminaName,
            $maxValue,
            $userId,
        ));
    }

    public function setRecoverInterval(
        string $staminaName,
        int $recoverIntervalMinutes,
        ?string $userId = "#{userId}",
    ): SetRecoverIntervalByUserId {
        return (new SetRecoverIntervalByUserId(
            $this->namespaceName,
            $staminaName,
            $recoverIntervalMinutes,
            $userId,
        ));
    }

    public function setRecoverValue(
        string $staminaName,
        int $recoverValue,
        ?string $userId = "#{userId}",
    ): SetRecoverValueByUserId {
        return (new SetRecoverValueByUserId(
            $this->namespaceName,
            $staminaName,
            $recoverValue,
            $userId,
        ));
    }

    public function consumeStamina(
        string $staminaName,
        int $consumeValue,
        ?string $userId = "#{userId}",
    ): ConsumeStaminaByUserId {
        return (new ConsumeStaminaByUserId(
            $this->namespaceName,
            $staminaName,
            $consumeValue,
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
                "stamina",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
