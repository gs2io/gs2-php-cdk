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
namespace Gs2Cdk\StateMachine\Model;
use Gs2Cdk\StateMachine\Model\Options\AcquireActionResultOptions;

class AcquireActionResult {
    private string $action;
    private string $acquireRequest;
    private ?int $statusCode = null;
    private ?string $acquireResult = null;

    public function __construct(
        string $action,
        string $acquireRequest,
        ?AcquireActionResultOptions $options = null,
    ) {
        $this->action = $action;
        $this->acquireRequest = $acquireRequest;
        $this->statusCode = $options?->statusCode ?? null;
        $this->acquireResult = $options?->acquireResult ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->action != null) {
            $properties["action"] = $this->action?->toString(
            );
        }
        if ($this->acquireRequest != null) {
            $properties["acquireRequest"] = $this->acquireRequest;
        }
        if ($this->statusCode != null) {
            $properties["statusCode"] = $this->statusCode;
        }
        if ($this->acquireResult != null) {
            $properties["acquireResult"] = $this->acquireResult;
        }

        return $properties;
    }
}
