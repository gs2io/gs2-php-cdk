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
namespace Gs2Cdk\Friend\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Friend\Ref\NamespaceRef;

use Gs2Cdk\Friend\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private ?string $description = null;
    private ?ScriptSetting $followScript = null;
    private ?ScriptSetting $unfollowScript = null;
    private ?ScriptSetting $sendRequestScript = null;
    private ?ScriptSetting $cancelRequestScript = null;
    private ?ScriptSetting $acceptRequestScript = null;
    private ?ScriptSetting $rejectRequestScript = null;
    private ?ScriptSetting $deleteFriendScript = null;
    private ?ScriptSetting $updateProfileScript = null;
    private ?NotificationSetting $followNotification = null;
    private ?NotificationSetting $receiveRequestNotification = null;
    private ?NotificationSetting $acceptRequestNotification = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Friend_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $options?->description ?? null;
        $this->followScript = $options?->followScript ?? null;
        $this->unfollowScript = $options?->unfollowScript ?? null;
        $this->sendRequestScript = $options?->sendRequestScript ?? null;
        $this->cancelRequestScript = $options?->cancelRequestScript ?? null;
        $this->acceptRequestScript = $options?->acceptRequestScript ?? null;
        $this->rejectRequestScript = $options?->rejectRequestScript ?? null;
        $this->deleteFriendScript = $options?->deleteFriendScript ?? null;
        $this->updateProfileScript = $options?->updateProfileScript ?? null;
        $this->followNotification = $options?->followNotification ?? null;
        $this->receiveRequestNotification = $options?->receiveRequestNotification ?? null;
        $this->acceptRequestNotification = $options?->acceptRequestNotification ?? null;
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
        return "GS2::Friend::Namespace";
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
        if ($this->followScript != null) {
            $properties["FollowScript"] = $this->followScript?->properties(
            );
        }
        if ($this->unfollowScript != null) {
            $properties["UnfollowScript"] = $this->unfollowScript?->properties(
            );
        }
        if ($this->sendRequestScript != null) {
            $properties["SendRequestScript"] = $this->sendRequestScript?->properties(
            );
        }
        if ($this->cancelRequestScript != null) {
            $properties["CancelRequestScript"] = $this->cancelRequestScript?->properties(
            );
        }
        if ($this->acceptRequestScript != null) {
            $properties["AcceptRequestScript"] = $this->acceptRequestScript?->properties(
            );
        }
        if ($this->rejectRequestScript != null) {
            $properties["RejectRequestScript"] = $this->rejectRequestScript?->properties(
            );
        }
        if ($this->deleteFriendScript != null) {
            $properties["DeleteFriendScript"] = $this->deleteFriendScript?->properties(
            );
        }
        if ($this->updateProfileScript != null) {
            $properties["UpdateProfileScript"] = $this->updateProfileScript?->properties(
            );
        }
        if ($this->followNotification != null) {
            $properties["FollowNotification"] = $this->followNotification?->properties(
            );
        }
        if ($this->receiveRequestNotification != null) {
            $properties["ReceiveRequestNotification"] = $this->receiveRequestNotification?->properties(
            );
        }
        if ($this->acceptRequestNotification != null) {
            $properties["AcceptRequestNotification"] = $this->acceptRequestNotification?->properties(
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
