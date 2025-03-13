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
namespace Gs2Cdk\Money2\Model;
use Gs2Cdk\Money2\Model\AppleAppStoreSubscriptionContent;
use Gs2Cdk\Money2\Model\GooglePlaySubscriptionContent;
use Gs2Cdk\Money2\Model\Options\StoreSubscriptionContentModelOptions;
use Gs2Cdk\Money2\Model\Options\StoreSubscriptionContentModelTriggerExtendModeIsJustOptions;
use Gs2Cdk\Money2\Model\Options\StoreSubscriptionContentModelTriggerExtendModeIsRollupHourOptions;
use Gs2Cdk\Money2\Model\Enums\StoreSubscriptionContentModelTriggerExtendMode;

class StoreSubscriptionContentModel {
    private string $name;
    private string $scheduleNamespaceId;
    private string $triggerName;
    private StoreSubscriptionContentModelTriggerExtendMode $triggerExtendMode;
    private int $reallocateSpanDays;
    private ?string $metadata = null;
    private ?int $rollupHour = null;
    private ?AppleAppStoreSubscriptionContent $appleAppStore = null;
    private ?GooglePlaySubscriptionContent $googlePlay = null;

    public function __construct(
        string $name,
        string $scheduleNamespaceId,
        string $triggerName,
        StoreSubscriptionContentModelTriggerExtendMode $triggerExtendMode,
        int $reallocateSpanDays,
        ?StoreSubscriptionContentModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->scheduleNamespaceId = $scheduleNamespaceId;
        $this->triggerName = $triggerName;
        $this->triggerExtendMode = $triggerExtendMode;
        $this->reallocateSpanDays = $reallocateSpanDays;
        $this->metadata = $options?->metadata ?? null;
        $this->rollupHour = $options?->rollupHour ?? null;
        $this->appleAppStore = $options?->appleAppStore ?? null;
        $this->googlePlay = $options?->googlePlay ?? null;
    }

    public static function triggerExtendModeIsJust(
        string $name,
        string $scheduleNamespaceId,
        string $triggerName,
        int $reallocateSpanDays,
        ?StoreSubscriptionContentModelTriggerExtendModeIsJustOptions $options = null,
    ): StoreSubscriptionContentModel {
        return (new StoreSubscriptionContentModel(
            $name,
            $scheduleNamespaceId,
            $triggerName,
            StoreSubscriptionContentModelTriggerExtendMode::JUST,
            $reallocateSpanDays,
            new StoreSubscriptionContentModelOptions(
                metadata: $options?->metadata,
                appleAppStore: $options?->appleAppStore,
                googlePlay: $options?->googlePlay,
            ),
        ));
    }

    public static function triggerExtendModeIsRollupHour(
        string $name,
        string $scheduleNamespaceId,
        string $triggerName,
        int $reallocateSpanDays,
        int $rollupHour,
        ?StoreSubscriptionContentModelTriggerExtendModeIsRollupHourOptions $options = null,
    ): StoreSubscriptionContentModel {
        return (new StoreSubscriptionContentModel(
            $name,
            $scheduleNamespaceId,
            $triggerName,
            StoreSubscriptionContentModelTriggerExtendMode::ROLLUP_HOUR,
            $reallocateSpanDays,
            new StoreSubscriptionContentModelOptions(
                rollupHour: $rollupHour,
                metadata: $options?->metadata,
                appleAppStore: $options?->appleAppStore,
                googlePlay: $options?->googlePlay,
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
        if ($this->scheduleNamespaceId != null) {
            $properties["scheduleNamespaceId"] = $this->scheduleNamespaceId;
        }
        if ($this->triggerName != null) {
            $properties["triggerName"] = $this->triggerName;
        }
        if ($this->triggerExtendMode != null) {
            $properties["triggerExtendMode"] = $this->triggerExtendMode?->toString(
            );
        }
        if ($this->rollupHour != null) {
            $properties["rollupHour"] = $this->rollupHour;
        }
        if ($this->reallocateSpanDays != null) {
            $properties["reallocateSpanDays"] = $this->reallocateSpanDays;
        }
        if ($this->appleAppStore != null) {
            $properties["appleAppStore"] = $this->appleAppStore?->properties(
            );
        }
        if ($this->googlePlay != null) {
            $properties["googlePlay"] = $this->googlePlay?->properties(
            );
        }

        return $properties;
    }
}
