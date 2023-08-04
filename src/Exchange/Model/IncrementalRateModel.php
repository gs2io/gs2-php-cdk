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
namespace Gs2Cdk\Exchange\Model;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Exchange\Model\Options\IncrementalRateModelOptions;
use Gs2Cdk\Exchange\Model\Options\IncrementalRateModelCalculateTypeIsLinearOptions;
use Gs2Cdk\Exchange\Model\Options\IncrementalRateModelCalculateTypeIsPowerOptions;
use Gs2Cdk\Exchange\Model\Options\IncrementalRateModelCalculateTypeIsGs2ScriptOptions;
use Gs2Cdk\Exchange\Model\Enum\IncrementalRateModelCalculateType;

class IncrementalRateModel {
    private string $name;
    private ConsumeAction $consumeAction;
    private IncrementalRateModelCalculateType $calculateType;
    private string $exchangeCountId;
    private int $maximumExchangeCount;
    private ?string $metadata = null;
    private ?int $baseValue = null;
    private ?int $coefficientValue = null;
    private ?string $calculateScriptId = null;
    private ?array $acquireActions = null;

    public function __construct(
        string $name,
        ConsumeAction $consumeAction,
        IncrementalRateModelCalculateType $calculateType,
        string $exchangeCountId,
        int $maximumExchangeCount,
        ?IncrementalRateModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->consumeAction = $consumeAction;
        $this->calculateType = $calculateType;
        $this->exchangeCountId = $exchangeCountId;
        $this->maximumExchangeCount = $maximumExchangeCount;
        $this->metadata = $options?->metadata ?? null;
        $this->baseValue = $options?->baseValue ?? null;
        $this->coefficientValue = $options?->coefficientValue ?? null;
        $this->calculateScriptId = $options?->calculateScriptId ?? null;
        $this->acquireActions = $options?->acquireActions ?? null;
    }

    public static function calculateTypeIsLinear(
        string $name,
        ConsumeAction $consumeAction,
        string $exchangeCountId,
        int $maximumExchangeCount,
        int $baseValue,
        int $coefficientValue,
        ?IncrementalRateModelCalculateTypeIsLinearOptions $options = null,
    ): IncrementalRateModel {
        return (new IncrementalRateModel(
            $name,
            $consumeAction,
            IncrementalRateModelCalculateType::LINEAR,
            $exchangeCountId,
            $maximumExchangeCount,
            new IncrementalRateModelOptions(
                baseValue: $baseValue,
                coefficientValue: $coefficientValue,
                metadata: $options?->metadata,
                acquireActions: $options?->acquireActions,
            ),
        ));
    }

    public static function calculateTypeIsPower(
        string $name,
        ConsumeAction $consumeAction,
        string $exchangeCountId,
        int $maximumExchangeCount,
        int $coefficientValue,
        ?IncrementalRateModelCalculateTypeIsPowerOptions $options = null,
    ): IncrementalRateModel {
        return (new IncrementalRateModel(
            $name,
            $consumeAction,
            IncrementalRateModelCalculateType::POWER,
            $exchangeCountId,
            $maximumExchangeCount,
            new IncrementalRateModelOptions(
                coefficientValue: $coefficientValue,
                metadata: $options?->metadata,
                acquireActions: $options?->acquireActions,
            ),
        ));
    }

    public static function calculateTypeIsGs2Script(
        string $name,
        ConsumeAction $consumeAction,
        string $exchangeCountId,
        int $maximumExchangeCount,
        string $calculateScriptId,
        ?IncrementalRateModelCalculateTypeIsGs2ScriptOptions $options = null,
    ): IncrementalRateModel {
        return (new IncrementalRateModel(
            $name,
            $consumeAction,
            IncrementalRateModelCalculateType::GS2_SCRIPT,
            $exchangeCountId,
            $maximumExchangeCount,
            new IncrementalRateModelOptions(
                calculateScriptId: $calculateScriptId,
                metadata: $options?->metadata,
                acquireActions: $options?->acquireActions,
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
        if ($this->consumeAction != null) {
            $properties["consumeAction"] = $this->consumeAction?->properties(
            );
        }
        if ($this->calculateType != null) {
            $properties["calculateType"] = $this->calculateType?->toString(
            );
        }
        if ($this->baseValue != null) {
            $properties["baseValue"] = $this->baseValue;
        }
        if ($this->coefficientValue != null) {
            $properties["coefficientValue"] = $this->coefficientValue;
        }
        if ($this->calculateScriptId != null) {
            $properties["calculateScriptId"] = $this->calculateScriptId;
        }
        if ($this->exchangeCountId != null) {
            $properties["exchangeCountId"] = $this->exchangeCountId;
        }
        if ($this->maximumExchangeCount != null) {
            $properties["maximumExchangeCount"] = $this->maximumExchangeCount;
        }
        if ($this->acquireActions != null) {
            $properties["acquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->acquireActions
            );
        }

        return $properties;
    }
}
