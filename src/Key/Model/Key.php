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
namespace Gs2Cdk\Key\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;

use Gs2Cdk\Key\Ref\KeyRef;

use Gs2Cdk\Key\Model\Options\KeyOptions;

class Key extends CdkResource {
    private Stack $stack;
    private string $namespaceName;
    private string $name;
    private ?string $description = null;

    public function __construct(
        Stack $stack,
        string $namespaceName,
        string $name,
        ?KeyOptions $options = null,
    ) {
        parent::__construct(
            "Key_Key_" . $name
        );

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
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
        return "GS2::Key::Key";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }

        return $properties;
    }

    public function ref(
    ): KeyRef {
        return (new KeyRef(
            $this->namespaceName,
            $this->name,
        ));
    }

    public function getAttrKeyId(
    ): GetAttr {
        return (new GetAttr(
            $this,
            "Item.KeyId",
            null,
        ));
    }
}
