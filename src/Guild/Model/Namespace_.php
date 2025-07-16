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
namespace Gs2Cdk\Guild\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Guild\Ref\NamespaceRef;
use Gs2Cdk\Guild\Model\CurrentMasterData;
use Gs2Cdk\Guild\Model\GuildModel;

use Gs2Cdk\Guild\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private ?string $description = null;
    private ?NotificationSetting $changeNotification = null;
    private ?NotificationSetting $joinNotification = null;
    private ?NotificationSetting $leaveNotification = null;
    private ?NotificationSetting $changeMemberNotification = null;
    private ?NotificationSetting $receiveRequestNotification = null;
    private ?NotificationSetting $removeRequestNotification = null;
    private ?ScriptSetting $createGuildScript = null;
    private ?ScriptSetting $updateGuildScript = null;
    private ?ScriptSetting $joinGuildScript = null;
    private ?ScriptSetting $receiveJoinRequestScript = null;
    private ?ScriptSetting $leaveGuildScript = null;
    private ?ScriptSetting $changeRoleScript = null;
    private ?ScriptSetting $deleteGuildScript = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Guild_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $options?->description ?? null;
        $this->changeNotification = $options?->changeNotification ?? null;
        $this->joinNotification = $options?->joinNotification ?? null;
        $this->leaveNotification = $options?->leaveNotification ?? null;
        $this->changeMemberNotification = $options?->changeMemberNotification ?? null;
        $this->receiveRequestNotification = $options?->receiveRequestNotification ?? null;
        $this->removeRequestNotification = $options?->removeRequestNotification ?? null;
        $this->createGuildScript = $options?->createGuildScript ?? null;
        $this->updateGuildScript = $options?->updateGuildScript ?? null;
        $this->joinGuildScript = $options?->joinGuildScript ?? null;
        $this->receiveJoinRequestScript = $options?->receiveJoinRequestScript ?? null;
        $this->leaveGuildScript = $options?->leaveGuildScript ?? null;
        $this->changeRoleScript = $options?->changeRoleScript ?? null;
        $this->deleteGuildScript = $options?->deleteGuildScript ?? null;
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
        return "GS2::Guild::Namespace";
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
        if ($this->changeNotification != null) {
            $properties["ChangeNotification"] = $this->changeNotification?->properties(
            );
        }
        if ($this->joinNotification != null) {
            $properties["JoinNotification"] = $this->joinNotification?->properties(
            );
        }
        if ($this->leaveNotification != null) {
            $properties["LeaveNotification"] = $this->leaveNotification?->properties(
            );
        }
        if ($this->changeMemberNotification != null) {
            $properties["ChangeMemberNotification"] = $this->changeMemberNotification?->properties(
            );
        }
        if ($this->receiveRequestNotification != null) {
            $properties["ReceiveRequestNotification"] = $this->receiveRequestNotification?->properties(
            );
        }
        if ($this->removeRequestNotification != null) {
            $properties["RemoveRequestNotification"] = $this->removeRequestNotification?->properties(
            );
        }
        if ($this->createGuildScript != null) {
            $properties["CreateGuildScript"] = $this->createGuildScript?->properties(
            );
        }
        if ($this->updateGuildScript != null) {
            $properties["UpdateGuildScript"] = $this->updateGuildScript?->properties(
            );
        }
        if ($this->joinGuildScript != null) {
            $properties["JoinGuildScript"] = $this->joinGuildScript?->properties(
            );
        }
        if ($this->receiveJoinRequestScript != null) {
            $properties["ReceiveJoinRequestScript"] = $this->receiveJoinRequestScript?->properties(
            );
        }
        if ($this->leaveGuildScript != null) {
            $properties["LeaveGuildScript"] = $this->leaveGuildScript?->properties(
            );
        }
        if ($this->changeRoleScript != null) {
            $properties["ChangeRoleScript"] = $this->changeRoleScript?->properties(
            );
        }
        if ($this->deleteGuildScript != null) {
            $properties["DeleteGuildScript"] = $this->deleteGuildScript?->properties(
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
        array $guildModels,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $guildModels,
        ))->addDependsOn(
            $this,
        );
        return $this;
    }
}
