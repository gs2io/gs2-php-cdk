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
namespace Gs2Cdk\Account\Model\Options;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

class NamespaceOptions {
    public ?string $description;
    public ?bool $changePasswordIfTakeOver;
    public ?bool $differentUserIdForLoginAndDataRetention;
    public ?ScriptSetting $createAccountScript;
    public ?ScriptSetting $authenticationScript;
    public ?ScriptSetting $createTakeOverScript;
    public ?ScriptSetting $doTakeOverScript;
    public ?ScriptSetting $banScript;
    public ?ScriptSetting $unBanScript;
    public ?LogSetting $logSetting;
    
    public function __construct(
        ?string $description = null,
        ?bool $changePasswordIfTakeOver = null,
        ?bool $differentUserIdForLoginAndDataRetention = null,
        ?ScriptSetting $createAccountScript = null,
        ?ScriptSetting $authenticationScript = null,
        ?ScriptSetting $createTakeOverScript = null,
        ?ScriptSetting $doTakeOverScript = null,
        ?ScriptSetting $banScript = null,
        ?ScriptSetting $unBanScript = null,
        ?LogSetting $logSetting = null,
    ) {
        $this->description = $description;
        $this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
        $this->differentUserIdForLoginAndDataRetention = $differentUserIdForLoginAndDataRetention;
        $this->createAccountScript = $createAccountScript;
        $this->authenticationScript = $authenticationScript;
        $this->createTakeOverScript = $createTakeOverScript;
        $this->doTakeOverScript = $doTakeOverScript;
        $this->banScript = $banScript;
        $this->unBanScript = $unBanScript;
        $this->logSetting = $logSetting;
    }}

