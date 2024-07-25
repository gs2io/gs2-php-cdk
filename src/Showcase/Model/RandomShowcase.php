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
namespace Gs2Cdk\Showcase\Model;
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Showcase\Model\RandomDisplayItemModel;
use Gs2Cdk\Showcase\Model\Options\RandomShowcaseOptions;

class RandomShowcase {
    private string $name;
    private int $maximumNumberOfChoice;
    private array $displayItems;
    private int $baseTimestamp;
    private int $resetIntervalHours;
    private ?string $metadata = null;
    private ?string $salesPeriodEventId = null;

    public function __construct(
        string $name,
        int $maximumNumberOfChoice,
        array $displayItems,
        int $baseTimestamp,
        int $resetIntervalHours,
        ?RandomShowcaseOptions $options = null,
    ) {
        $this->name = $name;
        $this->maximumNumberOfChoice = $maximumNumberOfChoice;
        $this->displayItems = $displayItems;
        $this->baseTimestamp = $baseTimestamp;
        $this->resetIntervalHours = $resetIntervalHours;
        $this->metadata = $options?->metadata ?? null;
        $this->salesPeriodEventId = $options?->salesPeriodEventId ?? null;
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
        if ($this->maximumNumberOfChoice != null) {
            $properties["maximumNumberOfChoice"] = $this->maximumNumberOfChoice;
        }
        if ($this->displayItems != null) {
            $properties["displayItems"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->displayItems
            );
        }
        if ($this->baseTimestamp != null) {
            $properties["baseTimestamp"] = $this->baseTimestamp;
        }
        if ($this->resetIntervalHours != null) {
            $properties["resetIntervalHours"] = $this->resetIntervalHours;
        }
        if ($this->salesPeriodEventId != null) {
            $properties["salesPeriodEventId"] = $this->salesPeriodEventId;
        }

        return $properties;
    }
}
