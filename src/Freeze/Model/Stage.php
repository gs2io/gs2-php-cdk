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
namespace Gs2Cdk\Freeze\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;

use Gs2Cdk\Freeze\Ref\StageRef;
use Gs2Cdk\Freeze\Model\Enums\StageStatus;

use Gs2Cdk\Freeze\Model\Options\StageOptions;

class Stage extends CdkResource {
    private Stack $stack;
    private string $ownerId;
    private string $name;
    private int $sortNumber;
    private ?string $sourceStageName = null;

    public function __construct(
        Stack $stack,
        string $ownerId,
        string $name,
        int $sortNumber,
        ?StageOptions $options = null,
    ) {
        parent::__construct(
            "Freeze_Stage_" . $name
        );

        $this->stack = $stack;
        $this->ownerId = $ownerId;
        $this->name = $name;
        $this->sortNumber = $sortNumber;
        $this->sourceStageName = $options?->sourceStageName ?? null;
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
        return "GS2::Freeze::Stage";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->ownerId != null) {
            $properties["OwnerId"] = $this->ownerId;
        }
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->sourceStageName != null) {
            $properties["SourceStageName"] = $this->sourceStageName;
        }
        if ($this->sortNumber != null) {
            $properties["SortNumber"] = $this->sortNumber;
        }

        return $properties;
    }

    public function ref(
    ): StageRef {
        return (new StageRef(
            $this->name,
        ));
    }

    public function getAttrStageId(
    ): GetAttr {
        return (new GetAttr(
            $this,
            "Item.StageId",
            null,
        ));
    }
}
