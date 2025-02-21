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
namespace Gs2Cdk\Money2\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Money2\Model\PlatformSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Money2\Ref\NamespaceRef;
use Gs2Cdk\Money2\Model\CurrentMasterData;
use Gs2Cdk\Money2\Model\StoreContentModel;
use Gs2Cdk\Money2\Model\Enums\NamespaceCurrencyUsagePriority;

use Gs2Cdk\Money2\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private NamespaceCurrencyUsagePriority $currencyUsagePriority;
    private bool $sharedFreeCurrency;
    private PlatformSetting $platformSetting;
    private ?string $description = null;
    private ?ScriptSetting $depositBalanceScript = null;
    private ?ScriptSetting $withdrawBalanceScript = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        NamespaceCurrencyUsagePriority $currencyUsagePriority,
        bool $sharedFreeCurrency,
        PlatformSetting $platformSetting,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Money2_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->currencyUsagePriority = $currencyUsagePriority;
        $this->sharedFreeCurrency = $sharedFreeCurrency;
        $this->platformSetting = $platformSetting;
        $this->description = $options?->description ?? null;
        $this->depositBalanceScript = $options?->depositBalanceScript ?? null;
        $this->withdrawBalanceScript = $options?->withdrawBalanceScript ?? null;
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
        return "GS2::Money2::Namespace";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->currencyUsagePriority != null) {
            $properties["CurrencyUsagePriority"] = $this->currencyUsagePriority;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->sharedFreeCurrency != null) {
            $properties["SharedFreeCurrency"] = $this->sharedFreeCurrency;
        }
        if ($this->platformSetting != null) {
            $properties["PlatformSetting"] = $this->platformSetting?->properties(
            );
        }
        if ($this->depositBalanceScript != null) {
            $properties["DepositBalanceScript"] = $this->depositBalanceScript?->properties(
            );
        }
        if ($this->withdrawBalanceScript != null) {
            $properties["WithdrawBalanceScript"] = $this->withdrawBalanceScript?->properties(
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
        array $storeContentModels,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $storeContentModels,
        ))->addDependsOn(
            $this,
        );
        return $this;
    }
}
