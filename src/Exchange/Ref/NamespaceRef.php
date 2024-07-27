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
namespace Gs2Cdk\Exchange\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Exchange\Ref\RateModelRef;
use Gs2Cdk\Exchange\Ref\IncrementalRateModelRef;
use Gs2Cdk\Exchange\StampSheet\ExchangeByUserId;
use Gs2Cdk\Exchange\Model\Array;
use Gs2Cdk\Exchange\StampSheet\IncrementalExchangeByUserId;
use Gs2Cdk\Exchange\StampSheet\CreateAwaitByUserId;
use Gs2Cdk\Exchange\StampSheet\SkipByUserId;
use Gs2Cdk\Exchange\StampSheet\DeleteAwaitByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function rateModel(
        string $rateName,
    ): RateModelRef {
        return (new RateModelRef(
            $this->namespaceName,
            $rateName,
        ));
    }

    public function incrementalRateModel(
        string $rateName,
    ): IncrementalRateModelRef {
        return (new IncrementalRateModelRef(
            $this->namespaceName,
            $rateName,
        ));
    }

    public function exchange(
        string $rateName,
        int $count,
        ?array $config = null,
        ?string $userId = "#{userId}",
    ): ExchangeByUserId {
        return (new ExchangeByUserId(
            $this->namespaceName,
            $rateName,
            $count,
            $config,
            $userId,
        ));
    }

    public function incrementalExchange(
        string $rateName,
        int $count,
        ?array $config = null,
        ?string $userId = "#{userId}",
    ): IncrementalExchangeByUserId {
        return (new IncrementalExchangeByUserId(
            $this->namespaceName,
            $rateName,
            $count,
            $config,
            $userId,
        ));
    }

    public function createAwait(
        string $rateName,
        int $count,
        ?array $config = null,
        ?string $userId = "#{userId}",
    ): CreateAwaitByUserId {
        return (new CreateAwaitByUserId(
            $this->namespaceName,
            $rateName,
            $count,
            $config,
            $userId,
        ));
    }

    public function skip(
        string $awaitName,
        string $skipType,
        ?int $minutes = null,
        ?float $rate = null,
        ?string $userId = "#{userId}",
    ): SkipByUserId {
        return (new SkipByUserId(
            $this->namespaceName,
            $awaitName,
            $skipType,
            $minutes,
            $rate,
            $userId,
        ));
    }

    public function deleteAwait(
        string $awaitName,
        ?string $userId = "#{userId}",
    ): DeleteAwaitByUserId {
        return (new DeleteAwaitByUserId(
            $this->namespaceName,
            $awaitName,
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
                "exchange",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
