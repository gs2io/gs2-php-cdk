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
namespace Gs2Cdk\Idle\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Idle\Ref\CategoryModelRef;
use Gs2Cdk\Idle\Ref\MasterDataObjectRef;
use Gs2Cdk\Idle\StampSheet\IncreaseMaximumIdleMinutesByUserId;
use Gs2Cdk\Idle\StampSheet\SetMaximumIdleMinutesByUserId;
use Gs2Cdk\Idle\StampSheet\ReceiveByUserId;
use Gs2Cdk\Idle\Model\Array;
use Gs2Cdk\Idle\StampSheet\DecreaseMaximumIdleMinutesByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function categoryModel(
        string $categoryName,
    ): CategoryModelRef {
        return (new CategoryModelRef(
            $this->namespaceName,
            $categoryName,
        ));
    }

    public function increaseMaximumIdleMinutes(
        string $categoryName,
        ?int $increaseMinutes = null,
        ?string $userId = "#{userId}",
    ): IncreaseMaximumIdleMinutesByUserId {
        return (new IncreaseMaximumIdleMinutesByUserId(
            $this->namespaceName,
            $categoryName,
            $increaseMinutes,
            $userId,
        ));
    }

    public function setMaximumIdleMinutes(
        string $categoryName,
        ?int $maximumIdleMinutes = null,
        ?string $userId = "#{userId}",
    ): SetMaximumIdleMinutesByUserId {
        return (new SetMaximumIdleMinutesByUserId(
            $this->namespaceName,
            $categoryName,
            $maximumIdleMinutes,
            $userId,
        ));
    }

    public function receive(
        string $categoryName,
        ?array $config = null,
        ?string $userId = "#{userId}",
    ): ReceiveByUserId {
        return (new ReceiveByUserId(
            $this->namespaceName,
            $categoryName,
            $config,
            $userId,
        ));
    }

    public function decreaseMaximumIdleMinutes(
        string $categoryName,
        ?int $decreaseMinutes = null,
        ?string $userId = "#{userId}",
    ): DecreaseMaximumIdleMinutesByUserId {
        return (new DecreaseMaximumIdleMinutesByUserId(
            $this->namespaceName,
            $categoryName,
            $decreaseMinutes,
            $userId,
        ));
    }

    public function grn(
    ): string {
        return (new Join(
            ":",
            [
                "grn",
                "gs2",
                GetAttr::region(
                )->str(
                ),
                GetAttr::ownerId(
                )->str(
                ),
                "idle",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
