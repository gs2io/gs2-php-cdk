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
namespace Gs2Cdk\Exchange\Model\Options;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Exchange\Model\TransactionSettingV2;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

class NamespaceOptions {
    public ?string $description;
    public ?bool $enableAwaitExchange;
    public ?bool $enableDirectExchange;
    /** @deprecated */
    public ?TransactionSetting $transactionSetting;
    public ?TransactionSettingV2 $transactionSettingV2;
    public ?ScriptSetting $exchangeScript;
    public ?ScriptSetting $incrementalExchangeScript;
    public ?ScriptSetting $acquireAwaitScript;
    public ?LogSetting $logSetting;
    public ?string $queueNamespaceId;
    public ?string $keyId;
    
    public function __construct(
        ?string $description = null,
        ?bool $enableAwaitExchange = null,
        ?bool $enableDirectExchange = null,
        ?TransactionSetting $transactionSetting = null,
        ?TransactionSettingV2 $transactionSettingV2 = null,
        ?ScriptSetting $exchangeScript = null,
        ?ScriptSetting $incrementalExchangeScript = null,
        ?ScriptSetting $acquireAwaitScript = null,
        ?LogSetting $logSetting = null,
        ?string $queueNamespaceId = null,
        ?string $keyId = null,
    ) {
        $this->description = $description;
        $this->enableAwaitExchange = $enableAwaitExchange;
        $this->enableDirectExchange = $enableDirectExchange;
        $this->transactionSetting = $transactionSetting;
        $this->transactionSettingV2 = $transactionSettingV2;
        $this->exchangeScript = $exchangeScript;
        $this->incrementalExchangeScript = $incrementalExchangeScript;
        $this->acquireAwaitScript = $acquireAwaitScript;
        $this->logSetting = $logSetting;
        $this->queueNamespaceId = $queueNamespaceId;
        $this->keyId = $keyId;
    }}

