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
namespace Gs2Cdk\Distributor\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Distributor\Ref\NamespaceRef;
use Gs2Cdk\Distributor\Model\CurrentMasterData;
use Gs2Cdk\Distributor\Model\DistributorModel;

use Gs2Cdk\Distributor\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private ?string $description = null;
    private ?TransactionSetting $transactionSetting = null;
    private ?string $assumeUserId = null;
    private ?NotificationSetting $autoRunStampSheetNotification = null;
    private ?NotificationSetting $autoRunTransactionNotification = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Distributor_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $options?->description ?? null;
        $this->transactionSetting = $options?->transactionSetting ?? null;
        $this->assumeUserId = $options?->assumeUserId ?? null;
        $this->autoRunStampSheetNotification = $options?->autoRunStampSheetNotification ?? null;
        $this->autoRunTransactionNotification = $options?->autoRunTransactionNotification ?? null;
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
        return "GS2::Distributor::Namespace";
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
        if ($this->assumeUserId != null) {
            $properties["AssumeUserId"] = $this->assumeUserId;
        }
        if ($this->autoRunStampSheetNotification != null) {
            $properties["AutoRunStampSheetNotification"] = $this->autoRunStampSheetNotification?->properties(
            );
        }
        if ($this->autoRunTransactionNotification != null) {
            $properties["AutoRunTransactionNotification"] = $this->autoRunTransactionNotification?->properties(
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
        array $distributorModels,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $distributorModels,
        ))->addDependsOn(
            $this,
        );
        return $this;
    }
}
