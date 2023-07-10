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
namespace Gs2Cdk\Ranking\Model;
use Gs2Cdk\Ranking\Model\Options\CategoryModelOptions;
use Gs2Cdk\Ranking\Model\Options\CategoryModelScopeIsGlobalOptions;
use Gs2Cdk\Ranking\Model\Options\CategoryModelScopeIsScopedOptions;
use Gs2Cdk\Ranking\Model\Enum\CategoryModelOrderDirection;
use Gs2Cdk\Ranking\Model\Enum\CategoryModelScope;

class CategoryModel {
    private string $name;
    private CategoryModelOrderDirection $orderDirection;
    private CategoryModelScope $scope;
    private bool $uniqueByUserId;
    private ?string $metadata = null;
    private ?int $minimumValue = null;
    private ?int $maximumValue = null;
    private ?bool $sum = null;
    private ?int $calculateFixedTimingHour = null;
    private ?int $calculateFixedTimingMinute = null;
    private ?int $calculateIntervalMinutes = null;
    private ?string $entryPeriodEventId = null;
    private ?string $accessPeriodEventId = null;
    private ?array $ignoreUserIds = null;
    private ?string $generation = null;

    public function __construct(
        string $name,
        CategoryModelOrderDirection $orderDirection,
        CategoryModelScope $scope,
        bool $uniqueByUserId,
        ?CategoryModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->orderDirection = $orderDirection;
        $this->scope = $scope;
        $this->uniqueByUserId = $uniqueByUserId;
        $this->metadata = $options?->metadata ?? null;
        $this->minimumValue = $options?->minimumValue ?? null;
        $this->maximumValue = $options?->maximumValue ?? null;
        $this->sum = $options?->sum ?? null;
        $this->calculateFixedTimingHour = $options?->calculateFixedTimingHour ?? null;
        $this->calculateFixedTimingMinute = $options?->calculateFixedTimingMinute ?? null;
        $this->calculateIntervalMinutes = $options?->calculateIntervalMinutes ?? null;
        $this->entryPeriodEventId = $options?->entryPeriodEventId ?? null;
        $this->accessPeriodEventId = $options?->accessPeriodEventId ?? null;
        $this->ignoreUserIds = $options?->ignoreUserIds ?? null;
        $this->generation = $options?->generation ?? null;
    }

    public static function scopeIsGlobal(
        string $name,
        CategoryModelOrderDirection $orderDirection,
        bool $uniqueByUserId,
        int $calculateIntervalMinutes,
        ?CategoryModelScopeIsGlobalOptions $options = null,
    ): CategoryModel {
        return (new CategoryModel(
            $name,
            $orderDirection,
            CategoryModelScope::GLOBAL,
            $uniqueByUserId,
            new CategoryModelOptions(
                calculateIntervalMinutes: $calculateIntervalMinutes,
                metadata: $options?->metadata,
                minimumValue: $options?->minimumValue,
                maximumValue: $options?->maximumValue,
                calculateFixedTimingHour: $options?->calculateFixedTimingHour,
                calculateFixedTimingMinute: $options?->calculateFixedTimingMinute,
                entryPeriodEventId: $options?->entryPeriodEventId,
                accessPeriodEventId: $options?->accessPeriodEventId,
                ignoreUserIds: $options?->ignoreUserIds,
                generation: $options?->generation,
            ),
        ));
    }

    public static function scopeIsScoped(
        string $name,
        CategoryModelOrderDirection $orderDirection,
        bool $uniqueByUserId,
        ?CategoryModelScopeIsScopedOptions $options = null,
    ): CategoryModel {
        return (new CategoryModel(
            $name,
            $orderDirection,
            CategoryModelScope::SCOPED,
            $uniqueByUserId,
            new CategoryModelOptions(
                metadata: $options?->metadata,
                minimumValue: $options?->minimumValue,
                maximumValue: $options?->maximumValue,
                calculateFixedTimingHour: $options?->calculateFixedTimingHour,
                calculateFixedTimingMinute: $options?->calculateFixedTimingMinute,
                entryPeriodEventId: $options?->entryPeriodEventId,
                accessPeriodEventId: $options?->accessPeriodEventId,
                ignoreUserIds: $options?->ignoreUserIds,
                generation: $options?->generation,
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
        if ($this->minimumValue != null) {
            $properties["minimumValue"] = $this->minimumValue;
        }
        if ($this->maximumValue != null) {
            $properties["maximumValue"] = $this->maximumValue;
        }
        if ($this->orderDirection != null) {
            $properties["orderDirection"] = $this->orderDirection?->toString(
            );
        }
        if ($this->scope != null) {
            $properties["scope"] = $this->scope?->toString(
            );
        }
        if ($this->uniqueByUserId != null) {
            $properties["uniqueByUserId"] = $this->uniqueByUserId;
        }
        if ($this->sum != null) {
            $properties["sum"] = $this->sum;
        }
        if ($this->calculateFixedTimingHour != null) {
            $properties["calculateFixedTimingHour"] = $this->calculateFixedTimingHour;
        }
        if ($this->calculateFixedTimingMinute != null) {
            $properties["calculateFixedTimingMinute"] = $this->calculateFixedTimingMinute;
        }
        if ($this->calculateIntervalMinutes != null) {
            $properties["calculateIntervalMinutes"] = $this->calculateIntervalMinutes;
        }
        if ($this->entryPeriodEventId != null) {
            $properties["entryPeriodEventId"] = $this->entryPeriodEventId;
        }
        if ($this->accessPeriodEventId != null) {
            $properties["accessPeriodEventId"] = $this->accessPeriodEventId;
        }
        if ($this->ignoreUserIds != null) {
            $properties["ignoreUserIds"] = $this->ignoreUserIds;
        }
        if ($this->generation != null) {
            $properties["generation"] = $this->generation;
        }

        return $properties;
    }
}
