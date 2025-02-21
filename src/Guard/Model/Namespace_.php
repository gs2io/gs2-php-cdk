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
namespace Gs2Cdk\Guard\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Guard\Model\BlockingPolicyModel;

use Gs2Cdk\Guard\Ref\NamespaceRef;
use Gs2Cdk\Guard\Model\Enums\NamespaceStatus;

use Gs2Cdk\Guard\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private BlockingPolicyModel $blockingPolicy;
    private ?string $description = null;

    public function __construct(
        Stack $stack,
        string $name,
        BlockingPolicyModel $blockingPolicy,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Guard_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->blockingPolicy = $blockingPolicy;
        $this->description = $options?->description ?? null;
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
        return "GS2::Guard::Namespace";
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
        if ($this->blockingPolicy != null) {
            $properties["BlockingPolicy"] = $this->blockingPolicy?->properties(
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
            $this,
            "Item.NamespaceId",
            null,
        ));
    }
}
