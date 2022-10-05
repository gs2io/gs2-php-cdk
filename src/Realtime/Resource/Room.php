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

namespace Gs2Cdk\Realtime\Resource;


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

use Gs2Cdk\Realtime\Ref\RoomRef;

class Room extends CdkResource {

    public Stack $stack;
    public string $ownerId;
    public string $namespaceName;
    public string $name;

    public function __construct(
            Stack $stack,
            string $ownerId,
            string $namespaceName,
            string $name,
            string $ipAddress = null,
            int $port = null,
            string $encryptionKey = null,
    ) {
        parent::__construct("Realtime_Room_" . $name);

        $this->stack = $stack;
        $this->ownerId = $ownerId;
        $this->namespaceName = $namespaceName;
        $this->name = $name;
        $this->ipAddress = $ipAddress;
        $this->port = $port;
        $this->encryptionKey = $encryptionKey;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Realtime::Room";
    }

    public function properties(): array {
        $properties = [];
        if ($this->ownerId != null) {
            $properties["OwnerId"] = $this->ownerId;
        }
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->ipAddress != null) {
            $properties["IpAddress"] = $this->ipAddress;
        }
        if ($this->port != null) {
            $properties["Port"] = $this->port;
        }
        if ($this->encryptionKey != null) {
            $properties["EncryptionKey"] = $this->encryptionKey;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): RoomRef {
        return new RoomRef(
            namespaceName: namespaceName,
            roomName: $this->name,
        );
    }

    public function getAttrRoomId(): GetAttr {
        return new GetAttr(
            key: "Item.RoomId"
        );
    }
}
