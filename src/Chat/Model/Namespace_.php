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
namespace Gs2Cdk\Chat\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Chat\Ref\NamespaceRef;

use Gs2Cdk\Chat\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private ?string $description = null;
    private ?bool $allowCreateRoom = null;
    private ?int $messageLifeTimeDays = null;
    private ?ScriptSetting $postMessageScript = null;
    private ?ScriptSetting $createRoomScript = null;
    private ?ScriptSetting $deleteRoomScript = null;
    private ?ScriptSetting $subscribeRoomScript = null;
    private ?ScriptSetting $unsubscribeRoomScript = null;
    private ?NotificationSetting $postNotification = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Chat_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $options?->description ?? null;
        $this->allowCreateRoom = $options?->allowCreateRoom ?? null;
        $this->messageLifeTimeDays = $options?->messageLifeTimeDays ?? null;
        $this->postMessageScript = $options?->postMessageScript ?? null;
        $this->createRoomScript = $options?->createRoomScript ?? null;
        $this->deleteRoomScript = $options?->deleteRoomScript ?? null;
        $this->subscribeRoomScript = $options?->subscribeRoomScript ?? null;
        $this->unsubscribeRoomScript = $options?->unsubscribeRoomScript ?? null;
        $this->postNotification = $options?->postNotification ?? null;
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
        return "GS2::Chat::Namespace";
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
        if ($this->allowCreateRoom != null) {
            $properties["AllowCreateRoom"] = $this->allowCreateRoom;
        }
        if ($this->messageLifeTimeDays != null) {
            $properties["MessageLifeTimeDays"] = $this->messageLifeTimeDays;
        }
        if ($this->postMessageScript != null) {
            $properties["PostMessageScript"] = $this->postMessageScript?->properties(
            );
        }
        if ($this->createRoomScript != null) {
            $properties["CreateRoomScript"] = $this->createRoomScript?->properties(
            );
        }
        if ($this->deleteRoomScript != null) {
            $properties["DeleteRoomScript"] = $this->deleteRoomScript?->properties(
            );
        }
        if ($this->subscribeRoomScript != null) {
            $properties["SubscribeRoomScript"] = $this->subscribeRoomScript?->properties(
            );
        }
        if ($this->unsubscribeRoomScript != null) {
            $properties["UnsubscribeRoomScript"] = $this->unsubscribeRoomScript?->properties(
            );
        }
        if ($this->postNotification != null) {
            $properties["PostNotification"] = $this->postNotification?->properties(
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
