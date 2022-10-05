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

use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

class CurrentMasterData extends CdkResource {

    public String $version = "2019-10-09";
    public String $namespaceName;
    /**
     * @var array<VersionModel>
     */
    public array $versionModels;

    /**
     * array<VersionModel> $versionModels
     */
    public function __construct(
            Stack $stack,
            String $namespaceName,
            array $versionModels,
    ) {
        parent::__construct("Version_CurrentVersionMaster_" . $namespaceName);

        $this->namespaceName = $namespaceName;
        $this->versionModels = $versionModels;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Version::CurrentVersionMaster";
    }

    public function properties(): array {
        return [
            "NamespaceName" => $this->namespaceName,
            "Settings" => [
                "version" => $this->version,
                "versionModels" => array_map(fn($v) => $v->properties(), $this->versionModels),
            ],
        ];
    }
}