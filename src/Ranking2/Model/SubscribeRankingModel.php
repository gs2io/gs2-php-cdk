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
namespace Gs2Cdk\Ranking2\Model;
use Gs2Cdk\Ranking2\Model\Options\SubscribeRankingModelOptions;
use Gs2Cdk\Ranking2\Model\Enum\SubscribeRankingModelOrderDirection;

class SubscribeRankingModel {
    private string $name;
    private bool $sum;
    private SubscribeRankingModelOrderDirection $orderDirection;
    private ?string $metadata = null;
    private ?int $minimumValue = null;
    private ?int $maximumValue = null;
    private ?string $entryPeriodEventId = null;
    private ?string $accessPeriodEventId = null;

    public function __construct(
        string $name,
        bool $sum,
        SubscribeRankingModelOrderDirection $orderDirection,
        ?SubscribeRankingModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->sum = $sum;
        $this->orderDirection = $orderDirection;
        $this->metadata = $options?->metadata ?? null;
        $this->minimumValue = $options?->minimumValue ?? null;
        $this->maximumValue = $options?->maximumValue ?? null;
        $this->entryPeriodEventId = $options?->entryPeriodEventId ?? null;
        $this->accessPeriodEventId = $options?->accessPeriodEventId ?? null;
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
        if ($this->minimumValue != null) {
            $properties["minimumValue"] = $this->minimumValue;
        }
        if ($this->maximumValue != null) {
            $properties["maximumValue"] = $this->maximumValue;
        }
        if ($this->sum != null) {
            $properties["sum"] = $this->sum;
        }
        if ($this->orderDirection != null) {
            $properties["orderDirection"] = $this->orderDirection?->toString(
            );
        }
        if ($this->entryPeriodEventId != null) {
            $properties["entryPeriodEventId"] = $this->entryPeriodEventId;
        }
        if ($this->accessPeriodEventId != null) {
            $properties["accessPeriodEventId"] = $this->accessPeriodEventId;
        }

        return $properties;
    }
}
