<?php /** @noinspection ALL */
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2Cdk\Account\Resource;


use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

use Gs2Cdk\Account\Ref\NamespaceRef;

class Namespace_ extends CdkResource {

    public Stack $stack;
    public string $name;
    public bool $changePasswordIfTakeOver;
    public bool $differentUserIdForLoginAndDataRetention;

    public function __construct(
            Stack $stack,
            string $name,
            bool $changePasswordIfTakeOver,
            bool $differentUserIdForLoginAndDataRetention,
            string $description = null,
            ScriptSetting $createAccountScript = null,
            ScriptSetting $authenticationScript = null,
            ScriptSetting $createTakeOverScript = null,
            ScriptSetting $doTakeOverScript = null,
            LogSetting $logSetting = null,
    ) {
        parent::__construct("Account_Namespace_" . $name);

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $description;
        $this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
        $this->differentUserIdForLoginAndDataRetention = $differentUserIdForLoginAndDataRetention;
        $this->createAccountScript = $createAccountScript;
        $this->authenticationScript = $authenticationScript;
        $this->createTakeOverScript = $createTakeOverScript;
        $this->doTakeOverScript = $doTakeOverScript;
        $this->logSetting = $logSetting;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Account::Namespace";
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->changePasswordIfTakeOver != null) {
            $properties["ChangePasswordIfTakeOver"] = $this->changePasswordIfTakeOver;
        }
        if ($this->differentUserIdForLoginAndDataRetention != null) {
            $properties["DifferentUserIdForLoginAndDataRetention"] = $this->differentUserIdForLoginAndDataRetention;
        }
        if ($this->createAccountScript != null) {
            $properties["CreateAccountScript"] = $this->createAccountScript->properties();
        }
        if ($this->authenticationScript != null) {
            $properties["AuthenticationScript"] = $this->authenticationScript->properties();
        }
        if ($this->createTakeOverScript != null) {
            $properties["CreateTakeOverScript"] = $this->createTakeOverScript->properties();
        }
        if ($this->doTakeOverScript != null) {
            $properties["DoTakeOverScript"] = $this->doTakeOverScript->properties();
        }
        if ($this->logSetting != null) {
            $properties["LogSetting"] = $this->logSetting->properties();
        }
        return $properties;
    }

    public function ref(
    ): NamespaceRef {
        return new NamespaceRef(
            namespaceName: $this->name,
        );
    }

    public function getAttrNamespaceId(): GetAttr {
        return new GetAttr(
            key: "Item.NamespaceId"
        );
    }
}
