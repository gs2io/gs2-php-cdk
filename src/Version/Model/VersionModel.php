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
use Gs2Cdk\Version\Model\Options\VersionModelOptions;
use Gs2Cdk\Version\Model\Options\VersionModelScopeIsPassiveOptions;
use Gs2Cdk\Version\Model\Options\VersionModelScopeIsActiveOptions;
use Gs2Cdk\Version\Model\Enum\VersionModelScope;

class VersionModel {
    private string $name;
    private Version $warningVersion;
    private Version $errorVersion;
    private VersionModelScope $scope;
    private ?string $metadata = null;
    private ?Version $currentVersion = null;
    private ?bool $needSignature = null;
    private ?string $signatureKeyId = null;

    public function __construct(
        string $name,
        Version $warningVersion,
        Version $errorVersion,
        VersionModelScope $scope,
        ?VersionModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->warningVersion = $warningVersion;
        $this->errorVersion = $errorVersion;
        $this->scope = $scope;
        $this->metadata = $options?->metadata ?? null;
        $this->currentVersion = $options?->currentVersion ?? null;
        $this->needSignature = $options?->needSignature ?? null;
        $this->signatureKeyId = $options?->signatureKeyId ?? null;
    }

    public static function scopeIsPassive(
        string $name,
        Version $warningVersion,
        Version $errorVersion,
        bool $needSignature,
        ?VersionModelScopeIsPassiveOptions $options = null,
    ): VersionModel {
        return (new VersionModel(
            $name,
            $warningVersion,
            $errorVersion,
            VersionModelScope::PASSIVE,
            new VersionModelOptions(
                needSignature: $needSignature,
                metadata: $options?->metadata,
            ),
        ));
    }

    public static function scopeIsActive(
        string $name,
        Version $warningVersion,
        Version $errorVersion,
        Version $currentVersion,
        ?VersionModelScopeIsActiveOptions $options = null,
    ): VersionModel {
        return (new VersionModel(
            $name,
            $warningVersion,
            $errorVersion,
            VersionModelScope::ACTIVE,
            new VersionModelOptions(
                currentVersion: $currentVersion,
                metadata: $options?->metadata,
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
        if ($this->warningVersion != null) {
            $properties["warningVersion"] = $this->warningVersion?->properties(
            );
        }
        if ($this->errorVersion != null) {
            $properties["errorVersion"] = $this->errorVersion?->properties(
            );
        }
        if ($this->scope != null) {
            $properties["scope"] = $this->scope?->toString(
            );
        }
        if ($this->currentVersion != null) {
            $properties["currentVersion"] = $this->currentVersion?->properties(
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
