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

namespace Gs2Cdk\Inbox\Resource;


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

use Gs2Cdk\Inbox\Ref\NamespaceRef;

class Namespace_ extends CdkResource {

    public Stack $stack;
    public string $name;

    public function __construct(
            Stack $stack,
            string $name,
            string $description = null,
            bool $isAutomaticDeletingEnabled = null,
            TransactionSetting $transactionSetting = null,
            ScriptSetting $receiveMessageScript = null,
            ScriptSetting $readMessageScript = null,
            ScriptSetting $deleteMessageScript = null,
            NotificationSetting $receiveNotification = null,
            LogSetting $logSetting = null,
    ) {
        parent::__construct("Inbox_Namespace_" . $name);

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $description;
        $this->isAutomaticDeletingEnabled = $isAutomaticDeletingEnabled;
        $this->transactionSetting = $transactionSetting;
        $this->receiveMessageScript = $receiveMessageScript;
        $this->readMessageScript = $readMessageScript;
        $this->deleteMessageScript = $deleteMessageScript;
        $this->receiveNotification = $receiveNotification;
        $this->logSetting = $logSetting;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Inbox::Namespace";
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->isAutomaticDeletingEnabled != null) {
            $properties["IsAutomaticDeletingEnabled"] = $this->isAutomaticDeletingEnabled;
        }
        if ($this->transactionSetting != null) {
            $properties["TransactionSetting"] = $this->transactionSetting->properties();
        }
        if ($this->receiveMessageScript != null) {
            $properties["ReceiveMessageScript"] = $this->receiveMessageScript->properties();
        }
        if ($this->readMessageScript != null) {
            $properties["ReadMessageScript"] = $this->readMessageScript->properties();
        }
        if ($this->deleteMessageScript != null) {
            $properties["DeleteMessageScript"] = $this->deleteMessageScript->properties();
        }
        if ($this->receiveNotification != null) {
            $properties["ReceiveNotification"] = $this->receiveNotification->properties();
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
     * @var array<GlobalMessage> $globalMessages
     */
    public function masterData(
            array $globalMessages,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $globalMessages,
        ))->addDependsOn(
            $this
        );
        return $this;
    }
}
