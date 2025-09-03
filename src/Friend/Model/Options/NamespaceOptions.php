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
namespace Gs2Cdk\Friend\Model\Options;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;

class NamespaceOptions {
    public ?string $description;
    public ?TransactionSetting $transactionSetting;
    public ?ScriptSetting $followScript;
    public ?ScriptSetting $unfollowScript;
    public ?ScriptSetting $sendRequestScript;
    public ?ScriptSetting $cancelRequestScript;
    public ?ScriptSetting $acceptRequestScript;
    public ?ScriptSetting $rejectRequestScript;
    public ?ScriptSetting $deleteFriendScript;
    public ?ScriptSetting $updateProfileScript;
    public ?NotificationSetting $followNotification;
    public ?NotificationSetting $receiveRequestNotification;
    public ?NotificationSetting $cancelRequestNotification;
    public ?NotificationSetting $acceptRequestNotification;
    public ?NotificationSetting $rejectRequestNotification;
    public ?NotificationSetting $deleteFriendNotification;
    public ?LogSetting $logSetting;
    
    public function __construct(
        ?string $description = null,
        ?TransactionSetting $transactionSetting = null,
        ?ScriptSetting $followScript = null,
        ?ScriptSetting $unfollowScript = null,
        ?ScriptSetting $sendRequestScript = null,
        ?ScriptSetting $cancelRequestScript = null,
        ?ScriptSetting $acceptRequestScript = null,
        ?ScriptSetting $rejectRequestScript = null,
        ?ScriptSetting $deleteFriendScript = null,
        ?ScriptSetting $updateProfileScript = null,
        ?NotificationSetting $followNotification = null,
        ?NotificationSetting $receiveRequestNotification = null,
        ?NotificationSetting $cancelRequestNotification = null,
        ?NotificationSetting $acceptRequestNotification = null,
        ?NotificationSetting $rejectRequestNotification = null,
        ?NotificationSetting $deleteFriendNotification = null,
        ?LogSetting $logSetting = null,
    ) {
        $this->description = $description;
        $this->transactionSetting = $transactionSetting;
        $this->followScript = $followScript;
        $this->unfollowScript = $unfollowScript;
        $this->sendRequestScript = $sendRequestScript;
        $this->cancelRequestScript = $cancelRequestScript;
        $this->acceptRequestScript = $acceptRequestScript;
        $this->rejectRequestScript = $rejectRequestScript;
        $this->deleteFriendScript = $deleteFriendScript;
        $this->updateProfileScript = $updateProfileScript;
        $this->followNotification = $followNotification;
        $this->receiveRequestNotification = $receiveRequestNotification;
        $this->cancelRequestNotification = $cancelRequestNotification;
        $this->acceptRequestNotification = $acceptRequestNotification;
        $this->rejectRequestNotification = $rejectRequestNotification;
        $this->deleteFriendNotification = $deleteFriendNotification;
        $this->logSetting = $logSetting;
    }}

