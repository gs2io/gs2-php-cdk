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

namespace Gs2Cdk\Enhance\Resource;


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

use Gs2Cdk\Enhance\Ref\NamespaceRef;

class Namespace_ extends CdkResource {

    public Stack $stack;
    public string $name;
    public bool $enableDirectEnhance;
    public TransactionSetting $transactionSetting;

    public function __construct(
            Stack $stack,
            string $name,
            bool $enableDirectEnhance,
            TransactionSetting $transactionSetting,
            string $description = null,
            ScriptSetting $enhanceScript = null,
            LogSetting $logSetting = null,
    ) {
        parent::__construct("Enhance_Namespace_" . $name);

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $description;
        $this->enableDirectEnhance = $enableDirectEnhance;
        $this->transactionSetting = $transactionSetting;
        $this->enhanceScript = $enhanceScript;
        $this->logSetting = $logSetting;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Enhance::Namespace";
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->enableDirectEnhance != null) {
            $properties["EnableDirectEnhance"] = $this->enableDirectEnhance;
        }
        if ($this->transactionSetting != null) {
            $properties["TransactionSetting"] = $this->transactionSetting->properties();
        }
        if ($this->enhanceScript != null) {
            $properties["EnhanceScript"] = $this->enhanceScript->properties();
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
