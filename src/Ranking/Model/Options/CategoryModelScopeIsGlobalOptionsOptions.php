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
namespace Gs2Cdk\Ranking\Model\Options;
use Gs2Cdk\Ranking\Model\FixedTiming;
use Gs2Cdk\Ranking\Model\Scope;
use Gs2Cdk\Ranking\Model\GlobalRankingSetting;
use Gs2Cdk\Ranking\Model\Enums\CategoryModelOrderDirection;
use Gs2Cdk\Ranking\Model\Enums\CategoryModelScope;

class CategoryModelScopeIsGlobalOptions {
    public ?string $metadata;
    public ?int $minimumValue;
    public ?int $maximumValue;
    public ?string $entryPeriodEventId;
    public ?string $accessPeriodEventId;
    public ?int $calculateFixedTimingHour;
    public ?int $calculateFixedTimingMinute;
    public ?array $additionalScopes;
    public ?array $ignoreUserIds;
    public ?string $generation;
    
    public function __construct(
        ?string $metadata = null,
        ?int $minimumValue = null,
        ?int $maximumValue = null,
        ?string $entryPeriodEventId = null,
        ?string $accessPeriodEventId = null,
        ?int $calculateFixedTimingHour = null,
        ?int $calculateFixedTimingMinute = null,
        ?array $additionalScopes = null,
        ?array $ignoreUserIds = null,
        ?string $generation = null,
    ) {
        $this->metadata = $metadata;
        $this->minimumValue = $minimumValue;
        $this->maximumValue = $maximumValue;
        $this->entryPeriodEventId = $entryPeriodEventId;
        $this->accessPeriodEventId = $accessPeriodEventId;
        $this->calculateFixedTimingHour = $calculateFixedTimingHour;
        $this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
        $this->additionalScopes = $additionalScopes;
        $this->ignoreUserIds = $ignoreUserIds;
        $this->generation = $generation;
    }}
