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
namespace Gs2Cdk\Stamina\Model\Options;
use Gs2Cdk\Stamina\Model\MaxStaminaTable;
use Gs2Cdk\Stamina\Model\RecoverIntervalTable;
use Gs2Cdk\Stamina\Model\RecoverValueTable;

class StaminaModelOptions {
    public ?string $metadata;
    public ?int $maxCapacity;
    public ?MaxStaminaTable $maxStaminaTable;
    public ?RecoverIntervalTable $recoverIntervalTable;
    public ?RecoverValueTable $recoverValueTable;
    
    public function __construct(
        ?string $metadata = null,
        ?int $maxCapacity = null,
        ?MaxStaminaTable $maxStaminaTable = null,
        ?RecoverIntervalTable $recoverIntervalTable = null,
        ?RecoverValueTable $recoverValueTable = null,
    ) {
        $this->metadata = $metadata;
        $this->maxCapacity = $maxCapacity;
        $this->maxStaminaTable = $maxStaminaTable;
        $this->recoverIntervalTable = $recoverIntervalTable;
        $this->recoverValueTable = $recoverValueTable;
    }}

