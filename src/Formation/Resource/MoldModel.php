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

namespace Gs2Cdk\Formation\Resource;


class MoldModel {
	public string $name;
	public ?string $metadata;
	public int $initialMaxCapacity;
	public int $maxCapacity;
	public FormModel $formModel;

    public function __construct(
            string $name,
            int $initialMaxCapacity,
            int $maxCapacity,
            FormModel $formModel,
            string $metadata = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->initialMaxCapacity = $initialMaxCapacity;
        $this->maxCapacity = $maxCapacity;
        $this->formModel = $formModel;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->initialMaxCapacity != null) {
            $properties["InitialMaxCapacity"] = $this->initialMaxCapacity;
        }
        if ($this->maxCapacity != null) {
            $properties["MaxCapacity"] = $this->maxCapacity;
        }
        if ($this->formModel != null) {
            $properties["FormModel"] = $this->formModel->properties();
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): MoldModelRef {
        return new MoldModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
