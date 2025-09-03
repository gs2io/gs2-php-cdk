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
namespace Gs2Cdk\Money2\Model\Options;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Money2\Model\PlatformSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;

class NamespaceOptions {
    public ?string $description;
    public ?TransactionSetting $transactionSetting;
    public ?ScriptSetting $depositBalanceScript;
    public ?ScriptSetting $withdrawBalanceScript;
    public ?ScriptSetting $verifyReceiptScript;
    public ?string $subscribeScript;
    public ?string $renewScript;
    public ?string $unsubscribeScript;
    public ?ScriptSetting $takeOverScript;
    public ?NotificationSetting $changeSubscriptionStatusNotification;
    public ?LogSetting $logSetting;
    
    public function __construct(
        ?string $description = null,
        ?TransactionSetting $transactionSetting = null,
        ?ScriptSetting $depositBalanceScript = null,
        ?ScriptSetting $withdrawBalanceScript = null,
        ?ScriptSetting $verifyReceiptScript = null,
        ?string $subscribeScript = null,
        ?string $renewScript = null,
        ?string $unsubscribeScript = null,
        ?ScriptSetting $takeOverScript = null,
        ?NotificationSetting $changeSubscriptionStatusNotification = null,
        ?LogSetting $logSetting = null,
    ) {
        $this->description = $description;
        $this->transactionSetting = $transactionSetting;
        $this->depositBalanceScript = $depositBalanceScript;
        $this->withdrawBalanceScript = $withdrawBalanceScript;
        $this->verifyReceiptScript = $verifyReceiptScript;
        $this->subscribeScript = $subscribeScript;
        $this->renewScript = $renewScript;
        $this->unsubscribeScript = $unsubscribeScript;
        $this->takeOverScript = $takeOverScript;
        $this->changeSubscriptionStatusNotification = $changeSubscriptionStatusNotification;
        $this->logSetting = $logSetting;
    }}

