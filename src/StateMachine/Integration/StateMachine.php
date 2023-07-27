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

class StateMachine {
    private $name;
    private $variables;
    private $tasks;
    private $entryPointValue;
    private $stateMachineDefinition;

    public function __construct(
        StateMachineDefinition $stateMachineDefinition,
        string $name,
        array $variables
    ) {
        $this->stateMachineDefinition = $stateMachineDefinition;
        $this->name = $name;
        $this->variables = $variables;
        $this->tasks = [];
        $stateMachineDefinition->add($this);
    }

    public function task(...$args) {
        array_push($this->tasks, ...$args);
        return $this;
    }

    public function entryPoint(string $taskName) {
        $this->entryPointValue = $taskName;
        return $this;
    }

    public function scripts() {
        $scripts = [];
        foreach ($this->tasks as $task) {
            if ($task instanceof Task) {
                $script = $task->scriptPayload();
                $script->name = $this->name . "_" . $script->name;
                $scripts[] = $script;
            }
        }
        return $scripts;
    }

    public function gsl() {
        $output = "StateMachine " . $this->name . " {\n";

        if ($this->variables && count($this->variables) > 0) {
            $variablesPart = "Variables {\n";
            foreach ($this->variables as $variable) {
                $variablesPart .= "    " . $variable->gsl() . ";\n";
            }
            $variablesPart .= "}\n\n";
            $output .= $variablesPart;
        }

        if ($this->entryPointValue) {
            $output .= "  EntryPoint " . $this->entryPointValue . ";\n\n";
        }

        foreach ($this->tasks as $task) {
            $output .= "  " . $task->gsl();
        }

        foreach ($this->tasks as $task) {
            foreach ($task->getEvents() as $event) {
                $output .= "  " . $event->gsl();
            }
        }

        $output .= "}\n";
        $result = str_replace("{stateMachineName}", $this->name, $output);

        return $result;
    }

    public function mermaid() {
        $output = "subgraph " . $this->name . "\n";
        foreach ($this->tasks as $task) {
            $output .= "  " . $task->mermaid() . "\n";
        }
        $output .= "end\n";

        foreach ($this->tasks as $task) {
            if ($task instanceof SubStateMachineTask) {
                $output .= "\n";
                $output .= $this->name . "_" . $task->name . " --> " . $task->subStateMachineName . "_" . $task->subStateMachineName . "_entryPoint\n";
                $output .= $task->subStateMachineName . "_Pass -->|Pass| " . $this->name . "_" . $task->events[0]->nextTaskName . "\n";
            }
            if ($task instanceof WaitTask) {
                $output .= "\n";
                $output .= "Player ----->|Interaction| " . $this->name . "_" . $task->name . "\n";
            }
        }

        return str_replace("{stateMachineName}", $this->name, $output);
    }
}
