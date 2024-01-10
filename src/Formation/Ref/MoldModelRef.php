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
namespace Gs2Cdk\Formation\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Formation\Ref\FormModelRef;
use Gs2Cdk\Formation\StampSheet\AddMoldCapacityByUserId;
use Gs2Cdk\Formation\StampSheet\SetMoldCapacityByUserId;
use Gs2Cdk\Formation\StampSheet\AcquireActionsToFormProperties;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Formation\Model\Array;
use Gs2Cdk\Formation\StampSheet\SubMoldCapacityByUserId;

class MoldModelRef {
    private string $namespaceName;
    private string $moldModelName;

    public function __construct(
        string $namespaceName,
        string $moldModelName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->moldModelName = $moldModelName;
    }

    public function formModel(
    ): FormModelRef {
        return (new FormModelRef(
            $this->namespaceName,
            $this->moldModelName,
        ));
    }

    public function addMoldCapacity(
        int $capacity,
        ?string $userId = "#{userId}",
    ): AddMoldCapacityByUserId {
        return (new AddMoldCapacityByUserId(
            $this->namespaceName,
            $this->moldModelName,
            $capacity,
            $userId,
        ));
    }

    public function setMoldCapacity(
        int $capacity,
        ?string $userId = "#{userId}",
    ): SetMoldCapacityByUserId {
        return (new SetMoldCapacityByUserId(
            $this->namespaceName,
            $this->moldModelName,
            $capacity,
            $userId,
        ));
    }

    public function acquireActionsToFormProperties(
        int $index,
        AcquireAction $acquireAction,
        ?array $config = null,
        ?string $userId = "#{userId}",
    ): AcquireActionsToFormProperties {
        return (new AcquireActionsToFormProperties(
            $this->namespaceName,
            $this->moldModelName,
            $index,
            $acquireAction,
            $config,
            $userId,
        ));
    }

    public function subMoldCapacity(
        int $capacity,
        ?string $userId = "#{userId}",
    ): SubMoldCapacityByUserId {
        return (new SubMoldCapacityByUserId(
            $this->namespaceName,
            $this->moldModelName,
            $capacity,
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
                "formation",
                $this->namespaceName,
                "model",
                "mold",
                $this->moldModelName,
            ],
        ))->str(
        );
    }
}
