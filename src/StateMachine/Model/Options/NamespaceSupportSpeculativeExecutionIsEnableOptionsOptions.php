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
namespace Gs2Cdk\StateMachine\Model\Options;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\StateMachine\Model\Enum\NamespaceSupportSpeculativeExecution;

class NamespaceSupportSpeculativeExecutionIsEnableOptions {
    public ?string $description;
    public ?TransactionSetting $transactionSetting;
    public ?ScriptSetting $startScript;
    public ?ScriptSetting $passScript;
    public ?ScriptSetting $errorScript;
    public ?int $lowestStateMachineVersion;
    public ?LogSetting $logSetting;
    public ?int $revision;
    
    public function __construct(
        ?string $description = null,
        ?TransactionSetting $transactionSetting = null,
        ?ScriptSetting $startScript = null,
        ?ScriptSetting $passScript = null,
        ?ScriptSetting $errorScript = null,
        ?int $lowestStateMachineVersion = null,
        ?LogSetting $logSetting = null,
        ?int $revision = null,
    ) {
        $this->description = $description;
        $this->transactionSetting = $transactionSetting;
        $this->startScript = $startScript;
        $this->passScript = $passScript;
        $this->errorScript = $errorScript;
        $this->lowestStateMachineVersion = $lowestStateMachineVersion;
        $this->logSetting = $logSetting;
        $this->revision = $revision;
    }}
