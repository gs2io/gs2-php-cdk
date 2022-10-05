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


use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Identifier\Ref\IdentifierRef;

class Identifier extends CdkResource {

    public Stack $stack;
    public string $userName;

    public function __construct(
        Stack $stack,
        string $userName
    ) {
        parent::__construct("Identifier_Identifier_");

        $this->stack = $stack;
        $this->userName = $userName;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Identifier::Identifier";
    }

    public function properties(): array {
        $properties = [];
        if ($this->userName != null) {
            $properties["UserName"] = $this->userName;
        }
        return $properties;
    }

    public function ref(
        String $userName,
    ): IdentifierRef {
        return new IdentifierRef(
            userName: userName,
        );
    }

    public static function AdministratorAccessGrn(): String {
        return "grn:gs2::system:identifier:securityPolicy:AdministratorAccess";
    }

    public static function ApplicationAccessGrn(): String {
        return "grn:gs2::system:identifier:securityPolicy:ApplicationAccess";
    }

    public function getAttrClientId(): GetAttr {
        return new GetAttr(
            key: "Item.ClientId"
        );
    }

    public function getAttrClientSecret(): GetAttr {
        return new GetAttr(
            key: "ClientSecret"
        );
    }
}
