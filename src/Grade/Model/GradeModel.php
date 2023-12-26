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
namespace Gs2Cdk\Grade\Model;
use Gs2Cdk\Grade\Model\DefaultGradeModel;
use Gs2Cdk\Grade\Model\GradeEntryModel;
use Gs2Cdk\Grade\Model\AcquireActionRate;
use Gs2Cdk\Grade\Model\Options\GradeModelOptions;

class GradeModel {
    private string $name;
    private string $experienceModelId;
    private array $gradeEntries;
    private ?string $metadata = null;
    private ?array $defaultGrades = null;
    private ?array $acquireActionRates = null;

    public function __construct(
        string $name,
        string $experienceModelId,
        array $gradeEntries,
        ?GradeModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->experienceModelId = $experienceModelId;
        $this->gradeEntries = $gradeEntries;
        $this->metadata = $options?->metadata ?? null;
        $this->defaultGrades = $options?->defaultGrades ?? null;
        $this->acquireActionRates = $options?->acquireActionRates ?? null;
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
        if ($this->defaultGrades != null) {
            $properties["defaultGrades"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->defaultGrades
            );
        }
        if ($this->experienceModelId != null) {
            $properties["experienceModelId"] = $this->experienceModelId;
        }
        if ($this->gradeEntries != null) {
            $properties["gradeEntries"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->gradeEntries
            );
        }
        if ($this->acquireActionRates != null) {
            $properties["acquireActionRates"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->acquireActionRates
            );
        }

        return $properties;
    }
}
