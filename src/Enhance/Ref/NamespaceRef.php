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
namespace Gs2Cdk\Enhance\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Enhance\Ref\RateModelRef;
use Gs2Cdk\Enhance\StampSheet\CreateProgressByUserId;
use Gs2Cdk\Enhance\Model\Material;
use Gs2Cdk\Enhance\StampSheet\DeleteProgressByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function rateModel(
        string $rateName,
    ): RateModelRef {
        return (new RateModelRef(
            $this->namespaceName,
            $rateName,
        ));
    }

    public function createProgress(
        string $rateName,
        string $targetItemSetId,
        bool $force,
        ?array $materials = null,
        ?string $userId = "#{userId}",
    ): CreateProgressByUserId {
        return (new CreateProgressByUserId(
            $this->namespaceName,
            $rateName,
            $targetItemSetId,
            $force,
            $materials,
            $userId,
        ));
    }

    public function deleteProgress(
        ?string $userId = "#{userId}",
    ): DeleteProgressByUserId {
        return (new DeleteProgressByUserId(
            $this->namespaceName,
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
                "enhance",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
