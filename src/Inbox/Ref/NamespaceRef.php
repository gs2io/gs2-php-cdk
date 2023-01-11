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
namespace Gs2Cdk\Inbox\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Inbox\Ref\GlobalMessageRef;
use Gs2Cdk\Inbox\StampSheet\SendMessageByUserId;
use Gs2Cdk\Inbox\Model\Array;
use Gs2Cdk\Inbox\Model\TimeSpan;
use Gs2Cdk\Inbox\StampSheet\OpenMessageByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function globalMessage(
        string $globalMessageName,
    ): GlobalMessageRef {
        return (new GlobalMessageRef(
            $this->namespaceName,
            $globalMessageName,
        ));
    }

    public function sendMessage(
        string $metadata,
        ?array $readAcquireActions = null,
        ?int $expiresAt = null,
        ?TimeSpan $expiresTimeSpan = null,
        ?string $userId = "#{userId}",
    ): SendMessageByUserId {
        return (new SendMessageByUserId(
            $this->namespaceName,
            $metadata,
            $readAcquireActions,
            $expiresAt,
            $expiresTimeSpan,
            $userId,
        ));
    }

    public function openMessage(
        string $messageName,
        ?string $userId = "#{userId}",
    ): OpenMessageByUserId {
        return (new OpenMessageByUserId(
            $this->namespaceName,
            $messageName,
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
                "inbox",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
