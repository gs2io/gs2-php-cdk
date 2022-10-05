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

namespace Gs2Cdk\Matchmaking\Resource;


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

use Gs2Cdk\Matchmaking\Ref\GatheringRef;

class Gathering extends CdkResource {

    public Stack $stack;
    public string $namespaceName;
    public string $userId;
    public Player $player;
    public array $capacityOfRoles;

    public function __construct(
            Stack $stack,
            string $namespaceName,
            string $userId,
            Player $player,
            array $capacityOfRoles,
            array $attributeRanges = null,
            array $allowUserIds = null,
            int $expiresAt = null,
            TimeSpan $expiresAtTimeSpan = null,
    ) {
        parent::__construct("Matchmaking_Gathering_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->player = $player;
        $this->attributeRanges = $attributeRanges;
        $this->capacityOfRoles = $capacityOfRoles;
        $this->allowUserIds = $allowUserIds;
        $this->expiresAt = $expiresAt;
        $this->expiresAtTimeSpan = $expiresAtTimeSpan;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Matchmaking::Gathering";
    }

    public function properties(): array {
        $properties = [];
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        if ($this->userId != null) {
            $properties["UserId"] = $this->userId;
        }
        if ($this->player != null) {
            $properties["Player"] = $this->player->properties();
        }
        if ($this->attributeRanges != null) {
            $properties["AttributeRanges"] = array_map(fn($v) => $v->properties(), $this->attributeRanges);
        }
        if ($this->capacityOfRoles != null) {
            $properties["CapacityOfRoles"] = array_map(fn($v) => $v->properties(), $this->capacityOfRoles);
        }
        if ($this->allowUserIds != null) {
            $properties["AllowUserIds"] = $this->allowUserIds;
        }
        if ($this->expiresAt != null) {
            $properties["ExpiresAt"] = $this->expiresAt;
        }
        if ($this->expiresAtTimeSpan != null) {
            $properties["ExpiresAtTimeSpan"] = $this->expiresAtTimeSpan->properties();
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): GatheringRef {
        return new GatheringRef(
            namespaceName: namespaceName,
            gatheringName: $this->name,
        );
    }

    public function getAttrGatheringId(): GetAttr {
        return new GetAttr(
            key: "Item.GatheringId"
        );
    }
}
