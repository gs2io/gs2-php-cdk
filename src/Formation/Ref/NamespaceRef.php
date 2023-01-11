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
use Gs2Cdk\Formation\Ref\MoldModelRef;
use Gs2Cdk\Formation\StampSheet\AddMoldCapacityByUserId;
use Gs2Cdk\Formation\StampSheet\SetMoldCapacityByUserId;
use Gs2Cdk\Formation\StampSheet\AcquireActionsToFormProperties;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Formation\Model\AcquireActionConfig;
use Gs2Cdk\Formation\StampSheet\AcquireActionsToPropertyFormProperties;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function formModel(
        string $formModelName,
    ): FormModelRef {
        return (new FormModelRef(
            $this->namespaceName,
            $formModelName,
        ));
    }

    public function moldModel(
        string $moldName,
    ): MoldModelRef {
        return (new MoldModelRef(
            $this->namespaceName,
            $moldName,
        ));
    }

    public function addMoldCapacity(
        string $moldName,
        int $capacity,
        ?string $userId = "#{userId}",
    ): AddMoldCapacityByUserId {
        return (new AddMoldCapacityByUserId(
            $this->namespaceName,
            $moldName,
            $capacity,
            $userId,
        ));
    }

    public function setMoldCapacity(
        string $moldName,
        int $capacity,
        ?string $userId = "#{userId}",
    ): SetMoldCapacityByUserId {
        return (new SetMoldCapacityByUserId(
            $this->namespaceName,
            $moldName,
            $capacity,
            $userId,
        ));
    }

    public function acquireActionsToFormProperties(
        string $moldName,
        int $index,
        AcquireAction $acquireAction,
        ?array $config = null,
        ?string $userId = "#{userId}",
    ): AcquireActionsToFormProperties {
        return (new AcquireActionsToFormProperties(
            $this->namespaceName,
            $moldName,
            $index,
            $acquireAction,
            $config,
            $userId,
        ));
    }

    public function acquireActionsToPropertyFormProperties(
        string $formModelName,
        string $propertyId,
        AcquireAction $acquireAction,
        ?array $config = null,
        ?string $userId = "#{userId}",
    ): AcquireActionsToPropertyFormProperties {
        return (new AcquireActionsToPropertyFormProperties(
            $this->namespaceName,
            $formModelName,
            $propertyId,
            $acquireAction,
            $config,
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
            ],
        ))->str(
        );
    }
}
