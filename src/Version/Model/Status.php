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
namespace Gs2Cdk\Version\Model;
use Gs2Cdk\Version\Model\Version;
use Gs2Cdk\Version\Model\ScheduleVersion;
use Gs2Cdk\Version\Model\VersionModel;
use Gs2Cdk\Version\Model\Options\StatusOptions;

class Status {
    private VersionModel $versionModel;
    private ?Version $currentVersion = null;

    public function __construct(
        VersionModel $versionModel,
        ?StatusOptions $options = null,
    ) {
        $this->versionModel = $versionModel;
        $this->currentVersion = $options?->currentVersion ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->versionModel != null) {
            $properties["versionModel"] = $this->versionModel?->properties(
            );
        }
        if ($this->currentVersion != null) {
            $properties["currentVersion"] = $this->currentVersion?->properties(
            );
        }

        return $properties;
    }
}
