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
use Gs2Cdk\Version\Model\Options\TargetVersionOptions;

class TargetVersion {
    private string $versionName;
    private Version $version;
    private ?string $body = null;
    private ?string $signature = null;

    public function __construct(
        string $versionName,
        Version $version,
        ?TargetVersionOptions $options = null,
    ) {
        $this->versionName = $versionName;
        $this->version = $version;
        $this->body = $options?->body ?? null;
        $this->signature = $options?->signature ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->versionName != null) {
            $properties["versionName"] = $this->versionName;
        }
        if ($this->version != null) {
            $properties["version"] = $this->version?->properties(
            );
        }
        if ($this->body != null) {
            $properties["body"] = $this->body;
        }
        if ($this->signature != null) {
            $properties["signature"] = $this->signature;
        }

        return $properties;
    }
}
