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
use Gs2Cdk\Version\Model\Options\VersionModelOptions;
use Gs2Cdk\Version\Model\Options\VersionModelTypeIsSimpleOptions;
use Gs2Cdk\Version\Model\Options\VersionModelTypeIsScheduleOptions;
use Gs2Cdk\Version\Model\Options\VersionModelScopeIsPassiveOptions;
use Gs2Cdk\Version\Model\Options\VersionModelScopeIsActiveOptions;
use Gs2Cdk\Version\Model\Enum\VersionModelScope;
use Gs2Cdk\Version\Model\Enum\VersionModelType;

class VersionModel {
    private string $name;
    private VersionModelScope $scope;
    private VersionModelType $type;
    private ?string $metadata = null;
    private ?Version $currentVersion = null;
    private ?Version $warningVersion = null;
    private ?Version $errorVersion = null;
    private ?array $scheduleVersions = null;
    private ?bool $needSignature = null;
    private ?string $signatureKeyId = null;

    public function __construct(
        string $name,
        VersionModelScope $scope,
        VersionModelType $type,
        ?VersionModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->scope = $scope;
        $this->type = $type;
        $this->metadata = $options?->metadata ?? null;
        $this->currentVersion = $options?->currentVersion ?? null;
        $this->warningVersion = $options?->warningVersion ?? null;
        $this->errorVersion = $options?->errorVersion ?? null;
        $this->scheduleVersions = $options?->scheduleVersions ?? null;
        $this->needSignature = $options?->needSignature ?? null;
        $this->signatureKeyId = $options?->signatureKeyId ?? null;
    }

    public static function typeIsSimple(
        string $name,
        VersionModelScope $scope,
        Version $warningVersion,
        Version $errorVersion,
        ?VersionModelTypeIsSimpleOptions $options = null,
    ): VersionModel {
        return (new VersionModel(
            $name,
            $scope,
            VersionModelType::SIMPLE,
            new VersionModelOptions(
                warningVersion: $warningVersion,
                errorVersion: $errorVersion,
                metadata: $options?->metadata,
                scheduleVersions: $options?->scheduleVersions,
            ),
        ));
    }

    public static function typeIsSchedule(
        string $name,
        VersionModelScope $scope,
        ?VersionModelTypeIsScheduleOptions $options = null,
    ): VersionModel {
        return (new VersionModel(
            $name,
            $scope,
            VersionModelType::SCHEDULE,
            new VersionModelOptions(
                metadata: $options?->metadata,
                scheduleVersions: $options?->scheduleVersions,
            ),
        ));
    }

    public static function scopeIsPassive(
        string $name,
        VersionModelType $type,
        bool $needSignature,
        ?VersionModelScopeIsPassiveOptions $options = null,
    ): VersionModel {
        return (new VersionModel(
            $name,
            VersionModelScope::PASSIVE,
            $type,
            new VersionModelOptions(
                needSignature: $needSignature,
                metadata: $options?->metadata,
                scheduleVersions: $options?->scheduleVersions,
            ),
        ));
    }

    public static function scopeIsActive(
        string $name,
        VersionModelType $type,
        ?VersionModelScopeIsActiveOptions $options = null,
    ): VersionModel {
        return (new VersionModel(
            $name,
            VersionModelScope::ACTIVE,
            $type,
            new VersionModelOptions(
                metadata: $options?->metadata,
                scheduleVersions: $options?->scheduleVersions,
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
        if ($this->scope != null) {
            $properties["scope"] = $this->scope?->toString(
            );
        }
        if ($this->type != null) {
            $properties["type"] = $this->type?->toString(
            );
        }
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
        if ($this->scheduleVersions != null) {
            $properties["scheduleVersions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->scheduleVersions
            );
        }
        if ($this->needSignature != null) {
            $properties["needSignature"] = $this->needSignature;
        }
        if ($this->signatureKeyId != null) {
            $properties["signatureKeyId"] = $this->signatureKeyId;
        }

        return $properties;
    }
}
