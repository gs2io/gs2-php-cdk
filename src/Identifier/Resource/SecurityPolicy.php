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
 *
 * deny overwrite
 */

namespace Gs2Cdk\Identifier\Resource;


use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Identifier\Model\Policy;
use Gs2Cdk\Identifier\Ref\SecurityPolicyRef;

class SecurityPolicy extends CdkResource {

    public Stack $stack;
    public string $name;
    public ?string $description;
    public Policy $policy;

    public function __construct(
            Stack $stack,
            string $name,
            Policy $policy,
            string $description = null,
    ) {
        parent::__construct("Identifier_SecurityPolicy_" . $name);

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $description;
        $this->policy = $policy;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Identifier::SecurityPolicy";
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->policy != null) {
            $properties["Policy"] = $this->policy->properties();
        }
        return $properties;
    }

    public function ref(
    ): SecurityPolicyRef {
        return new SecurityPolicyRef(
            securityPolicyName: $this->name,
        );
    }

    public function getAttrSecurityPolicyId(): GetAttr {
        return new GetAttr(
            key: "Item.SecurityPolicyId"
        );
    }
}
