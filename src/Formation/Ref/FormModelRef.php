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
use Gs2Cdk\Formation\StampSheet\AcquireActionsToFormProperties;

class FormModelRef {
    public String $namespaceName;
    public String $formModelName;

    public function __construct(
            String $namespaceName,
            String $formModelName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->formModelName = $formModelName;
    }

    public function acquireActionsToFormProperties(
            string $moldName,
            int $index,
            AcquireAction $acquireAction,
            array $config = null,
            string $userId = '#{userId}',
    ): AcquireActionsToFormProperties {
        return new AcquireActionsToFormProperties(
            namespaceName: $this->namespaceName,
            userId: $userId,
            moldName: $moldName,
            index: $index,
            acquireAction: $acquireAction,
            config: $config,
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
                "form",
                $this->formModelName
            ]
        ))->str();
    }
}
