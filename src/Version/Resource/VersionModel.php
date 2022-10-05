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

namespace Gs2Cdk\Version\Resource;

use Gs2Cdk\Version\Resource\Enum\VersionModelScope;

class VersionModel {
	public string $name;
	public ?string $metadata;
	public Version $warningVersion;
	public Version $errorVersion;
	public VersionModelScope $scope;
	public ?Version $currentVersion;
	public ?bool $needSignature;
	public ?string $signatureKeyId;

    public function __construct(
            string $name,
            Version $warningVersion,
            Version $errorVersion,
            VersionModelScope $scope,
            string $metadata = null,
            Version $currentVersion = null,
            bool $needSignature = null,
            string $signatureKeyId = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->warningVersion = $warningVersion;
        $this->errorVersion = $errorVersion;
        $this->scope = $scope;
        $this->currentVersion = $currentVersion;
        $this->needSignature = $needSignature;
        $this->signatureKeyId = $signatureKeyId;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->warningVersion != null) {
            $properties["WarningVersion"] = $this->warningVersion->properties();
        }
        if ($this->errorVersion != null) {
            $properties["ErrorVersion"] = $this->errorVersion->properties();
        }
        if ($this->scope != null) {
            $properties["Scope"] = $this->scope->toString();
        }
        if ($this->currentVersion != null) {
            $properties["CurrentVersion"] = $this->currentVersion->properties();
        }
        if ($this->needSignature != null) {
            $properties["NeedSignature"] = $this->needSignature;
        }
        if ($this->signatureKeyId != null) {
            $properties["SignatureKeyId"] = $this->signatureKeyId;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): VersionModelRef {
        return new VersionModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
