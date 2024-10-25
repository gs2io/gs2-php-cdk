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
 *
 * deny overwrite
 */

namespace Gs2Cdk\Identifier\Model;


use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;

class AttachGuard extends CdkResource {

    public Stack $stack;
    public String $userName;
    public String $clientId;
    public String $guardNamespaceId;

    public function __construct(
        Stack $stack,
        String $userName,
        String $clientId,
        String $guardNamespaceId
    ) {
        parent::__construct("Identifier_AttachGuard_" . $userName);
        $this->stack = $stack;
        $this->userName = $userName;
        $this->clientId = $clientId;
        $this->guardNamespaceId = $guardNamespaceId;
    }

    public function resourceType(): String {
        return "GS2::Identifier::AttachGuard";
    }

    public function properties(): array {
        $properties = [];
        if ($this->userName != null) {
            $properties["UserName"] = $this->userName;
        }
        if ($this->clientId != null) {
            $properties["ClientId"] = $this->clientId;
        }
        if ($this->guardNamespaceId != null) {
            $properties["GuardId"] = $this->guardNamespaceId;
        }
        return $properties;
    }
}