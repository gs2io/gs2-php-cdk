<?php /** @noinspection ALL */
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2Cdk\Core\Model;

class ScriptSetting
{

    public String $triggerScriptId;
    public String $doneTriggerTargetType;
    public String $doneTriggerScriptId;
    public String $doneTriggerQueueNamespaceId;

    public function __construct(
        String $triggerScriptId = null,
        String $doneTriggerTargetType = null,
        String $doneTriggerScriptId = null,
        String $doneTriggerQueueNamespaceId = null,
    ) {
        $this->triggerScriptId = $triggerScriptId;
        $this->doneTriggerTargetType = $doneTriggerTargetType;
        $this->doneTriggerScriptId = $doneTriggerScriptId;
        $this->doneTriggerQueueNamespaceId = $doneTriggerQueueNamespaceId;
    }

    public function properties(): array {
        return [
            "TriggerScriptId" => $triggerScriptId,
            "DoneTriggerTargetType" => $doneTriggerTargetType,
            "DoneTriggerScriptId" => $doneTriggerScriptId,
            "DoneTriggerQueueNamespaceId" => $doneTriggerQueueNamespaceId,
        ];
    }
}