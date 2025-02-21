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

class VersionModelOptions {
    public ?string $metadata;
    public ?Version $currentVersion;
    public ?Version $warningVersion;
    public ?Version $errorVersion;
    public ?array $scheduleVersions;
    public ?bool $needSignature;
    public ?string $signatureKeyId;
    public ?VersionModelApproveRequirement $approveRequirement;
    
    public function __construct(
        ?string $metadata = null,
        ?Version $currentVersion = null,
        ?Version $warningVersion = null,
        ?Version $errorVersion = null,
        ?array $scheduleVersions = null,
        ?bool $needSignature = null,
        ?string $signatureKeyId = null,
        ?VersionModelApproveRequirement $approveRequirement = null,
    ) {
        $this->metadata = $metadata;
        $this->currentVersion = $currentVersion;
        $this->warningVersion = $warningVersion;
        $this->errorVersion = $errorVersion;
        $this->scheduleVersions = $scheduleVersions;
        $this->needSignature = $needSignature;
        $this->signatureKeyId = $signatureKeyId;
        $this->approveRequirement = $approveRequirement;
    }}

