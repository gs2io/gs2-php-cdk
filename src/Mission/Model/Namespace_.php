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
namespace Gs2Cdk\Mission\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Mission\Ref\NamespaceRef;
use Gs2Cdk\Mission\Model\CurrentMasterData;
use Gs2Cdk\Mission\Model\MissionGroupModel;
use Gs2Cdk\Mission\Model\CounterModel;

use Gs2Cdk\Mission\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private TransactionSetting $transactionSetting;
    private ?string $description = null;
    private ?ScriptSetting $missionCompleteScript = null;
    private ?ScriptSetting $counterIncrementScript = null;
    private ?ScriptSetting $receiveRewardsScript = null;
    private ?NotificationSetting $completeNotification = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        TransactionSetting $transactionSetting,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Mission_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->transactionSetting = $transactionSetting;
        $this->description = $options?->description ?? null;
        $this->missionCompleteScript = $options?->missionCompleteScript ?? null;
        $this->counterIncrementScript = $options?->counterIncrementScript ?? null;
        $this->receiveRewardsScript = $options?->receiveRewardsScript ?? null;
        $this->completeNotification = $options?->completeNotification ?? null;
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
        return "GS2::Mission::Namespace";
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
        if ($this->transactionSetting != null) {
            $properties["TransactionSetting"] = $this->transactionSetting?->properties(
            );
        }
        if ($this->missionCompleteScript != null) {
            $properties["MissionCompleteScript"] = $this->missionCompleteScript?->properties(
            );
        }
        if ($this->counterIncrementScript != null) {
            $properties["CounterIncrementScript"] = $this->counterIncrementScript?->properties(
            );
        }
        if ($this->receiveRewardsScript != null) {
            $properties["ReceiveRewardsScript"] = $this->receiveRewardsScript?->properties(
            );
        }
        if ($this->completeNotification != null) {
            $properties["CompleteNotification"] = $this->completeNotification?->properties(
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
            null,
            null,
            "Item.NamespaceId",
        ));
    }

    public function masterData(
        array $groups,
        array $counters,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $groups,
            $counters,
        ))->addDependsOn(
            $this,
        );
        return $this;
    }
}
