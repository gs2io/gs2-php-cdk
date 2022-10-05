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

namespace Gs2Cdk\Deploy\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;

class StackRef {
    public String $stackName;

    public function __construct(
            String $stackName,
    ) {
        $this->stackName = $stackName;
    }

    public function event(
            String $eventName,
    ): EventRef {
        return new EventRef(
            stackName: $this->stackName,
            eventName: $eventName,
        );
    }

    public function output(
            String $outputName,
    ): OutputRef {
        return new OutputRef(
            stackName: $this->stackName,
            outputName: $outputName,
        );
    }

    public function resource(
            String $resourceName,
    ): ResourceRef {
        return new ResourceRef(
            stackName: $this->stackName,
            resourceName: $resourceName,
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
                "stack",
                $this->stackName
            ]
        ))->str();
    }
}
