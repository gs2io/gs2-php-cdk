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
namespace Gs2Cdk\Quest\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Quest\Ref\QuestGroupModelRef;
use Gs2Cdk\Quest\Ref\MasterDataObjectRef;
use Gs2Cdk\Quest\StampSheet\CreateProgressByUserId;
use Gs2Cdk\Quest\Model\Array;
use Gs2Cdk\Quest\StampSheet\DeleteProgressByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function questGroupModel(
        string $questGroupName,
    ): QuestGroupModelRef {
        return (new QuestGroupModelRef(
            $this->namespaceName,
            $questGroupName,
        ));
    }

    public function createProgress(
        string $questModelId,
        bool $force,
        ?array $config = null,
        ?string $userId = "#{userId}",
    ): CreateProgressByUserId {
        return (new CreateProgressByUserId(
            $this->namespaceName,
            $questModelId,
            $force,
            $config,
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
                "quest",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
