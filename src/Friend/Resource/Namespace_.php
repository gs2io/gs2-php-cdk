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

namespace Gs2Cdk\Friend\Resource;


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

use Gs2Cdk\Friend\Ref\NamespaceRef;

class Namespace_ extends CdkResource {

    public Stack $stack;
    public string $name;

    public function __construct(
            Stack $stack,
            string $name,
            string $description = null,
            ScriptSetting $followScript = null,
            ScriptSetting $unfollowScript = null,
            ScriptSetting $sendRequestScript = null,
            ScriptSetting $cancelRequestScript = null,
            ScriptSetting $acceptRequestScript = null,
            ScriptSetting $rejectRequestScript = null,
            ScriptSetting $deleteFriendScript = null,
            ScriptSetting $updateProfileScript = null,
            NotificationSetting $followNotification = null,
            NotificationSetting $receiveRequestNotification = null,
            NotificationSetting $acceptRequestNotification = null,
            LogSetting $logSetting = null,
    ) {
        parent::__construct("Friend_Namespace_" . $name);

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $description;
        $this->followScript = $followScript;
        $this->unfollowScript = $unfollowScript;
        $this->sendRequestScript = $sendRequestScript;
        $this->cancelRequestScript = $cancelRequestScript;
        $this->acceptRequestScript = $acceptRequestScript;
        $this->rejectRequestScript = $rejectRequestScript;
        $this->deleteFriendScript = $deleteFriendScript;
        $this->updateProfileScript = $updateProfileScript;
        $this->followNotification = $followNotification;
        $this->receiveRequestNotification = $receiveRequestNotification;
        $this->acceptRequestNotification = $acceptRequestNotification;
        $this->logSetting = $logSetting;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Friend::Namespace";
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->followScript != null) {
            $properties["FollowScript"] = $this->followScript->properties();
        }
        if ($this->unfollowScript != null) {
            $properties["UnfollowScript"] = $this->unfollowScript->properties();
        }
        if ($this->sendRequestScript != null) {
            $properties["SendRequestScript"] = $this->sendRequestScript->properties();
        }
        if ($this->cancelRequestScript != null) {
            $properties["CancelRequestScript"] = $this->cancelRequestScript->properties();
        }
        if ($this->acceptRequestScript != null) {
            $properties["AcceptRequestScript"] = $this->acceptRequestScript->properties();
        }
        if ($this->rejectRequestScript != null) {
            $properties["RejectRequestScript"] = $this->rejectRequestScript->properties();
        }
        if ($this->deleteFriendScript != null) {
            $properties["DeleteFriendScript"] = $this->deleteFriendScript->properties();
        }
        if ($this->updateProfileScript != null) {
            $properties["UpdateProfileScript"] = $this->updateProfileScript->properties();
        }
        if ($this->followNotification != null) {
            $properties["FollowNotification"] = $this->followNotification->properties();
        }
        if ($this->receiveRequestNotification != null) {
            $properties["ReceiveRequestNotification"] = $this->receiveRequestNotification->properties();
        }
        if ($this->acceptRequestNotification != null) {
            $properties["AcceptRequestNotification"] = $this->acceptRequestNotification->properties();
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
