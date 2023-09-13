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
namespace Gs2Cdk\Identifier\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Identifier\Model\Identifier;
use Gs2Cdk\Identifier\Model\AttachSecurityPolicy;
use Gs2Cdk\Identifier\Model\SecurityPolicy;

use Gs2Cdk\Identifier\Ref\UserRef;

use Gs2Cdk\Identifier\Model\Options\UserOptions;

class User extends CdkResource {
    private Stack $stack;
    private string $name;
    private ?string $description = null;

    public function __construct(
        Stack $stack,
        string $name,
        ?UserOptions $options = null,
    ) {
        parent::__construct(
            "Identifier_User_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $options?->description ?? null;
        $stack->addResource(
            $this,
        );
    }


    public function alternateKeys(
    ) {
        return "name";
    }

    public function resourceType(
    ): string {
        return "GS2::Identifier::User";
    }

    public function properties(
    ): array {
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
        return (new UserRef(
            $this->name,
        ));
    }


    public function attach(
        SecurityPolicy $securityPolicy,
    ): User {
        (new AttachSecurityPolicy(
            $this->stack,
            $this->name,
            $securityPolicy->getAttrSecurityPolicyId(
            )->str(
            ),
        ))->addDependsOn(
            $this,
        )->addDependsOn(
            $securityPolicy,
        );

        return $this;
    }

    public function attachGrn(
        string $securityPolicyGrn,
    ): User {
        (new AttachSecurityPolicy(
            $this->stack,
            $this->name,
            $securityPolicyGrn,
        ))->addDependsOn(
            $this,
        );

        return $this;
    }

    public function identifier(
    ): Identifier {
        $identifier = (new Identifier(
            $this->stack,
            $this->name,
        ));
        $identifier->addDependsOn(
            $this,
        );

        return $identifier;
    }

    public function getAttrUserId(
    ): GetAttr {
        return (new GetAttr(
            $this,
            "Item.UserId",
            null,
        ));
    }
}
