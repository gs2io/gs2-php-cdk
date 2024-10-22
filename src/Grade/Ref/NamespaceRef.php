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
namespace Gs2Cdk\Grade\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Grade\Ref\GradeModelRef;
use Gs2Cdk\Grade\Ref\MasterDataObjectRef;
use Gs2Cdk\Grade\StampSheet\AddGradeByUserId;
use Gs2Cdk\Grade\StampSheet\ApplyRankCapByUserId;
use Gs2Cdk\Grade\StampSheet\MultiplyAcquireActionsByUserId;
use Gs2Cdk\Grade\Model\Array;
use Gs2Cdk\Grade\StampSheet\SubGradeByUserId;
use Gs2Cdk\Grade\StampSheet\VerifyGradeByUserId;
use Gs2Cdk\Grade\StampSheet\VerifyGradeUpMaterialByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function gradeModel(
        string $gradeName,
    ): GradeModelRef {
        return (new GradeModelRef(
            $this->namespaceName,
            $gradeName,
        ));
    }

    public function addGrade(
        string $gradeName,
        string $propertyId,
        int $gradeValue,
        ?string $userId = "#{userId}",
    ): AddGradeByUserId {
        return (new AddGradeByUserId(
            $this->namespaceName,
            $gradeName,
            $propertyId,
            $gradeValue,
            $userId,
        ));
    }

    public function applyRankCap(
        string $gradeName,
        string $propertyId,
        ?string $userId = "#{userId}",
    ): ApplyRankCapByUserId {
        return (new ApplyRankCapByUserId(
            $this->namespaceName,
            $gradeName,
            $propertyId,
            $userId,
        ));
    }

    public function multiplyAcquireActions(
        string $gradeName,
        string $propertyId,
        string $rateName,
        ?array $acquireActions = null,
        ?string $userId = "#{userId}",
    ): MultiplyAcquireActionsByUserId {
        return (new MultiplyAcquireActionsByUserId(
            $this->namespaceName,
            $gradeName,
            $propertyId,
            $rateName,
            $acquireActions,
            $userId,
        ));
    }

    public function subGrade(
        string $gradeName,
        string $propertyId,
        int $gradeValue,
        ?string $userId = "#{userId}",
    ): SubGradeByUserId {
        return (new SubGradeByUserId(
            $this->namespaceName,
            $gradeName,
            $propertyId,
            $gradeValue,
            $userId,
        ));
    }

    public function verifyGrade(
        string $gradeName,
        string $verifyType,
        string $propertyId,
        int $gradeValue,
        bool $multiplyValueSpecifyingQuantity,
        ?string $userId = "#{userId}",
    ): VerifyGradeByUserId {
        return (new VerifyGradeByUserId(
            $this->namespaceName,
            $gradeName,
            $verifyType,
            $propertyId,
            $gradeValue,
            $multiplyValueSpecifyingQuantity,
            $userId,
        ));
    }

    public function verifyGradeUpMaterial(
        string $gradeName,
        string $verifyType,
        string $propertyId,
        string $materialPropertyId,
        ?string $userId = "#{userId}",
    ): VerifyGradeUpMaterialByUserId {
        return (new VerifyGradeUpMaterialByUserId(
            $this->namespaceName,
            $gradeName,
            $verifyType,
            $propertyId,
            $materialPropertyId,
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
                "grade",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
