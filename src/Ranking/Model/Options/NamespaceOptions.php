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
namespace Gs2Cdk\Ranking\Model\Options;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Ranking\Model\TransactionSettingV2;
use Gs2Cdk\Core\Model\LogSetting;

class NamespaceOptions {
    public ?string $description;
    /** @deprecated */
    public ?TransactionSetting $transactionSetting;
    public ?TransactionSettingV2 $transactionSettingV2;
    public ?LogSetting $logSetting;
    
    public function __construct(
        ?string $description = null,
        ?TransactionSetting $transactionSetting = null,
        ?TransactionSettingV2 $transactionSettingV2 = null,
        ?LogSetting $logSetting = null,
    ) {
        $this->description = $description;
        $this->transactionSetting = $transactionSetting;
        $this->transactionSettingV2 = $transactionSettingV2;
        $this->logSetting = $logSetting;
    }}

