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
namespace Gs2Cdk\SerialKey\Model\Options;
use Gs2Cdk\SerialKey\Model\Enum\SerialKeyStatus;

class SerialKeyOptions {
    public ?string $metadata;
    public ?string $usedUserId;
    public ?int $usedAt;
    
    public function __construct(
        ?string $metadata = null,
        ?string $usedUserId = null,
        ?int $usedAt = null,
    ) {
        $this->metadata = $metadata;
        $this->usedUserId = $usedUserId;
        $this->usedAt = $usedAt;
    }}

