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
namespace Gs2Cdk\Showcase\Model;
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Showcase\Model\Options\SalesItemOptions;

class SalesItem {
    private string $name;
    private array $acquireActions;
    private ?string $metadata = null;
    private ?array $verifyActions = null;
    private ?array $consumeActions = null;

    public function __construct(
        string $name,
        array $acquireActions,
        ?SalesItemOptions $options = null,
    ) {
        $this->name = $name;
        $this->acquireActions = $acquireActions;
        $this->metadata = $options?->metadata ?? null;
        $this->verifyActions = $options?->verifyActions ?? null;
        $this->consumeActions = $options?->consumeActions ?? null;
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
        if ($this->verifyActions != null) {
            $properties["verifyActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->verifyActions
            );
        }
        if ($this->consumeActions != null) {
            $properties["consumeActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->consumeActions
            );
        }
        if ($this->acquireActions != null) {
            $properties["acquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->acquireActions
            );
        }

        return $properties;
    }
}
