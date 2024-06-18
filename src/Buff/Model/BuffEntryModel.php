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
namespace Gs2Cdk\Buff\Model;
use Gs2Cdk\Buff\Model\BuffTargetGrn;
use Gs2Cdk\Buff\Model\BuffTargetModel;
use Gs2Cdk\Buff\Model\BuffTargetAction;
use Gs2Cdk\Buff\Model\Options\BuffEntryModelOptions;
use Gs2Cdk\Buff\Model\Options\BuffEntryModelTargetTypeIsModelOptions;
use Gs2Cdk\Buff\Model\Options\BuffEntryModelTargetTypeIsActionOptions;
use Gs2Cdk\Buff\Model\Enum\BuffEntryModelExpression;
use Gs2Cdk\Buff\Model\Enum\BuffEntryModelTargetType;

class BuffEntryModel {
    private string $name;
    private BuffEntryModelExpression $expression;
    private BuffEntryModelTargetType $targetType;
    private int $priority;
    private ?string $metadata = null;
    private ?BuffTargetModel $targetModel = null;
    private ?BuffTargetAction $targetAction = null;
    private ?string $applyPeriodScheduleEventId = null;

    public function __construct(
        string $name,
        BuffEntryModelExpression $expression,
        BuffEntryModelTargetType $targetType,
        int $priority,
        ?BuffEntryModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->expression = $expression;
        $this->targetType = $targetType;
        $this->priority = $priority;
        $this->metadata = $options?->metadata ?? null;
        $this->targetModel = $options?->targetModel ?? null;
        $this->targetAction = $options?->targetAction ?? null;
        $this->applyPeriodScheduleEventId = $options?->applyPeriodScheduleEventId ?? null;
    }

    public static function targetTypeIsModel(
        string $name,
        BuffEntryModelExpression $expression,
        int $priority,
        BuffTargetModel $targetModel,
        ?BuffEntryModelTargetTypeIsModelOptions $options = null,
    ): BuffEntryModel {
        return (new BuffEntryModel(
            $name,
            $expression,
            BuffEntryModelTargetType::MODEL,
            $priority,
            new BuffEntryModelOptions(
                targetModel: $targetModel,
                metadata: $options?->metadata,
                applyPeriodScheduleEventId: $options?->applyPeriodScheduleEventId,
            ),
        ));
    }

    public static function targetTypeIsAction(
        string $name,
        BuffEntryModelExpression $expression,
        int $priority,
        BuffTargetAction $targetAction,
        ?BuffEntryModelTargetTypeIsActionOptions $options = null,
    ): BuffEntryModel {
        return (new BuffEntryModel(
            $name,
            $expression,
            BuffEntryModelTargetType::ACTION,
            $priority,
            new BuffEntryModelOptions(
                targetAction: $targetAction,
                metadata: $options?->metadata,
                applyPeriodScheduleEventId: $options?->applyPeriodScheduleEventId,
            ),
        ));
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
        if ($this->expression != null) {
            $properties["expression"] = $this->expression?->toString(
            );
        }
        if ($this->targetType != null) {
            $properties["targetType"] = $this->targetType?->toString(
            );
        }
        if ($this->targetModel != null) {
            $properties["targetModel"] = $this->targetModel?->properties(
            );
        }
        if ($this->targetAction != null) {
            $properties["targetAction"] = $this->targetAction?->properties(
            );
        }
        if ($this->priority != null) {
            $properties["priority"] = $this->priority;
        }
        if ($this->applyPeriodScheduleEventId != null) {
            $properties["applyPeriodScheduleEventId"] = $this->applyPeriodScheduleEventId;
        }

        return $properties;
    }
}
