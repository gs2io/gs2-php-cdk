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
namespace Gs2Cdk\Money\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Money\Ref\NamespaceRef;
use Gs2Cdk\Money\Model\Enums\NamespacePriority;
use Gs2Cdk\Money\Model\Enums\NamespaceCurrency;

use Gs2Cdk\Money\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private NamespacePriority $priority;
    private bool $shareFree;
    private NamespaceCurrency $currency;
    private ?string $description = null;
    private ?string $appleKey = null;
    private ?string $googleKey = null;
    private ?bool $enableFakeReceipt = null;
    private ?ScriptSetting $createWalletScript = null;
    private ?ScriptSetting $depositScript = null;
    private ?ScriptSetting $withdrawScript = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        NamespacePriority $priority,
        bool $shareFree,
        NamespaceCurrency $currency,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Money_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->priority = $priority;
        $this->shareFree = $shareFree;
        $this->currency = $currency;
        $this->description = $options?->description ?? null;
        $this->appleKey = $options?->appleKey ?? null;
        $this->googleKey = $options?->googleKey ?? null;
        $this->enableFakeReceipt = $options?->enableFakeReceipt ?? null;
        $this->createWalletScript = $options?->createWalletScript ?? null;
        $this->depositScript = $options?->depositScript ?? null;
        $this->withdrawScript = $options?->withdrawScript ?? null;
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
        return "GS2::Money::Namespace";
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
        if ($this->priority != null) {
            $properties["Priority"] = $this->priority;
        }
        if ($this->shareFree != null) {
            $properties["ShareFree"] = $this->shareFree;
        }
        if ($this->currency != null) {
            $properties["Currency"] = $this->currency;
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
            $properties["CreateWalletScript"] = $this->createWalletScript?->properties(
            );
        }
        if ($this->depositScript != null) {
            $properties["DepositScript"] = $this->depositScript?->properties(
            );
        }
        if ($this->withdrawScript != null) {
            $properties["WithdrawScript"] = $this->withdrawScript?->properties(
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
}
