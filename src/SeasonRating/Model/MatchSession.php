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
namespace Gs2Cdk\SeasonRating\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;

use Gs2Cdk\SeasonRating\Ref\MatchSessionRef;

use Gs2Cdk\SeasonRating\Model\Options\MatchSessionOptions;

class MatchSession extends CdkResource {
    private Stack $stack;
    private string $namespaceName;
    private ?string $sessionName = null;
    private ?int $ttlSeconds = null;

    public function __construct(
        Stack $stack,
        string $namespaceName,
        ?MatchSessionOptions $options = null,
    ) {
        parent::__construct(
            "SeasonRating_MatchSession_" . $name
        );

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->sessionName = $options?->sessionName ?? null;
        $this->ttlSeconds = $options?->ttlSeconds ?? null;
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
        return "GS2::SeasonRating::MatchSession";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->sessionName != null) {
            $properties["SessionName"] = $this->sessionName;
        }
        if ($this->ttlSeconds != null) {
            $properties["TtlSeconds"] = $this->ttlSeconds;
        }

        return $properties;
    }

    public function ref(
        string $name,
    ): MatchSessionRef {
        return (new MatchSessionRef(
            $this->namespaceName,
            $name,
        ));
    }

    public function getAttrSessionId(
    ): GetAttr {
        return (new GetAttr(
            $this,
            "Item.SessionId",
            null,
        ));
    }
}
