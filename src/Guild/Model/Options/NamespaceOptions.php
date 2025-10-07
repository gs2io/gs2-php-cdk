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
namespace Gs2Cdk\Guild\Model\Options;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

class NamespaceOptions {
    public ?string $description;
    public ?TransactionSetting $transactionSetting;
    public ?NotificationSetting $changeNotification;
    public ?NotificationSetting $joinNotification;
    public ?NotificationSetting $leaveNotification;
    public ?NotificationSetting $changeMemberNotification;
    public ?bool $changeMemberNotificationIgnoreChangeMetadata;
    public ?NotificationSetting $receiveRequestNotification;
    public ?NotificationSetting $removeRequestNotification;
    public ?ScriptSetting $createGuildScript;
    public ?ScriptSetting $updateGuildScript;
    public ?ScriptSetting $joinGuildScript;
    public ?ScriptSetting $receiveJoinRequestScript;
    public ?ScriptSetting $leaveGuildScript;
    public ?ScriptSetting $changeRoleScript;
    public ?ScriptSetting $deleteGuildScript;
    public ?LogSetting $logSetting;
    
    public function __construct(
        ?string $description = null,
        ?TransactionSetting $transactionSetting = null,
        ?NotificationSetting $changeNotification = null,
        ?NotificationSetting $joinNotification = null,
        ?NotificationSetting $leaveNotification = null,
        ?NotificationSetting $changeMemberNotification = null,
        ?bool $changeMemberNotificationIgnoreChangeMetadata = null,
        ?NotificationSetting $receiveRequestNotification = null,
        ?NotificationSetting $removeRequestNotification = null,
        ?ScriptSetting $createGuildScript = null,
        ?ScriptSetting $updateGuildScript = null,
        ?ScriptSetting $joinGuildScript = null,
        ?ScriptSetting $receiveJoinRequestScript = null,
        ?ScriptSetting $leaveGuildScript = null,
        ?ScriptSetting $changeRoleScript = null,
        ?ScriptSetting $deleteGuildScript = null,
        ?LogSetting $logSetting = null,
    ) {
        $this->description = $description;
        $this->transactionSetting = $transactionSetting;
        $this->changeNotification = $changeNotification;
        $this->joinNotification = $joinNotification;
        $this->leaveNotification = $leaveNotification;
        $this->changeMemberNotification = $changeMemberNotification;
        $this->changeMemberNotificationIgnoreChangeMetadata = $changeMemberNotificationIgnoreChangeMetadata;
        $this->receiveRequestNotification = $receiveRequestNotification;
        $this->removeRequestNotification = $removeRequestNotification;
        $this->createGuildScript = $createGuildScript;
        $this->updateGuildScript = $updateGuildScript;
        $this->joinGuildScript = $joinGuildScript;
        $this->receiveJoinRequestScript = $receiveJoinRequestScript;
        $this->leaveGuildScript = $leaveGuildScript;
        $this->changeRoleScript = $changeRoleScript;
        $this->deleteGuildScript = $deleteGuildScript;
        $this->logSetting = $logSetting;
    }}

