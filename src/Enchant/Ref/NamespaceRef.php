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
namespace Gs2Cdk\Enchant\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Enchant\Ref\BalanceParameterModelRef;
use Gs2Cdk\Enchant\Ref\RarityParameterModelRef;
use Gs2Cdk\Enchant\StampSheet\ReDrawBalanceParameterStatusByUserId;
use Gs2Cdk\Enchant\StampSheet\SetBalanceParameterStatusByUserId;
use Gs2Cdk\Enchant\StampSheet\ReDrawRarityParameterStatusByUserId;
use Gs2Cdk\Enchant\StampSheet\AddRarityParameterStatusByUserId;
use Gs2Cdk\Enchant\StampSheet\SetRarityParameterStatusByUserId;
use Gs2Cdk\Enchant\StampSheet\VerifyRarityParameterStatusByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function balanceParameterModel(
        string $parameterName,
    ): BalanceParameterModelRef {
        return (new BalanceParameterModelRef(
            $this->namespaceName,
            $parameterName,
        ));
    }

    public function rarityParameterModel(
        string $parameterName,
    ): RarityParameterModelRef {
        return (new RarityParameterModelRef(
            $this->namespaceName,
            $parameterName,
        ));
    }

    public function reDrawBalanceParameterStatus(
        string $parameterName,
        string $propertyId,
        ?array $fixedParameterNames = null,
        ?string $userId = "#{userId}",
    ): ReDrawBalanceParameterStatusByUserId {
        return (new ReDrawBalanceParameterStatusByUserId(
            $this->namespaceName,
            $parameterName,
            $propertyId,
            $fixedParameterNames,
            $userId,
        ));
    }

    public function setBalanceParameterStatus(
        string $parameterName,
        string $propertyId,
        array $parameterValues,
        ?string $userId = "#{userId}",
    ): SetBalanceParameterStatusByUserId {
        return (new SetBalanceParameterStatusByUserId(
            $this->namespaceName,
            $parameterName,
            $propertyId,
            $parameterValues,
            $userId,
        ));
    }

    public function reDrawRarityParameterStatus(
        string $parameterName,
        string $propertyId,
        ?array $fixedParameterNames = null,
        ?string $userId = "#{userId}",
    ): ReDrawRarityParameterStatusByUserId {
        return (new ReDrawRarityParameterStatusByUserId(
            $this->namespaceName,
            $parameterName,
            $propertyId,
            $fixedParameterNames,
            $userId,
        ));
    }

    public function addRarityParameterStatus(
        string $parameterName,
        string $propertyId,
        int $count,
        ?string $userId = "#{userId}",
    ): AddRarityParameterStatusByUserId {
        return (new AddRarityParameterStatusByUserId(
            $this->namespaceName,
            $parameterName,
            $propertyId,
            $count,
            $userId,
        ));
    }

    public function setRarityParameterStatus(
        string $parameterName,
        string $propertyId,
        ?array $parameterValues = null,
        ?string $userId = "#{userId}",
    ): SetRarityParameterStatusByUserId {
        return (new SetRarityParameterStatusByUserId(
            $this->namespaceName,
            $parameterName,
            $propertyId,
            $parameterValues,
            $userId,
        ));
    }

    public function verifyRarityParameterStatus(
        string $parameterName,
        string $propertyId,
        string $verifyType,
        string $parameterValueName,
        int $parameterCount,
        bool $multiplyValueSpecifyingQuantity,
        ?string $userId = "#{userId}",
    ): VerifyRarityParameterStatusByUserId {
        return (new VerifyRarityParameterStatusByUserId(
            $this->namespaceName,
            $parameterName,
            $propertyId,
            $verifyType,
            $parameterValueName,
            $parameterCount,
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
                "enchant",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
