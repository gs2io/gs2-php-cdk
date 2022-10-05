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

use Gs2Cdk\Ranking\Resource\Enum\CategoryModelMasterOrderDirection;
use Gs2Cdk\Ranking\Resource\Enum\CategoryModelMasterScope;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

use Gs2Cdk\Ranking\Ref\CategoryModelMasterRef;

class CategoryModelMaster extends CdkResource {

    public Stack $stack;
    public string $namespaceName;
    public string $name;
    public string $orderDirection;
    public string $scope;
    public ?bool $uniqueByUserId;
    public ?int $calculateIntervalMinutes;

    public function __construct(
            Stack $stack,
            string $namespaceName,
            string $name,
            string $orderDirection,
            string $scope,
            bool $uniqueByUserId,
            int $calculateIntervalMinutes,
            string $description = null,
            string $metadata = null,
            int $minimumValue = null,
            int $maximumValue = null,
            int $calculateFixedTimingHour = null,
            int $calculateFixedTimingMinute = null,
            string $entryPeriodEventId = null,
            string $accessPeriodEventId = null,
            string $generation = null,
    ) {
        parent::__construct("Ranking_CategoryModelMaster_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->name = $name;
        $this->description = $description;
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

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Ranking::CategoryModelMaster";
    }

    public function properties(): array {
        $properties = [];
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
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
    ): CategoryModelMasterRef {
        return new CategoryModelMasterRef(
            namespaceName: namespaceName,
            categoryName: $this->name,
        );
    }

    public function getAttrCategoryModelId(): GetAttr {
        return new GetAttr(
            key: "Item.CategoryModelId"
        );
    }
}
