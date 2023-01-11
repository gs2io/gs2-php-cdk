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
namespace Gs2Cdk\Quest\Model\Options;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

class NamespaceOptions {
    public ?string $description;
    public ?ScriptSetting $startQuestScript;
    public ?ScriptSetting $completeQuestScript;
    public ?ScriptSetting $failedQuestScript;
    public ?LogSetting $logSetting;
    public ?string $queueNamespaceId;
    public ?string $keyId;
    
    public function __construct(
        ?string $description = null,
        ?ScriptSetting $startQuestScript = null,
        ?ScriptSetting $completeQuestScript = null,
        ?ScriptSetting $failedQuestScript = null,
        ?LogSetting $logSetting = null,
        ?string $queueNamespaceId = null,
        ?string $keyId = null,
    ) {
        $this->description = $description;
        $this->startQuestScript = $startQuestScript;
        $this->completeQuestScript = $completeQuestScript;
        $this->failedQuestScript = $failedQuestScript;
        $this->logSetting = $logSetting;
        $this->queueNamespaceId = $queueNamespaceId;
        $this->keyId = $keyId;
    }}

