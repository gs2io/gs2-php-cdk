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

namespace Gs2Cdk\Exchange\Resource;


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

use Gs2Cdk\Exchange\Ref\NamespaceRef;

class Namespace_ extends CdkResource {

    public Stack $stack;
    public string $name;
    public bool $enableAwaitExchange;
    public bool $enableDirectExchange;
    public TransactionSetting $transactionSetting;

    public function __construct(
            Stack $stack,
            string $name,
            bool $enableAwaitExchange,
            bool $enableDirectExchange,
            TransactionSetting $transactionSetting,
            string $description = null,
            ScriptSetting $exchangeScript = null,
            LogSetting $logSetting = null,
    ) {
        parent::__construct("Exchange_Namespace_" . $name);

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $description;
        $this->enableAwaitExchange = $enableAwaitExchange;
        $this->enableDirectExchange = $enableDirectExchange;
        $this->transactionSetting = $transactionSetting;
        $this->exchangeScript = $exchangeScript;
        $this->logSetting = $logSetting;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Exchange::Namespace";
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->enableAwaitExchange != null) {
            $properties["EnableAwaitExchange"] = $this->enableAwaitExchange;
        }
        if ($this->enableDirectExchange != null) {
            $properties["EnableDirectExchange"] = $this->enableDirectExchange;
        }
        if ($this->transactionSetting != null) {
            $properties["TransactionSetting"] = $this->transactionSetting->properties();
        }
        if ($this->exchangeScript != null) {
            $properties["ExchangeScript"] = $this->exchangeScript->properties();
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

    /**
     * @var array<RateModel> $rateModels
     */
    public function masterData(
            array $rateModels,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $rateModels,
        ))->addDependsOn(
            $this
        );
        return $this;
    }
}
