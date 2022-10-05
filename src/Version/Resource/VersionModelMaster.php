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

use Gs2Cdk\Version\Resource\Enum\VersionModelMasterScope;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

use Gs2Cdk\Version\Ref\VersionModelMasterRef;

class VersionModelMaster extends CdkResource {

    public Stack $stack;
    public string $namespaceName;
    public string $name;
    public Version $warningVersion;
    public Version $errorVersion;
    public string $scope;
    public ?Version $currentVersion;
    public ?bool $needSignature;
    public ?string $signatureKeyId;

    public function __construct(
            Stack $stack,
            string $namespaceName,
            string $name,
            Version $warningVersion,
            Version $errorVersion,
            string $scope,
            Version $currentVersion,
            bool $needSignature,
            string $signatureKeyId,
            string $description = null,
            string $metadata = null,
    ) {
        parent::__construct("Version_VersionModelMaster_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->name = $name;
        $this->description = $description;
        $this->metadata = $metadata;
        $this->warningVersion = $warningVersion;
        $this->errorVersion = $errorVersion;
        $this->scope = $scope;
        $this->currentVersion = $currentVersion;
        $this->needSignature = $needSignature;
        $this->signatureKeyId = $signatureKeyId;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Version::VersionModelMaster";
    }

    public function properties(): array {
        $properties = [];
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
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
    ): VersionModelMasterRef {
        return new VersionModelMasterRef(
            namespaceName: namespaceName,
            versionName: $this->name,
        );
    }

    public function getAttrVersionModelId(): GetAttr {
        return new GetAttr(
            key: "Item.VersionModelId"
        );
    }
}
