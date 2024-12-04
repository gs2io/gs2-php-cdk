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
use Gs2Cdk\Grade\Model\Options\ConsumeActionResultOptions;

class ConsumeActionResult {
    private string $action;
    private string $consumeRequest;
    private ?int $statusCode = null;
    private ?string $consumeResult = null;

    public function __construct(
        string $action,
        string $consumeRequest,
        ?ConsumeActionResultOptions $options = null,
    ) {
        $this->action = $action;
        $this->consumeRequest = $consumeRequest;
        $this->statusCode = $options?->statusCode ?? null;
        $this->consumeResult = $options?->consumeResult ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->action != null) {
            $properties["action"] = $this->action?->toString(
            );
        }
        if ($this->consumeRequest != null) {
            $properties["consumeRequest"] = $this->consumeRequest;
        }
        if ($this->statusCode != null) {
            $properties["statusCode"] = $this->statusCode;
        }
        if ($this->consumeResult != null) {
            $properties["consumeResult"] = $this->consumeResult;
        }

        return $properties;
    }
}
