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
namespace Gs2Cdk\Realtime\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;

use Gs2Cdk\Realtime\Ref\RoomRef;

use Gs2Cdk\Realtime\Model\Options\RoomOptions;

class Room extends CdkResource {
    private Stack $stack;
    private string $ownerId;
    private string $namespaceName;
    private string $name;
    private ?string $ipAddress = null;
    private ?int $port = null;
    private ?string $encryptionKey = null;

    public function __construct(
        Stack $stack,
        string $ownerId,
        string $namespaceName,
        string $name,
        ?RoomOptions $options = null,
    ) {
        parent::__construct(
            "Realtime_Room_" . $name
        );

        $this->stack = $stack;
        $this->ownerId = $ownerId;
        $this->namespaceName = $namespaceName;
        $this->name = $name;
        $this->ipAddress = $options?->ipAddress ?? null;
        $this->port = $options?->port ?? null;
        $this->encryptionKey = $options?->encryptionKey ?? null;
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
        return "GS2::Realtime::Room";
    }

    public function properties(
    ): array {
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
    ): RoomRef {
        return (new RoomRef(
            $this->namespaceName,
            $this->name,
        ));
    }

    public function getAttrRoomId(
    ): GetAttr {
        return (new GetAttr(
            null,
            null,
            "Item.RoomId",
        ));
    }
}
