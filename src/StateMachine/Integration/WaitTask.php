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

class WaitTask implements ITask {
    public string $name;
    public array $results = [];
    public array $events = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function transition(Event $event): ITask {
        $event->fromTaskName = $this->name;
        $this->events[] = $event;
        return $this;
    }

    public function getEvents(): array {
        return $this->events;
    }

    /**
     * @param string $resultName
     * @param array<array<IVariable|string>> $emitEventArgumentVariableNames
     * @param string $nextTaskName
     * @return $this
     */
    public function result(string $resultName, array $emitEventArgumentVariableNames, string $nextTaskName): WaitTask {
        $this->results[] = new Result($resultName, $resultName, $emitEventArgumentVariableNames);
        $eventArgumentsObjects = [];
        foreach($emitEventArgumentVariableNames as $argument){
            $eventArgumentsObjects[] = $argument[0];
        }
        $this->transition(new Event($resultName, $eventArgumentsObjects, $nextTaskName));
        return $this;
    }

    public function gsl(): string {
        $output = sprintf("WaitTask %s {\n", $this->name);

        foreach ($this->events as $event) {
            $argumentsPart = implode(", ", array_map(function (IVariable $var) { return $var->gsl(); }, $event->arguments));
            $output .= "  ".sprintf("Event %s(%s);\n", $event->name, $argumentsPart);
        }

        $output .= "}\n\n";
        return $output;
    }

    public function mermaid(): string {
        $output = "";

        foreach ($this->events as $event) {
            if ($event->nextTaskName !== "Error") {
                $output .= sprintf("{stateMachineName}_%s([{%s}]) -->|%s| {stateMachineName}_%s\n",
                    $event->fromTaskName, $event->fromTaskName, $event->name, $event->nextTaskName);
            }
        }

        return $output;
    }
}
