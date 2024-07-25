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
namespace Gs2Cdk\Quest\Model;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Quest\Model\Contents;
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Quest\Model\QuestModel;
use Gs2Cdk\Quest\Model\Options\QuestGroupModelOptions;

class QuestGroupModel {
    private string $name;
    private ?string $metadata = null;
    private ?array $quests = null;
    private ?string $challengePeriodEventId = null;

    public function __construct(
        string $name,
        ?QuestGroupModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->metadata = $options?->metadata ?? null;
        $this->quests = $options?->quests ?? null;
        $this->challengePeriodEventId = $options?->challengePeriodEventId ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->quests != null) {
            $properties["quests"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->quests
            );
        }
        if ($this->challengePeriodEventId != null) {
            $properties["challengePeriodEventId"] = $this->challengePeriodEventId;
        }

        return $properties;
    }
}
