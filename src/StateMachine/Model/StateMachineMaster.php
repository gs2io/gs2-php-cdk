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
namespace Gs2Cdk\StateMachine\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;

use Gs2Cdk\StateMachine\Ref\StateMachineMasterRef;

use Gs2Cdk\StateMachine\Model\Options\StateMachineMasterOptions;

class StateMachineMaster extends CdkResource {
    private Stack $stack;
    private string $namespaceName;
    private string $mainStateMachineName;
    private string $payload;

    public function __construct(
        Stack $stack,
        string $namespaceName,
        string $mainStateMachineName,
        string $payload,
        ?StateMachineMasterOptions $options = null,
    ) {
        parent::__construct(
            "StateMachine_StateMachineMaster_" . $namespaceName
        );

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->mainStateMachineName = $mainStateMachineName;
        $this->payload = $payload;
        $stack->addResource(
            $this,
        );
    }


    public function alternateKeys(
    ) {
        return "version";
    }

    public function resourceType(
    ): string {
        return "GS2::StateMachine::StateMachineMaster";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->mainStateMachineName != null) {
            $properties["MainStateMachineName"] = $this->mainStateMachineName;
        }
        if ($this->payload != null) {
            $properties["Payload"] = $this->payload;
        }

        return $properties;
    }

    public function ref(
        int $version,
    ): StateMachineMasterRef {
        return (new StateMachineMasterRef(
            $this->namespaceName,
            $version,
        ));
    }

    public function getAttrStateMachineId(
    ): GetAttr {
        return (new GetAttr(
            null,
            null,
            "Item.StateMachineId",
        ));
    }
}
