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

namespace Gs2Cdk\Chat\Resource;


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

use Gs2Cdk\Chat\Ref\NamespaceRef;

class Namespace_ extends CdkResource {

    public Stack $stack;
    public string $name;
    public bool $allowCreateRoom;

    public function __construct(
            Stack $stack,
            string $name,
            bool $allowCreateRoom,
            string $description = null,
            ScriptSetting $postMessageScript = null,
            ScriptSetting $createRoomScript = null,
            ScriptSetting $deleteRoomScript = null,
            ScriptSetting $subscribeRoomScript = null,
            ScriptSetting $unsubscribeRoomScript = null,
            NotificationSetting $postNotification = null,
            LogSetting $logSetting = null,
    ) {
        parent::__construct("Chat_Namespace_" . $name);

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $description;
        $this->allowCreateRoom = $allowCreateRoom;
        $this->postMessageScript = $postMessageScript;
        $this->createRoomScript = $createRoomScript;
        $this->deleteRoomScript = $deleteRoomScript;
        $this->subscribeRoomScript = $subscribeRoomScript;
        $this->unsubscribeRoomScript = $unsubscribeRoomScript;
        $this->postNotification = $postNotification;
        $this->logSetting = $logSetting;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Chat::Namespace";
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->allowCreateRoom != null) {
            $properties["AllowCreateRoom"] = $this->allowCreateRoom;
        }
        if ($this->postMessageScript != null) {
            $properties["PostMessageScript"] = $this->postMessageScript->properties();
        }
        if ($this->createRoomScript != null) {
            $properties["CreateRoomScript"] = $this->createRoomScript->properties();
        }
        if ($this->deleteRoomScript != null) {
            $properties["DeleteRoomScript"] = $this->deleteRoomScript->properties();
        }
        if ($this->subscribeRoomScript != null) {
            $properties["SubscribeRoomScript"] = $this->subscribeRoomScript->properties();
        }
        if ($this->unsubscribeRoomScript != null) {
            $properties["UnsubscribeRoomScript"] = $this->unsubscribeRoomScript->properties();
        }
        if ($this->postNotification != null) {
            $properties["PostNotification"] = $this->postNotification->properties();
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
