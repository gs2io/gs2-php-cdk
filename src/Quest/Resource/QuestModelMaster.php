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

namespace Gs2Cdk\Quest\Resource;


use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

use Gs2Cdk\Quest\Ref\QuestModelMasterRef;

class QuestModelMaster extends CdkResource {

    public Stack $stack;
    public string $namespaceName;
    public string $questGroupName;
    public string $name;
    public array $contents;

    public function __construct(
            Stack $stack,
            string $namespaceName,
            string $questGroupName,
            string $name,
            array $contents,
            string $description = null,
            string $metadata = null,
            string $challengePeriodEventId = null,
            array $firstCompleteAcquireActions = null,
            array $consumeActions = null,
            array $failedAcquireActions = null,
            array $premiseQuestNames = null,
    ) {
        parent::__construct("Quest_QuestModelMaster_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->questGroupName = $questGroupName;
        $this->name = $name;
        $this->description = $description;
        $this->metadata = $metadata;
        $this->contents = $contents;
        $this->challengePeriodEventId = $challengePeriodEventId;
        $this->firstCompleteAcquireActions = $firstCompleteAcquireActions;
        $this->consumeActions = $consumeActions;
        $this->failedAcquireActions = $failedAcquireActions;
        $this->premiseQuestNames = $premiseQuestNames;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Quest::QuestModelMaster";
    }

    public function properties(): array {
        $properties = [];
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->questGroupName != null) {
            $properties["QuestGroupName"] = $this->questGroupName;
        }
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->contents != null) {
            $properties["Contents"] = array_map(fn($v) => $v->properties(), $this->contents);
        }
        if ($this->challengePeriodEventId != null) {
            $properties["ChallengePeriodEventId"] = $this->challengePeriodEventId;
        }
        if ($this->firstCompleteAcquireActions != null) {
            $properties["FirstCompleteAcquireActions"] = array_map(fn($v) => $v->properties(), $this->firstCompleteAcquireActions);
        }
        if ($this->consumeActions != null) {
            $properties["ConsumeActions"] = array_map(fn($v) => $v->properties(), $this->consumeActions);
        }
        if ($this->failedAcquireActions != null) {
            $properties["FailedAcquireActions"] = array_map(fn($v) => $v->properties(), $this->failedAcquireActions);
        }
        if ($this->premiseQuestNames != null) {
            $properties["PremiseQuestNames"] = $this->premiseQuestNames;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
            String $questGroupName,
    ): QuestModelMasterRef {
        return new QuestModelMasterRef(
            namespaceName: namespaceName,
            questGroupName: questGroupName,
            questName: $this->name,
        );
    }

    public function getAttrQuestModelId(): GetAttr {
        return new GetAttr(
            key: "Item.QuestModelId"
        );
    }
}
