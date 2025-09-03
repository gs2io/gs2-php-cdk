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
namespace Gs2Cdk\Inventory\Model\Options;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

class NamespaceOptions {
    public ?string $description;
    public ?TransactionSetting $transactionSetting;
    public ?ScriptSetting $acquireScript;
    public ?ScriptSetting $overflowScript;
    public ?ScriptSetting $consumeScript;
    public ?ScriptSetting $simpleItemAcquireScript;
    public ?ScriptSetting $simpleItemConsumeScript;
    public ?ScriptSetting $bigItemAcquireScript;
    public ?ScriptSetting $bigItemConsumeScript;
    public ?LogSetting $logSetting;
    
    public function __construct(
        ?string $description = null,
        ?TransactionSetting $transactionSetting = null,
        ?ScriptSetting $acquireScript = null,
        ?ScriptSetting $overflowScript = null,
        ?ScriptSetting $consumeScript = null,
        ?ScriptSetting $simpleItemAcquireScript = null,
        ?ScriptSetting $simpleItemConsumeScript = null,
        ?ScriptSetting $bigItemAcquireScript = null,
        ?ScriptSetting $bigItemConsumeScript = null,
        ?LogSetting $logSetting = null,
    ) {
        $this->description = $description;
        $this->transactionSetting = $transactionSetting;
        $this->acquireScript = $acquireScript;
        $this->overflowScript = $overflowScript;
        $this->consumeScript = $consumeScript;
        $this->simpleItemAcquireScript = $simpleItemAcquireScript;
        $this->simpleItemConsumeScript = $simpleItemConsumeScript;
        $this->bigItemAcquireScript = $bigItemAcquireScript;
        $this->bigItemConsumeScript = $bigItemConsumeScript;
        $this->logSetting = $logSetting;
    }}

