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

namespace Gs2Cdk\StateMachine\Integration;

class PassTask implements ITask {
    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function transition(Event $event): ITask {
        return $this;
    }

    public function getEvents(): array {
        return [];
    }

    public function gsl(): string {
        return "PassTask Pass;\n\n";
    }

    public function mermaid(): string {
        return sprintf("{stateMachineName}_%s[%s/]\n", $this->name, $this->name);
    }
}
