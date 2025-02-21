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
namespace Gs2Cdk\Version\Model\Options;
use Gs2Cdk\Version\Model\Version;
use Gs2Cdk\Version\Model\ScheduleVersion;
use Gs2Cdk\Version\Model\Enums\VersionModelScope;
use Gs2Cdk\Version\Model\Enums\VersionModelType;
use Gs2Cdk\Version\Model\Enums\VersionModelApproveRequirement;

class VersionModelTypeIsScheduleOptions {
    public ?string $metadata;
    public ?array $scheduleVersions;
    
    public function __construct(
        ?string $metadata = null,
        ?array $scheduleVersions = null,
    ) {
        $this->metadata = $metadata;
        $this->scheduleVersions = $scheduleVersions;
    }}
