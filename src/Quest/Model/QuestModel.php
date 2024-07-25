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
use Gs2Cdk\Quest\Model\Options\QuestModelOptions;

class QuestModel {
    private string $name;
    private array $contents;
    private ?string $metadata = null;
    private ?string $challengePeriodEventId = null;
    private ?array $firstCompleteAcquireActions = null;
    private ?array $verifyActions = null;
    private ?array $consumeActions = null;
    private ?array $failedAcquireActions = null;
    private ?array $premiseQuestNames = null;

    public function __construct(
        string $name,
        array $contents,
        ?QuestModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->contents = $contents;
        $this->metadata = $options?->metadata ?? null;
        $this->challengePeriodEventId = $options?->challengePeriodEventId ?? null;
        $this->firstCompleteAcquireActions = $options?->firstCompleteAcquireActions ?? null;
        $this->verifyActions = $options?->verifyActions ?? null;
        $this->consumeActions = $options?->consumeActions ?? null;
        $this->failedAcquireActions = $options?->failedAcquireActions ?? null;
        $this->premiseQuestNames = $options?->premiseQuestNames ?? null;
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
        if ($this->contents != null) {
            $properties["contents"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->contents
            );
        }
        if ($this->challengePeriodEventId != null) {
            $properties["challengePeriodEventId"] = $this->challengePeriodEventId;
        }
        if ($this->firstCompleteAcquireActions != null) {
            $properties["firstCompleteAcquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->firstCompleteAcquireActions
            );
        }
        if ($this->verifyActions != null) {
            $properties["verifyActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->verifyActions
            );
        }
        if ($this->consumeActions != null) {
            $properties["consumeActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->consumeActions
            );
        }
        if ($this->failedAcquireActions != null) {
            $properties["failedAcquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->failedAcquireActions
            );
        }
        if ($this->premiseQuestNames != null) {
            $properties["premiseQuestNames"] = $this->premiseQuestNames;
        }

        return $properties;
    }
}
