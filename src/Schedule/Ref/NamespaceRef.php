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
namespace Gs2Cdk\Schedule\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Schedule\StampSheet\TriggerByUserId;
use Gs2Cdk\Schedule\StampSheet\DeleteTriggerByUserId;
use Gs2Cdk\Schedule\StampSheet\VerifyEventByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function trigger(
        string $triggerName,
        string $triggerStrategy,
        int $ttl,
        ?string $userId = "#{userId}",
    ): TriggerByUserId {
        return (new TriggerByUserId(
            $this->namespaceName,
            $triggerName,
            $triggerStrategy,
            $ttl,
            $userId,
        ));
    }

    public function deleteTrigger(
        string $triggerName,
        ?string $userId = "#{userId}",
    ): DeleteTriggerByUserId {
        return (new DeleteTriggerByUserId(
            $this->namespaceName,
            $triggerName,
            $userId,
        ));
    }

    public function verifyEvent(
        string $eventName,
        string $verifyType,
        ?string $userId = "#{userId}",
    ): VerifyEventByUserId {
        return (new VerifyEventByUserId(
            $this->namespaceName,
            $eventName,
            $verifyType,
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
                "schedule",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
