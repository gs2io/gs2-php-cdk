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

namespace Gs2Cdk\Stamina\Resource;


class RecoverIntervalTable {
	public string $name;
	public ?string $metadata;
	public string $experienceModelId;
	public array $values;

    public function __construct(
            string $name,
            string $experienceModelId,
            array $values,
            string $metadata = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->experienceModelId = $experienceModelId;
        $this->values = $values;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->experienceModelId != null) {
            $properties["ExperienceModelId"] = $this->experienceModelId;
        }
        if ($this->values != null) {
            $properties["Values"] = $this->values;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): RecoverIntervalTableRef {
        return new RecoverIntervalTableRef(
            $namespaceName,
            $this->name,
        );
    }
}
