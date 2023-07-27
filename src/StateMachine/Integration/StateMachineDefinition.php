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

use Gs2Cdk\Core\Model\Stack;

class StateMachineDefinition {
    public $stateMachineName = "";
    private $stateMachines;

    public function __construct() {
        $this->stateMachines = [];
    }

    public function add(
        StateMachine $stateMachine
    ) {
        array_push($this->stateMachines, $stateMachine);
    }

    public function entryPointStateMachineName(
        string $stateMachineName
    ) {
        $this->stateMachineName = $stateMachineName;
    }

    public function stateMachine(
        string $name,
        array $variables
    ) {
        return new StateMachine($this, $name, $variables);
    }

    public function scriptTask(
        string $name,
        array $arguments,
        string $script
    ) {
        return new Task($name, $arguments, $script);
    }

    public function subStateMachineTask(
        string $name,
        string $subStateMachineName,
        array $inParams,
        array $outParams,
        string $nextTaskName
    ) {
        $task = new SubStateMachineTask($name, $subStateMachineName, $inParams, $outParams);
        $task->transition(new Event("Pass", array_map(function ($v) { return $v->subStateMachineVariable; }, $outParams), $nextTaskName));
        return $task;
    }

    public function inParam(
        IVariable $currentStateMachineVariable,
        IVariable $subStateMachineVariable
    ) {
        return new InParam($currentStateMachineVariable, $subStateMachineVariable);
    }

    public function outParam(
        IVariable $subStateMachineVariable,
        IVariable $currentStateMachineVariable
    ) {
        return new OutParam($subStateMachineVariable, $currentStateMachineVariable);
    }

    public function waitTask(string $name) {
        return new WaitTask($name);
    }

    public function passTask(string $name) {
        return new PassTask($name);
    }

    public function errorTask(string $name) {
        return new ErrorTask($name);
    }

    public function intType(string $name) {
        return new IntType($name);
    }

    public function floatType(string $name) {
        return new FloatType($name);
    }

    public function boolType(string $name) {
        return new BoolType($name);
    }

    public function stringType(string $name) {
        return new StringType($name);
    }

    public function arrayType(string $name) {
        return new ArrayType($name);
    }

    public function mapType(string $name) {
        return new MapType($name);
    }

    public function appendScripts(
        Stack $stack,
        \Gs2Cdk\Script\Model\Namespace_ $scriptNamespace
    ) {
        $scripts = [];
        foreach ($this->stateMachines as $stateMachine) {
            foreach ($stateMachine->scripts() as $script) {
                $deployScript = new \Gs2Cdk\Script\Model\Script(
                    $stack,
                    $scriptNamespace->getName(),
                    $script->name,
                    trim($script->payload)
                );
                $deployScript->addDependsOn($scriptNamespace);
                $scripts[] = $deployScript;
            }
        }
        return $scripts;
    }

    public function gsl() {
        $output = "";
        foreach ($this->stateMachines as $stateMachine) {
            $output .= $stateMachine->gsl() . "\n";
        }
        return $output;
    }

    public function mermaid() {
        $output = "flowchart TD\n";

        $output .= "  Start ----> " . $this->stateMachines[0]->name . "_" . $this->stateMachines[0]->entryPointValue . "\n";
        $output .= "  " . $this->stateMachines[0]->name . "_Pass ----> Exit\n";

        foreach ($this->stateMachines as $stateMachine) {
            $output .= "  " . $stateMachine->mermaid() . "\n";
        }

        foreach ($this->stateMachines as $stateMachine) {
            $output = str_replace(
                "{" . $stateMachine->name . "_entryPoint}", $stateMachine->entryPointValue, $output);
        }

        return $output;
    }
}

