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

namespace Gs2Cdk\Quest\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;

class QuestGroupModelMasterRef {
    public String $namespaceName;
    public String $questGroupName;

    public function __construct(
            String $namespaceName,
            String $questGroupName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->questGroupName = $questGroupName;
    }

    public function questModelMaster(
            String $questName,
    ): QuestModelMasterRef {
        return new QuestModelMasterRef(
            namespaceName: $this->namespaceName,
            questGroupName: $this->questGroupName,
            questName: $questName,
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
                "quest",
                $this->namespaceName,
                "group",
                $this->questGroupName
            ]
        ))->str();
    }
}
