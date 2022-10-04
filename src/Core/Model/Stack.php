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

use Symfony\Component\Yaml\Yaml;

class Stack
{

    /**
     * @var array<CdkResource>
     */
    public array $resources;
    /**
     * @var array<string, string>
     */
    public array $outputs;

    public function __construct() {
        $this->resources = [];
        $this->outputs = [];
    }

    public function addResource(
        CdkResource $resource
    ) {
        array_push($this->resources, $resource);
    }

    public function output(
        String $name,
        String $path,
    ) {
        $this->outputs[$name] = $path;
    }

    public function template(): array {
        $templateResources = [];
        foreach ($this->resources as $resource) {
            $templateResources[$resource->resourceName] = $resource->template();
        }
        return [
            "GS2TemplateFormatVersion" => "2019-05-01",
            "Resources" => $templateResources,
            "Outputs" => $this->outputs,
        ];
    }

    public function yaml(): String {
        return preg_replace('/"!(.*) (.*)"/', '!\1 \2', preg_replace('/\'!(.*) (.*)\'/', '!\1 \2', Yaml::dump($this->template(), 64)));
    }

}