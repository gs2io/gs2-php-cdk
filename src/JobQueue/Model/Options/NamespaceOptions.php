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
namespace Gs2Cdk\JobQueue\Model\Options;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;

class NamespaceOptions {
    public ?string $description;
    public ?bool $enableAutoRun;
    public ?NotificationSetting $pushNotification;
    public ?NotificationSetting $runNotification;
    public ?LogSetting $logSetting;
    
    public function __construct(
        ?string $description = null,
        ?bool $enableAutoRun = null,
        ?NotificationSetting $pushNotification = null,
        ?NotificationSetting $runNotification = null,
        ?LogSetting $logSetting = null,
    ) {
        $this->description = $description;
        $this->enableAutoRun = $enableAutoRun;
        $this->pushNotification = $pushNotification;
        $this->runNotification = $runNotification;
        $this->logSetting = $logSetting;
    }}

