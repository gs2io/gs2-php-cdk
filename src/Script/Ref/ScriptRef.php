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
namespace Gs2Cdk\Script\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Script\StampSheet\InvokeScript;
use Gs2Cdk\Script\Model\RandomStatus;

class ScriptRef {
    private string $namespaceName;
    private string $scriptName;

    public function __construct(
        string $namespaceName,
        string $scriptName,
    ) {
        $this->namespaceName = $namespaceName;
        $this->scriptName = $scriptName;
    }

    public function invokeScript(
        string $scriptId,
        string $args,
        ?RandomStatus $randomStatus = null,
        ?string $userId = "#{userId}",
    ): InvokeScript {
        return (new InvokeScript(
            $scriptId,
            $args,
            $randomStatus,
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
                "script",
                $this->namespaceName,
                "script",
                $this->scriptName,
            ],
        ))->str(
        );
    }
}
