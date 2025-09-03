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
namespace Gs2Cdk\Matchmaking\Model\Options;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Matchmaking\Model\Enums\NamespaceEnableDisconnectDetection;
use Gs2Cdk\Matchmaking\Model\Enums\NamespaceCreateGatheringTriggerType;
use Gs2Cdk\Matchmaking\Model\Enums\NamespaceCompleteMatchmakingTriggerType;
use Gs2Cdk\Matchmaking\Model\Enums\NamespaceEnableCollaborateSeasonRating;

class NamespaceCreateGatheringTriggerTypeIsNoneOptions {
    public ?string $description;
    public ?TransactionSetting $transactionSetting;
    public ?ScriptSetting $changeRatingScript;
    public ?NotificationSetting $joinNotification;
    public ?NotificationSetting $leaveNotification;
    public ?NotificationSetting $completeNotification;
    public ?NotificationSetting $changeRatingNotification;
    public ?LogSetting $logSetting;
    public ?int $revision;
    
    public function __construct(
        ?string $description = null,
        ?TransactionSetting $transactionSetting = null,
        ?ScriptSetting $changeRatingScript = null,
        ?NotificationSetting $joinNotification = null,
        ?NotificationSetting $leaveNotification = null,
        ?NotificationSetting $completeNotification = null,
        ?NotificationSetting $changeRatingNotification = null,
        ?LogSetting $logSetting = null,
        ?int $revision = null,
    ) {
        $this->description = $description;
        $this->transactionSetting = $transactionSetting;
        $this->changeRatingScript = $changeRatingScript;
        $this->joinNotification = $joinNotification;
        $this->leaveNotification = $leaveNotification;
        $this->completeNotification = $completeNotification;
        $this->changeRatingNotification = $changeRatingNotification;
        $this->logSetting = $logSetting;
        $this->revision = $revision;
    }}
