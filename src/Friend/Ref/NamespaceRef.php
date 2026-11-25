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
namespace Gs2Cdk\Friend\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Friend\StampSheet\UpdateProfileByUserId;
use Gs2Cdk\Friend\StampSheet\VerifyFollowByUserId;
use Gs2Cdk\Friend\StampSheet\VerifyFriendByUserId;
use Gs2Cdk\Friend\StampSheet\VerifyFriendCountByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function updateProfile(
        ?string $publicProfile = null,
        ?string $followerProfile = null,
        ?string $friendProfile = null,
        ?string $userId = "#{userId}",
    ): UpdateProfileByUserId {
        return (new UpdateProfileByUserId(
            $this->namespaceName,
            $publicProfile,
            $followerProfile,
            $friendProfile,
            $userId,
        ));
    }

    public function verifyFollow(
        string $targetUserId,
        string $verifyType,
        ?string $userId = "#{userId}",
    ): VerifyFollowByUserId {
        return (new VerifyFollowByUserId(
            $this->namespaceName,
            $targetUserId,
            $verifyType,
            $userId,
        ));
    }

    public function verifyFriend(
        string $targetUserId,
        string $verifyType,
        ?string $userId = "#{userId}",
    ): VerifyFriendByUserId {
        return (new VerifyFriendByUserId(
            $this->namespaceName,
            $targetUserId,
            $verifyType,
            $userId,
        ));
    }

    public function verifyFriendCount(
        string $verifyType,
        int $count,
        ?string $userId = "#{userId}",
    ): VerifyFriendCountByUserId {
        return (new VerifyFriendCountByUserId(
            $this->namespaceName,
            $verifyType,
            $count,
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
                "friend",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
