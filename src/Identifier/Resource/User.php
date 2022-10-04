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


use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Identifier\Ref\UserRef;

class User extends CdkResource {

    public Stack $stack;
    public string $name;
    public ?string $description;

    public function __construct(
            Stack $stack,
            string $name,
            string $description = null,
    ) {
        parent::__construct("Identifier_User_" . $name);

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $description;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Identifier::User";
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        return $properties;
    }

    public function ref(
    ): UserRef {
        return new UserRef(
            userName: $this->name,
        );
    }

    public function attach(
        SecurityPolicy $securityPolicy
    ): User {
        (new AttachSecurityPolicy(
            $this->stack,
            $this->name,
            $securityPolicy->getAttrSecurityPolicyId()->str()
        ))->addDependsOn(
            $this
        )->addDependsOn(
            $securityPolicy
        );
        return $this;
    }

    public function identifier(): Identifier {
        return (new Identifier(
            $this->stack,
            $this->name,
        ))->addDependsOn(
            $this
        );
    }

    public function getAttrUserId(): GetAttr {
        return new GetAttr(
            "Item.UserId"
        );
    }
}
