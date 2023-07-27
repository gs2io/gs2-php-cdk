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

class SubStateMachineTask implements ITask {

    public string $name;
    public string $subStateMachineName;
    public array $inParams;
    public array $outParams;
    public array $events = [];

    public function __construct(string $name, string $subStateMachineName, array $inParams, array $outParams) {
        $this->name = $name;
        $this->subStateMachineName = $subStateMachineName;
        $this->inParams = $inParams;
        $this->outParams = $outParams;
    }

    public function getName(): string {
        return $this->name;
    }

    public function transition(Event $event): self {
        $event->fromTaskName = $this->name;
        $this->events[] = $event;
        return $this;
    }

    public function getEvents(): array {
        return $this->events;
    }

    public function gsl(): string {
        $output = [];
        $output[] = "SubStateMachineTask {$this->name} {";
        $output[] = "    using {$this->name};";

        $inParamPart = [];
        foreach($this->inParams as $inParam) {
            $inParamPart[] = "{$inParam->subStateMachineVariable->getName()} <- {$inParam->currentStateMachineVariable->getName()}";
        }
        $output[] = "    in (" . implode(", ", $inParamPart) . ");";

        $outParamPart = [];
        foreach($this->outParams as $outParam) {
            $outParamPart[] = "{$outParam->subStateMachineVariable->getName()} -> {$outParam->currentStateMachineVariable->getName()}";
        }
        $output[] = "    out (" . implode(", ", $outParamPart) . ");";

        $output[] = "}";
        $output[] = "";

        return implode("\n", $output);
    }

    public function mermaid(): string {
        return str_replace("{name}", $this->name, "{$this->name}_{name}[/{name}/]\n");
    }
}
