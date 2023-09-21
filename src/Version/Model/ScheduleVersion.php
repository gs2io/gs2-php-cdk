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
use Gs2Cdk\Version\Model\Options\ScheduleVersionOptions;

class ScheduleVersion {
    private Version $currentVersion;
    private Version $warningVersion;
    private Version $errorVersion;
    private ?string $scheduleEventId = null;

    public function __construct(
        Version $currentVersion,
        Version $warningVersion,
        Version $errorVersion,
        ?ScheduleVersionOptions $options = null,
    ) {
        $this->currentVersion = $currentVersion;
        $this->warningVersion = $warningVersion;
        $this->errorVersion = $errorVersion;
        $this->scheduleEventId = $options?->scheduleEventId ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->currentVersion != null) {
            $properties["currentVersion"] = $this->currentVersion?->properties(
            );
        }
        if ($this->warningVersion != null) {
            $properties["warningVersion"] = $this->warningVersion?->properties(
            );
        }
        if ($this->errorVersion != null) {
            $properties["errorVersion"] = $this->errorVersion?->properties(
            );
        }
        if ($this->scheduleEventId != null) {
            $properties["scheduleEventId"] = $this->scheduleEventId;
        }

        return $properties;
    }
}
