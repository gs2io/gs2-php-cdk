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
namespace Gs2Cdk\Formation\StampSheet;

use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\VerifyAction;

class VerifyFormByUserId extends VerifyAction {

    public function __construct(
        string $namespaceName,
        string $moldModelName,
        int $index,
        string $propertyIdRegex,
        string $verifyType,
        int $count,
        ?string $slotName = null,
        ?string $countType = null,
        ?string $userId = "#{userId}",
    ) {
        $properties = [];

        $properties["namespaceName"] = $namespaceName;
        $properties["moldModelName"] = $moldModelName;
        $properties["index"] = $index;
        $properties["propertyIdRegex"] = $propertyIdRegex;
        $properties["verifyType"] = $verifyType;
        $properties["count"] = $count;
        $properties["slotName"] = $slotName;
        $properties["countType"] = $countType;
        $properties["userId"] = $userId;

        parent::__construct(
            "Gs2Formation:VerifyFormByUserId",
            $properties,
        );
    }
}
