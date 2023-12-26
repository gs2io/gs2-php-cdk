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
namespace Gs2Cdk\Grade\StampSheet;

use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class VerifyGradeUpMaterialByUserId extends ConsumeAction {

    public function __construct(
        string $namespaceName,
        string $gradeName,
        string $verifyType,
        string $propertyId,
        string $materialPropertyId,
        ?string $userId = "#{userId}",
    ) {
        $properties = [];

        $properties["namespaceName"] = $namespaceName;
        $properties["gradeName"] = $gradeName;
        $properties["verifyType"] = $verifyType;
        $properties["propertyId"] = $propertyId;
        $properties["materialPropertyId"] = $materialPropertyId;
        $properties["userId"] = $userId;

        parent::__construct(
            "Gs2Grade:VerifyGradeUpMaterialByUserId",
            $properties,
        );
    }
}
