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
namespace Gs2Cdk\Showcase\Model\Options;
use Gs2Cdk\Core\Model\VerifyAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Showcase\Model\SalesItem;
use Gs2Cdk\Showcase\Model\SalesItemGroup;
use Gs2Cdk\Showcase\Model\Enum\DisplayItemType;

class DisplayItemOptions {
    public ?SalesItem $salesItem;
    public ?SalesItemGroup $salesItemGroup;
    public ?string $salesPeriodEventId;
    
    public function __construct(
        ?SalesItem $salesItem = null,
        ?SalesItemGroup $salesItemGroup = null,
        ?string $salesPeriodEventId = null,
    ) {
        $this->salesItem = $salesItem;
        $this->salesItemGroup = $salesItemGroup;
        $this->salesPeriodEventId = $salesPeriodEventId;
    }}

