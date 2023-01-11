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
namespace Gs2Cdk\Script\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;

use Gs2Cdk\Script\Ref\ScriptRef;

use Gs2Cdk\Script\Model\Options\ScriptOptions;

class Script extends CdkResource {
    private Stack $stack;
    private string $namespaceName;
    private string $name;
    private string $script;
    private ?string $description = null;

    public function __construct(
        Stack $stack,
        string $namespaceName,
        string $name,
        string $script,
        ?ScriptOptions $options = null,
    ) {
        parent::__construct(
            "Script_Script_" . $name
        );

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->name = $name;
        $this->script = $script;
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
        return "GS2::Script::Script";
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
        if ($this->script != null) {
            $properties["Script"] = $this->script;
        }

        return $properties;
    }

    public function ref(
    ): ScriptRef {
        return (new ScriptRef(
            $this->namespaceName,
            $this->name,
        ));
    }

    public function getAttrScriptId(
    ): GetAttr {
        return (new GetAttr(
            null,
            null,
            "Item.ScriptId",
        ));
    }
}
