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

namespace Gs2Cdk\Core\Model;

abstract class CdkResource
{
    public String $resourceName;
    /**
     * @var array<String>
     */
    private array $dependsOn;

    public function __construct(
        String $resourceName
    ) {
        $this->resourceName = $resourceName;
        $this->dependsOn = [];
    }

    public function addDependsOn(
        CdkResource $resource
    ): CdkResource {
        array_push($this->dependsOn, $resource->resourceName);
        return $this;
    }

    abstract public function resourceType(): String;
    abstract public function properties(): array;

    public function template(): array {
        $properties = [
            "Type" => $this->resourceType(),
            "Properties" => $this->properties(),
        ];
        if (count($this->dependsOn) > 0) {
            $properties["DependsOn"] = $this->dependsOn;
        }
        return $properties;
    }
}