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
namespace Gs2Cdk\Log\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;

use Gs2Cdk\Log\Ref\FacetModelRef;
use Gs2Cdk\Log\Model\Enums\FacetModelType;

use Gs2Cdk\Log\Model\Options\FacetModelOptions;

class FacetModel extends CdkResource {
    private Stack $stack;
    private string $namespaceName;
    private string $field;
    private FacetModelType $type;
    private string $displayName;
    private ?int $order = null;

    public function __construct(
        Stack $stack,
        string $namespaceName,
        string $field,
        FacetModelType $type,
        string $displayName,
        ?FacetModelOptions $options = null,
    ) {
        parent::__construct(
            "Log_FacetModel_" . $field
        );

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->field = $field;
        $this->type = $type;
        $this->displayName = $displayName;
        $this->order = $options?->order ?? null;
        $stack->addResource(
            $this,
        );
    }


    public function alternateKeys(
    ) {
        return "field";
    }

    public function resourceType(
    ): string {
        return "GS2::Log::FacetModel";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->field != null) {
            $properties["Field"] = $this->field;
        }
        if ($this->type != null) {
            $properties["Type"] = $this->type;
        }
        if ($this->displayName != null) {
            $properties["DisplayName"] = $this->displayName;
        }
        if ($this->order != null) {
            $properties["Order"] = $this->order;
        }

        return $properties;
    }

    public function ref(
    ): FacetModelRef {
        return (new FacetModelRef(
            $this->namespaceName,
            $this->field,
        ));
    }

    public function getAttrFacetModelId(
    ): GetAttr {
        return (new GetAttr(
            $this,
            "Item.FacetModelId",
            null,
        ));
    }
}
