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
 *
 * deny overwrite
 */
namespace Gs2Cdk\Identifier\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;

use Gs2Cdk\Guard\Model\Namespace_;
use Gs2Cdk\Identifier\Ref\IdentifierRef;

use Gs2Cdk\Identifier\Model\Options\IdentifierOptions;

class Identifier extends CdkResource {
    private Stack $stack;
    private string $userName;

    public function __construct(
        Stack $stack,
        string $userName,
        ?IdentifierOptions $options = null,
    ) {
        parent::__construct(
            "Identifier_Identifier_" . $userName
        );

        $this->stack = $stack;
        $this->userName = $userName;
        $stack->addResource(
            $this,
        );
    }


    public function alternateKeys(
    ) {
        return "userName";
    }

    public function resourceType(
    ): string {
        return "GS2::Identifier::Identifier";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->userName != null) {
            $properties["UserName"] = $this->userName;
        }

        return $properties;
    }

    public function ref(
        string $clientId,
    ): IdentifierRef {
        return (new IdentifierRef(
            $this->userName,
            $clientId,
        ));
    }

    public function attach(
        Namespace_ $guardNamespace,
    ): User {
        (new AttachGuard(
            $this->stack,
            $this->userName,
            $this->getAttrClientId(
            )->str(
            ),
            $guardNamespace->getAttrNamespaceId(
            )->str(
            ),
        ))->addDependsOn(
            $this,
        )->addDependsOn(
            $guardNamespace,
        );

        return $this;
    }

    public function attachGrn(
        string $guardNamespaceGrn,
    ): User {
        (new AttachGuard(
            $this->stack,
            $this->userName,
            $this->getAttrClientId(
            )->str(
            ),
            $guardNamespaceGrn,
        ))->addDependsOn(
            $this,
        );

        return $this;
    }

    public function getAttrClientId(
    ): GetAttr {
        return (new GetAttr(
            $this,
            "Item.ClientId",
            null,
        ));
    }


    public function getAttrClientSecret(
    ): GetAttr {
        return (new GetAttr(
            $this,
            "ClientSecret",
            null,
        ));
    }
}
