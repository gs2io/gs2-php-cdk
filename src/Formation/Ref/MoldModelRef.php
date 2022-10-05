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

namespace Gs2Cdk\Formation\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Formation\StampSheet\AddMoldCapacityByUserId;
use Gs2Cdk\Formation\StampSheet\SetMoldCapacityByUserId;

class MoldModelRef {
    public String $namespaceName;
    public String $moldName;

    public function __construct(
            String $namespaceName,
            String $moldName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->moldName = $moldName;
    }

    public function addMoldCapacity(
            int $capacity,
            string $userId = '#{userId}',
    ): AddMoldCapacityByUserId {
        return new AddMoldCapacityByUserId(
            namespaceName: $this->namespaceName,
            userId: $userId,
            moldName: $this->moldName,
            capacity: $capacity,
        );
    }

    public function setMoldCapacity(
            int $capacity,
            string $userId = '#{userId}',
    ): SetMoldCapacityByUserId {
        return new SetMoldCapacityByUserId(
            namespaceName: $this->namespaceName,
            userId: $userId,
            moldName: $this->moldName,
            capacity: $capacity,
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
                "formation",
                $this->namespaceName,
                "model",
                "mold",
                $this->moldName
            ]
        ))->str();
    }
}
