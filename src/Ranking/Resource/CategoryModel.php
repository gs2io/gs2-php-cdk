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

namespace Gs2Cdk\Ranking\Resource;

use Gs2Cdk\Ranking\Resource\Enum\CategoryModelOrderDirection;
use Gs2Cdk\Ranking\Resource\Enum\CategoryModelScope;

class CategoryModel {
	public string $name;
	public ?string $metadata;
	public ?int $minimumValue;
	public ?int $maximumValue;
	public CategoryModelOrderDirection $orderDirection;
	public CategoryModelScope $scope;
	public bool $uniqueByUserId;
	public ?int $calculateFixedTimingHour;
	public ?int $calculateFixedTimingMinute;
	public ?int $calculateIntervalMinutes;
	public ?string $entryPeriodEventId;
	public ?string $accessPeriodEventId;
	public ?string $generation;

    public function __construct(
            string $name,
            CategoryModelOrderDirection $orderDirection,
            CategoryModelScope $scope,
            bool $uniqueByUserId,
            string $metadata = null,
            int $minimumValue = null,
            int $maximumValue = null,
            int $calculateFixedTimingHour = null,
            int $calculateFixedTimingMinute = null,
            int $calculateIntervalMinutes = null,
            string $entryPeriodEventId = null,
            string $accessPeriodEventId = null,
            string $generation = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->minimumValue = $minimumValue;
        $this->maximumValue = $maximumValue;
        $this->orderDirection = $orderDirection;
        $this->scope = $scope;
        $this->uniqueByUserId = $uniqueByUserId;
        $this->calculateFixedTimingHour = $calculateFixedTimingHour;
        $this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
        $this->calculateIntervalMinutes = $calculateIntervalMinutes;
        $this->entryPeriodEventId = $entryPeriodEventId;
        $this->accessPeriodEventId = $accessPeriodEventId;
        $this->generation = $generation;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->minimumValue != null) {
            $properties["MinimumValue"] = $this->minimumValue;
        }
        if ($this->maximumValue != null) {
            $properties["MaximumValue"] = $this->maximumValue;
        }
        if ($this->orderDirection != null) {
            $properties["OrderDirection"] = $this->orderDirection->toString();
        }
        if ($this->scope != null) {
            $properties["Scope"] = $this->scope->toString();
        }
        if ($this->uniqueByUserId != null) {
            $properties["UniqueByUserId"] = $this->uniqueByUserId;
        }
        if ($this->calculateFixedTimingHour != null) {
            $properties["CalculateFixedTimingHour"] = $this->calculateFixedTimingHour;
        }
        if ($this->calculateFixedTimingMinute != null) {
            $properties["CalculateFixedTimingMinute"] = $this->calculateFixedTimingMinute;
        }
        if ($this->calculateIntervalMinutes != null) {
            $properties["CalculateIntervalMinutes"] = $this->calculateIntervalMinutes;
        }
        if ($this->entryPeriodEventId != null) {
            $properties["EntryPeriodEventId"] = $this->entryPeriodEventId;
        }
        if ($this->accessPeriodEventId != null) {
            $properties["AccessPeriodEventId"] = $this->accessPeriodEventId;
        }
        if ($this->generation != null) {
            $properties["Generation"] = $this->generation;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): CategoryModelRef {
        return new CategoryModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
