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


class QuestModel {
	public string $name;
	public ?string $metadata;
	public array $contents;
	public ?string $challengePeriodEventId;
	public ?array $firstCompleteAcquireActions;
	public ?array $consumeActions;
	public ?array $failedAcquireActions;
	public ?array $premiseQuestNames;

    public function __construct(
            string $name,
            array $contents,
            string $metadata = null,
            string $challengePeriodEventId = null,
            array $firstCompleteAcquireActions = null,
            array $consumeActions = null,
            array $failedAcquireActions = null,
            array $premiseQuestNames = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->contents = $contents;
        $this->challengePeriodEventId = $challengePeriodEventId;
        $this->firstCompleteAcquireActions = $firstCompleteAcquireActions;
        $this->consumeActions = $consumeActions;
        $this->failedAcquireActions = $failedAcquireActions;
        $this->premiseQuestNames = $premiseQuestNames;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
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
    ): QuestModelRef {
        return new QuestModelRef(
            $namespaceName,
            $questGroupName,
            $this->name,
        );
    }
}
