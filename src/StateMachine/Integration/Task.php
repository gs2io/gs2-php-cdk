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

class Task implements ITask {

    public string $name;
    public array $arguments;
    public string $script;

    /**
     * @var Event[]
     */
    public array $events = [];
    /**
     * @var Result[]
     */
    public array $results = [];

    public function __construct(string $name, array $arguments, string $script) {
        $this->name = $name;
        $this->arguments = $arguments;
        $this->script = $script;
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

    /**
     * @param string $name
     * @param array<array<IVariable|string>> $emitEventArgumentVariableNames
     * @param string $nextTaskName
     * @return $this
     */
    public function result(string $name, array $emitEventArgumentVariableNames, string $nextTaskName): self {
        $this->results[] = new Result($name, $name, $emitEventArgumentVariableNames);
        $eventArgumentsObjects = [];
        foreach($emitEventArgumentVariableNames as $argument){
            $eventArgumentsObjects[] = $argument[0];
        }
        $this->transition(new Event($name, $eventArgumentsObjects, $nextTaskName));
        return $this;
    }

    public function scriptPayload(): Script {
        $output = $this->script . "\n\n";
        foreach($this->results as $result) {
            $output .= "if result == '{$result->name}' then\n";
            $params = [];
            foreach($result->emitEventArgumentVariableNames as $argument) {
                $params[] = "{$argument[0]->getName()}={$argument[1]}";
            }
            $output .= "  result = {\n    event='{$result->emitEventName}',\n    params={" . implode(", ", $params) . "},\n    updatedVariables=args.variables\n  }";
            $output .= "end\n";
        }
        return new Script($this->name, $output);
    }

    public function gsl(): string {
        $args = [];
        foreach($this->arguments as $arg) {
            $args[] = $arg->gsl();
        }
        $output = "Task {$this->name}(" . implode(", ", $args) . ") {\n";
        foreach($this->events as $event) {
            $eventArgs = [];
            foreach($event->arguments as $arg) {
                $eventArgs[] = $arg->gsl();
            }
            $output .= "  Event {$event->name}(" . implode(", ", $eventArgs) . ");\n";
        }
        $output .= "  Script grn:gs2:{region}:{ownerId}:script:{scriptNamespaceName}:script:{stateMachineName}_{$this->name}\n}\n\n";
        return $output;
    }

    public function mermaid(): string {
        $output = "";
        foreach($this->events as $event) {
            if ($event->nextTaskName === "Error") {
                continue;
            }
            $output .= "{stateMachineName}_{$event->fromTaskName}[{$event->fromTaskName}] -->|{$event->name}| {stateMachineName}_{$event->nextTaskName}\n";
        }
        return $output;
    }
}
