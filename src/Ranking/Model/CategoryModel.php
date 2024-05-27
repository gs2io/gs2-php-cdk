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
use Gs2Cdk\Ranking\Model\FixedTiming;
use Gs2Cdk\Ranking\Model\Scope;
use Gs2Cdk\Ranking\Model\GlobalRankingSetting;
use Gs2Cdk\Ranking\Model\Options\CategoryModelOptions;
use Gs2Cdk\Ranking\Model\Options\CategoryModelScopeIsGlobalOptions;
use Gs2Cdk\Ranking\Model\Options\CategoryModelScopeIsScopedOptions;
use Gs2Cdk\Ranking\Model\Enum\CategoryModelOrderDirection;
use Gs2Cdk\Ranking\Model\Enum\CategoryModelScope;

class CategoryModel {
    private string $name;
    private bool $sum;
    private CategoryModelOrderDirection $orderDirection;
    private CategoryModelScope $scope;
    private ?string $metadata = null;
    private ?int $minimumValue = null;
    private ?int $maximumValue = null;
    private ?GlobalRankingSetting $globalRankingSetting = null;
    private ?string $entryPeriodEventId = null;
    private ?string $accessPeriodEventId = null;
    private ?bool $uniqueByUserId = null;
    private ?int $calculateFixedTimingHour = null;
    private ?int $calculateFixedTimingMinute = null;
    private ?int $calculateIntervalMinutes = null;
    private ?array $additionalScopes = null;
    private ?array $ignoreUserIds = null;
    private ?string $generation = null;

    public function __construct(
        string $name,
        bool $sum,
        CategoryModelOrderDirection $orderDirection,
        CategoryModelScope $scope,
        ?CategoryModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->sum = $sum;
        $this->orderDirection = $orderDirection;
        $this->scope = $scope;
        $this->metadata = $options?->metadata ?? null;
        $this->minimumValue = $options?->minimumValue ?? null;
        $this->maximumValue = $options?->maximumValue ?? null;
        $this->globalRankingSetting = $options?->globalRankingSetting ?? null;
        $this->entryPeriodEventId = $options?->entryPeriodEventId ?? null;
        $this->accessPeriodEventId = $options?->accessPeriodEventId ?? null;
        $this->uniqueByUserId = $options?->uniqueByUserId ?? null;
        $this->calculateFixedTimingHour = $options?->calculateFixedTimingHour ?? null;
        $this->calculateFixedTimingMinute = $options?->calculateFixedTimingMinute ?? null;
        $this->calculateIntervalMinutes = $options?->calculateIntervalMinutes ?? null;
        $this->additionalScopes = $options?->additionalScopes ?? null;
        $this->ignoreUserIds = $options?->ignoreUserIds ?? null;
        $this->generation = $options?->generation ?? null;
    }

    public static function scopeIsGlobal(
        string $name,
        bool $sum,
        CategoryModelOrderDirection $orderDirection,
        GlobalRankingSetting $globalRankingSetting,
        bool $uniqueByUserId,
        int $calculateIntervalMinutes,
        ?CategoryModelScopeIsGlobalOptions $options = null,
    ): CategoryModel {
        return (new CategoryModel(
            $name,
            $sum,
            $orderDirection,
            CategoryModelScope::GLOBAL,
            new CategoryModelOptions(
                globalRankingSetting: $globalRankingSetting,
                uniqueByUserId: $uniqueByUserId,
                calculateIntervalMinutes: $calculateIntervalMinutes,
                metadata: $options?->metadata,
                minimumValue: $options?->minimumValue,
                maximumValue: $options?->maximumValue,
                entryPeriodEventId: $options?->entryPeriodEventId,
                accessPeriodEventId: $options?->accessPeriodEventId,
                calculateFixedTimingHour: $options?->calculateFixedTimingHour,
                calculateFixedTimingMinute: $options?->calculateFixedTimingMinute,
                additionalScopes: $options?->additionalScopes,
                ignoreUserIds: $options?->ignoreUserIds,
                generation: $options?->generation,
            ),
        ));
    }

    public static function scopeIsScoped(
        string $name,
        bool $sum,
        CategoryModelOrderDirection $orderDirection,
        ?CategoryModelScopeIsScopedOptions $options = null,
    ): CategoryModel {
        return (new CategoryModel(
            $name,
            $sum,
            $orderDirection,
            CategoryModelScope::SCOPED,
            new CategoryModelOptions(
                metadata: $options?->metadata,
                minimumValue: $options?->minimumValue,
                maximumValue: $options?->maximumValue,
                entryPeriodEventId: $options?->entryPeriodEventId,
                accessPeriodEventId: $options?->accessPeriodEventId,
                calculateFixedTimingHour: $options?->calculateFixedTimingHour,
                calculateFixedTimingMinute: $options?->calculateFixedTimingMinute,
                additionalScopes: $options?->additionalScopes,
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
        if ($this->sum != null) {
            $properties["sum"] = $this->sum;
        }
        if ($this->orderDirection != null) {
            $properties["orderDirection"] = $this->orderDirection?->toString(
            );
        }
        if ($this->scope != null) {
            $properties["scope"] = $this->scope?->toString(
            );
        }
        if ($this->globalRankingSetting != null) {
            $properties["globalRankingSetting"] = $this->globalRankingSetting?->properties(
            );
        }
        if ($this->entryPeriodEventId != null) {
            $properties["entryPeriodEventId"] = $this->entryPeriodEventId;
        }
        if ($this->accessPeriodEventId != null) {
            $properties["accessPeriodEventId"] = $this->accessPeriodEventId;
        }
        if ($this->uniqueByUserId != null) {
            $properties["uniqueByUserId"] = $this->uniqueByUserId;
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
        if ($this->additionalScopes != null) {
            $properties["additionalScopes"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->additionalScopes
            );
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
