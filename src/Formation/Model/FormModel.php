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
namespace Gs2Cdk\Formation\Model;
use Gs2Cdk\Formation\Model\SlotModel;
use Gs2Cdk\Formation\Model\Options\FormModelOptions;

class FormModel {
    private string $name;
    private array $slots;
    private ?string $metadata = null;

    public function __construct(
        string $name,
        array $slots,
        ?FormModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->slots = $slots;
        $this->metadata = $options?->metadata ?? null;
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
        if ($this->slots != null) {
            $properties["slots"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->slots
            );
        }

        return $properties;
    }
}
