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
namespace Gs2Cdk\Exchange\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Exchange\Ref\NamespaceRef;
use Gs2Cdk\Exchange\Model\CurrentMasterData;
use Gs2Cdk\Exchange\Model\RateModel;
use Gs2Cdk\Exchange\Model\IncrementalRateModel;

use Gs2Cdk\Exchange\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private ?string $description = null;
    private ?bool $enableAwaitExchange = null;
    private ?bool $enableDirectExchange = null;
    private ?TransactionSetting $transactionSetting = null;
    private ?ScriptSetting $exchangeScript = null;
    private ?ScriptSetting $incrementalExchangeScript = null;
    private ?ScriptSetting $acquireAwaitScript = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Exchange_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $options?->description ?? null;
        $this->enableAwaitExchange = $options?->enableAwaitExchange ?? null;
        $this->enableDirectExchange = $options?->enableDirectExchange ?? null;
        $this->transactionSetting = $options?->transactionSetting ?? null;
        $this->exchangeScript = $options?->exchangeScript ?? null;
        $this->incrementalExchangeScript = $options?->incrementalExchangeScript ?? null;
        $this->acquireAwaitScript = $options?->acquireAwaitScript ?? null;
        $this->logSetting = $options?->logSetting ?? null;
        $stack->addResource(
            $this,
        );
    }


    public function alternateKeys(
    ) {
        return "name";
    }

    public function resourceType(
    ): string {
        return "GS2::Exchange::Namespace";
    }

    public function properties(
    ): array {
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
            $properties["TransactionSetting"] = $this->transactionSetting?->properties(
            );
        }
        if ($this->exchangeScript != null) {
            $properties["ExchangeScript"] = $this->exchangeScript?->properties(
            );
        }
        if ($this->incrementalExchangeScript != null) {
            $properties["IncrementalExchangeScript"] = $this->incrementalExchangeScript?->properties(
            );
        }
        if ($this->acquireAwaitScript != null) {
            $properties["AcquireAwaitScript"] = $this->acquireAwaitScript?->properties(
            );
        }
        if ($this->logSetting != null) {
            $properties["LogSetting"] = $this->logSetting?->properties(
            );
        }

        return $properties;
    }

    public function ref(
    ): NamespaceRef {
        return (new NamespaceRef(
            $this->name,
        ));
    }

    public function getAttrNamespaceId(
    ): GetAttr {
        return (new GetAttr(
            $this,
            "Item.NamespaceId",
            null,
        ));
    }

    public function masterData(
        array $rateModels,
        array $incrementalRateModels,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $rateModels,
            $incrementalRateModels,
        ))->addDependsOn(
            $this,
        );
        return $this;
    }
}
