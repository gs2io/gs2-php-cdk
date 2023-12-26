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
namespace Gs2Cdk\Lottery\Model\Options;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\LogSetting;

class NamespaceOptions {
    public ?string $description;
    public ?TransactionSetting $transactionSetting;
    public ?string $lotteryTriggerScriptId;
    public ?string $choicePrizeTableScriptId;
    public ?LogSetting $logSetting;
    public ?string $queueNamespaceId;
    public ?string $keyId;
    
    public function __construct(
        ?string $description = null,
        ?TransactionSetting $transactionSetting = null,
        ?string $lotteryTriggerScriptId = null,
        ?string $choicePrizeTableScriptId = null,
        ?LogSetting $logSetting = null,
        ?string $queueNamespaceId = null,
        ?string $keyId = null,
    ) {
        $this->description = $description;
        $this->transactionSetting = $transactionSetting;
        $this->lotteryTriggerScriptId = $lotteryTriggerScriptId;
        $this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
        $this->logSetting = $logSetting;
        $this->queueNamespaceId = $queueNamespaceId;
        $this->keyId = $keyId;
    }}

