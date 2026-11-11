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
namespace Gs2Cdk\Realtime\Model\Options;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Realtime\Model\TransactionSettingV2;
use Gs2Cdk\Realtime\Model\SyncSetting;
use Gs2Cdk\Realtime\Model\StateMachineSetting;
use Gs2Cdk\Realtime\Model\ParticipantSetting;
use Gs2Cdk\Realtime\Model\MobileNotificationMessage;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Realtime\Model\Enums\NamespaceServerType;
use Gs2Cdk\Realtime\Model\Enums\NamespaceServerSpec;

class NamespaceServerTypeIsRelayOptions {
    public ?string $description;
    public ?TransactionSetting $transactionSetting;
    public ?TransactionSettingV2 $transactionSettingV2;
    public ?SyncSetting $syncSetting;
    public ?ParticipantSetting $participantSetting;
    public ?NotificationSetting $createNotification;
    public ?LogSetting $logSetting;
    public ?int $revision;
    
    public function __construct(
        ?string $description = null,
        ?TransactionSetting $transactionSetting = null,
        ?TransactionSettingV2 $transactionSettingV2 = null,
        ?SyncSetting $syncSetting = null,
        ?ParticipantSetting $participantSetting = null,
        ?NotificationSetting $createNotification = null,
        ?LogSetting $logSetting = null,
        ?int $revision = null,
    ) {
        $this->description = $description;
        $this->transactionSetting = $transactionSetting;
        $this->transactionSettingV2 = $transactionSettingV2;
        $this->syncSetting = $syncSetting;
        $this->participantSetting = $participantSetting;
        $this->createNotification = $createNotification;
        $this->logSetting = $logSetting;
        $this->revision = $revision;
    }}
