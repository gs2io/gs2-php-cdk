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

namespace Gs2Cdk\Experience\StampSheet;

use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;


class SetRankCapByUserId extends AcquireAction {

    public function __construct(
            string $namespaceName,
            string $experienceName,
            string $propertyId,
            int $rankCapValue,
            string $userId = '#{userId}',
    ) {
        $properties = [];
        if ($namespaceName != null) {
            $properties["namespaceName"] = $namespaceName;
        }
        if ($userId != null) {
            $properties["userId"] = $userId;
        }
        if ($experienceName != null) {
            $properties["experienceName"] = $experienceName;
        }
        if ($propertyId != null) {
            $properties["propertyId"] = $propertyId;
        }
        if ($rankCapValue != null) {
            $properties["rankCapValue"] = $rankCapValue;
        }
        parent::__construct(
            "Gs2Experience:SetRankCapByUserId",
            $properties,
        );
    }
}
