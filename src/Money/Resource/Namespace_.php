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

namespace Gs2Cdk\Money\Resource;

use Gs2Cdk\Money\Resource\Enum\NamespacePriority;
use Gs2Cdk\Money\Resource\Enum\NamespaceCurrency;

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

use Gs2Cdk\Money\Ref\NamespaceRef;

class Namespace_ extends CdkResource {

    public Stack $stack;
    public string $name;
    public string $priority;
    public bool $shareFree;
    public string $currency;
    public bool $enableFakeReceipt;

    public function __construct(
            Stack $stack,
            string $name,
            string $priority,
            bool $shareFree,
            string $currency,
            bool $enableFakeReceipt,
            string $description = null,
            string $appleKey = null,
            string $googleKey = null,
            ScriptSetting $createWalletScript = null,
            ScriptSetting $depositScript = null,
            ScriptSetting $withdrawScript = null,
            LogSetting $logSetting = null,
    ) {
        parent::__construct("Money_Namespace_" . $name);

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $description;
        $this->priority = $priority;
        $this->shareFree = $shareFree;
        $this->currency = $currency;
        $this->appleKey = $appleKey;
        $this->googleKey = $googleKey;
        $this->enableFakeReceipt = $enableFakeReceipt;
        $this->createWalletScript = $createWalletScript;
        $this->depositScript = $depositScript;
        $this->withdrawScript = $withdrawScript;
        $this->logSetting = $logSetting;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Money::Namespace";
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->priority != null) {
            $properties["Priority"] = $this->priority->toString();
        }
        if ($this->shareFree != null) {
            $properties["ShareFree"] = $this->shareFree;
        }
        if ($this->currency != null) {
            $properties["Currency"] = $this->currency->toString();
        }
        if ($this->appleKey != null) {
            $properties["AppleKey"] = $this->appleKey;
        }
        if ($this->googleKey != null) {
            $properties["GoogleKey"] = $this->googleKey;
        }
        if ($this->enableFakeReceipt != null) {
            $properties["EnableFakeReceipt"] = $this->enableFakeReceipt;
        }
        if ($this->createWalletScript != null) {
            $properties["CreateWalletScript"] = $this->createWalletScript->properties();
        }
        if ($this->depositScript != null) {
            $properties["DepositScript"] = $this->depositScript->properties();
        }
        if ($this->withdrawScript != null) {
            $properties["WithdrawScript"] = $this->withdrawScript->properties();
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
