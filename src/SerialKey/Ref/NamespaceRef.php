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
namespace Gs2Cdk\SerialKey\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\SerialKey\Ref\CampaignModelRef;
use Gs2Cdk\SerialKey\Ref\MasterDataObjectRef;
use Gs2Cdk\SerialKey\StampSheet\RevertUseByUserId;
use Gs2Cdk\SerialKey\StampSheet\IssueOnce;
use Gs2Cdk\SerialKey\StampSheet\UseByUserId;
use Gs2Cdk\SerialKey\StampSheet\VerifyCodeByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function campaignModel(
        string $campaignModelName,
    ): CampaignModelRef {
        return (new CampaignModelRef(
            $this->namespaceName,
            $campaignModelName,
        ));
    }

    public function revertUse(
        string $code,
        ?string $userId = "#{userId}",
    ): RevertUseByUserId {
        return (new RevertUseByUserId(
            $this->namespaceName,
            $code,
            $userId,
        ));
    }

    public function issueOnce(
        string $campaignModelName,
        ?string $metadata = null,
    ): IssueOnce {
        return (new IssueOnce(
            $this->namespaceName,
            $campaignModelName,
            $metadata,
        ));
    }

    public function use(
        string $code,
        ?string $userId = "#{userId}",
    ): UseByUserId {
        return (new UseByUserId(
            $this->namespaceName,
            $code,
            $userId,
        ));
    }

    public function verifyCode(
        string $code,
        string $verifyType,
        ?string $campaignModelName = null,
        ?string $userId = "#{userId}",
    ): VerifyCodeByUserId {
        return (new VerifyCodeByUserId(
            $this->namespaceName,
            $code,
            $verifyType,
            $campaignModelName,
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
                "serialKey",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
