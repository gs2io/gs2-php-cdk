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
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Exchange\Model\Options\RateModelOptions;
use Gs2Cdk\Exchange\Model\Options\RateModelTimingTypeIsImmediateOptions;
use Gs2Cdk\Exchange\Model\Options\RateModelTimingTypeIsAwaitOptions;
use Gs2Cdk\Exchange\Model\Enums\RateModelTimingType;

class RateModel {
    private string $name;
    private RateModelTimingType $timingType;
    private ?string $metadata = null;
    private ?array $verifyActions = null;
    private ?array $consumeActions = null;
    private ?int $lockTime = null;
    private ?array $acquireActions = null;

    public function __construct(
        string $name,
        RateModelTimingType $timingType,
        ?RateModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->timingType = $timingType;
        $this->metadata = $options?->metadata ?? null;
        $this->verifyActions = $options?->verifyActions ?? null;
        $this->consumeActions = $options?->consumeActions ?? null;
        $this->lockTime = $options?->lockTime ?? null;
        $this->acquireActions = $options?->acquireActions ?? null;
    }

    public static function timingTypeIsImmediate(
        string $name,
        ?RateModelTimingTypeIsImmediateOptions $options = null,
    ): RateModel {
        return (new RateModel(
            $name,
            RateModelTimingType::IMMEDIATE,
            new RateModelOptions(
                metadata: $options?->metadata,
                verifyActions: $options?->verifyActions,
                consumeActions: $options?->consumeActions,
                acquireActions: $options?->acquireActions,
            ),
        ));
    }

    public static function timingTypeIsAwait(
        string $name,
        int $lockTime,
        ?RateModelTimingTypeIsAwaitOptions $options = null,
    ): RateModel {
        return (new RateModel(
            $name,
            RateModelTimingType::AWAIT,
            new RateModelOptions(
                lockTime: $lockTime,
                metadata: $options?->metadata,
                verifyActions: $options?->verifyActions,
                consumeActions: $options?->consumeActions,
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
        if ($this->timingType != null) {
            $properties["timingType"] = $this->timingType?->toString(
            );
        }
        if ($this->lockTime != null) {
            $properties["lockTime"] = $this->lockTime;
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
