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
 *
 * deny overwrite
 */

namespace Gs2Cdk\Identifier\Resource;


use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Identifier\Ref\PasswordRef;

class Password extends CdkResource {

    public Stack $stack;
    public string $userName;
    public string $password;

    public function __construct(
            Stack $stack,
            string $userName,
            string $password
    ) {
        parent::__construct("Identifier_Password_" . name);

        $this->stack = $stack;
        $this->userName = $userName;
        $this->password = $password;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Identifier::Password";
    }

    public function properties(): array {
        $properties = [];
        if ($this->userName != null) {
            $properties["UserName"] = $this->userName;
        }
        if ($this->password != null) {
            $properties["Password"] = $this->password;
        }
        return $properties;
    }

    public function ref(
    ): PasswordRef {
        return new PasswordRef(
            userName: userName,
        );
    }

    public function getAttrUserId(): GetAttr {
        return new GetAttr(
            "Item.UserId"
        );
    }
}
