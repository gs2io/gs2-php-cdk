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
namespace Gs2Cdk\Inventory\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Inventory\Ref\NamespaceRef;
use Gs2Cdk\Inventory\Model\CurrentMasterData;
use Gs2Cdk\Inventory\Model\InventoryModel;
use Gs2Cdk\Inventory\Model\SimpleInventoryModel;
use Gs2Cdk\Inventory\Model\BigInventoryModel;

use Gs2Cdk\Inventory\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private ?string $description = null;
    private ?ScriptSetting $acquireScript = null;
    private ?ScriptSetting $overflowScript = null;
    private ?ScriptSetting $consumeScript = null;
    private ?ScriptSetting $simpleItemAcquireScript = null;
    private ?ScriptSetting $simpleItemConsumeScript = null;
    private ?ScriptSetting $bigItemAcquireScript = null;
    private ?ScriptSetting $bigItemConsumeScript = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Inventory_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $options?->description ?? null;
        $this->acquireScript = $options?->acquireScript ?? null;
        $this->overflowScript = $options?->overflowScript ?? null;
        $this->consumeScript = $options?->consumeScript ?? null;
        $this->simpleItemAcquireScript = $options?->simpleItemAcquireScript ?? null;
        $this->simpleItemConsumeScript = $options?->simpleItemConsumeScript ?? null;
        $this->bigItemAcquireScript = $options?->bigItemAcquireScript ?? null;
        $this->bigItemConsumeScript = $options?->bigItemConsumeScript ?? null;
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
        return "GS2::Inventory::Namespace";
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
        if ($this->acquireScript != null) {
            $properties["AcquireScript"] = $this->acquireScript?->properties(
            );
        }
        if ($this->overflowScript != null) {
            $properties["OverflowScript"] = $this->overflowScript?->properties(
            );
        }
        if ($this->consumeScript != null) {
            $properties["ConsumeScript"] = $this->consumeScript?->properties(
            );
        }
        if ($this->simpleItemAcquireScript != null) {
            $properties["SimpleItemAcquireScript"] = $this->simpleItemAcquireScript?->properties(
            );
        }
        if ($this->simpleItemConsumeScript != null) {
            $properties["SimpleItemConsumeScript"] = $this->simpleItemConsumeScript?->properties(
            );
        }
        if ($this->bigItemAcquireScript != null) {
            $properties["BigItemAcquireScript"] = $this->bigItemAcquireScript?->properties(
            );
        }
        if ($this->bigItemConsumeScript != null) {
            $properties["BigItemConsumeScript"] = $this->bigItemConsumeScript?->properties(
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
        array $inventoryModels,
        array $simpleInventoryModels,
        array $bigInventoryModels,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $inventoryModels,
            $simpleInventoryModels,
            $bigInventoryModels,
        ))->addDependsOn(
            $this,
        );
        return $this;
    }
}
