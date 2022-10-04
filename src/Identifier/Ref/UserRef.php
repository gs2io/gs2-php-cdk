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

namespace Gs2Cdk\Identifier\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;

class UserRef {
    public String $userName;

    public function __construct(
            String $userName,
    ) {
        $this->userName = $userName;
    }

    public function identifier(
            String $userName,
    ): IdentifierRef {
        return new IdentifierRef(
            userName: $this->userName,
            userName: $userName,
        );
    }

    public function grn(): String {
        return (new Join(
            ":",
            [
                "grn",
                "gs2",
                "",
                GetAttr::ownerId()->str(),
                "identifier",
                "user",
                $this->userName
            ]
        ))->str();
    }
}
