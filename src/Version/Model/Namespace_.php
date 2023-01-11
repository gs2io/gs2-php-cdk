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

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Version\Ref\NamespaceRef;
use Gs2Cdk\Version\Model\CurrentMasterData;
use Gs2Cdk\Version\Model\VersionModel;

use Gs2Cdk\Version\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private string $assumeUserId;
    private ?string $description = null;
    private ?ScriptSetting $acceptVersionScript = null;
    private ?string $checkVersionTriggerScriptId = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        string $assumeUserId,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Version_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->assumeUserId = $assumeUserId;
        $this->description = $options?->description ?? null;
        $this->acceptVersionScript = $options?->acceptVersionScript ?? null;
        $this->checkVersionTriggerScriptId = $options?->checkVersionTriggerScriptId ?? null;
        $this->logSetting = $options?->logSetting ?? null;
        $stack->addResource(
            $this,
        );
    }


    public function alternateKeys(
    ) {
        return "name";
    }

    public function resourceType(
    ): string {
        return "GS2::Version::Namespace";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->assumeUserId != null) {
            $properties["AssumeUserId"] = $this->assumeUserId;
        }
        if ($this->acceptVersionScript != null) {
            $properties["AcceptVersionScript"] = $this->acceptVersionScript?->properties(
            );
        }
        if ($this->checkVersionTriggerScriptId != null) {
            $properties["CheckVersionTriggerScriptId"] = $this->checkVersionTriggerScriptId;
        }
        if ($this->logSetting != null) {
            $properties["LogSetting"] = $this->logSetting?->properties(
            );
        }

        return $properties;
    }

    public function ref(
    ): NamespaceRef {
        return (new NamespaceRef(
            $this->name,
        ));
    }

    public function getAttrNamespaceId(
    ): GetAttr {
        return (new GetAttr(
            null,
            null,
            "Item.NamespaceId",
        ));
    }

    public function masterData(
        array $versionModels,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $versionModels,
        ))->addDependsOn(
            $this,
        );
        return $this;
    }
}
