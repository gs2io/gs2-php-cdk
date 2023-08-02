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
namespace Gs2Cdk\Experience\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Experience\Ref\ExperienceModelRef;
use Gs2Cdk\Experience\StampSheet\AddExperienceByUserId;
use Gs2Cdk\Experience\StampSheet\AddRankCapByUserId;
use Gs2Cdk\Experience\StampSheet\SetRankCapByUserId;
use Gs2Cdk\Experience\StampSheet\MultiplyAcquireActionsByUserId;
use Gs2Cdk\Experience\Model\Array;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function experienceModel(
        string $experienceName,
    ): ExperienceModelRef {
        return (new ExperienceModelRef(
            $this->namespaceName,
            $experienceName,
        ));
    }

    public function addExperience(
        string $experienceName,
        string $propertyId,
        int $experienceValue,
        ?string $userId = "#{userId}",
    ): AddExperienceByUserId {
        return (new AddExperienceByUserId(
            $this->namespaceName,
            $experienceName,
            $propertyId,
            $experienceValue,
            $userId,
        ));
    }

    public function addRankCap(
        string $experienceName,
        string $propertyId,
        int $rankCapValue,
        ?string $userId = "#{userId}",
    ): AddRankCapByUserId {
        return (new AddRankCapByUserId(
            $this->namespaceName,
            $experienceName,
            $propertyId,
            $rankCapValue,
            $userId,
        ));
    }

    public function setRankCap(
        string $experienceName,
        string $propertyId,
        int $rankCapValue,
        ?string $userId = "#{userId}",
    ): SetRankCapByUserId {
        return (new SetRankCapByUserId(
            $this->namespaceName,
            $experienceName,
            $propertyId,
            $rankCapValue,
            $userId,
        ));
    }

    public function multiplyAcquireActions(
        string $experienceName,
        string $propertyId,
        string $rateName,
        ?array $acquireActions = null,
        ?string $userId = "#{userId}",
    ): MultiplyAcquireActionsByUserId {
        return (new MultiplyAcquireActionsByUserId(
            $this->namespaceName,
            $experienceName,
            $propertyId,
            $rateName,
            $acquireActions,
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
                "experience",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
