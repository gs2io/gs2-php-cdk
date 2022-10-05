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

use Gs2Cdk\Matchmaking\Resource\Enum\NamespaceCreateGatheringTriggerType;
use Gs2Cdk\Matchmaking\Resource\Enum\NamespaceCompleteMatchmakingTriggerType;

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

use Gs2Cdk\Matchmaking\Ref\NamespaceRef;

class Namespace_ extends CdkResource {

    public Stack $stack;
    public string $name;
    public bool $enableRating;
    public string $createGatheringTriggerType;
    public ?string $createGatheringTriggerRealtimeNamespaceId;
    public ?string $createGatheringTriggerScriptId;
    public string $completeMatchmakingTriggerType;
    public ?string $completeMatchmakingTriggerRealtimeNamespaceId;
    public ?string $completeMatchmakingTriggerScriptId;

    public function __construct(
            Stack $stack,
            string $name,
            bool $enableRating,
            string $createGatheringTriggerType,
            string $createGatheringTriggerRealtimeNamespaceId,
            string $createGatheringTriggerScriptId,
            string $completeMatchmakingTriggerType,
            string $completeMatchmakingTriggerRealtimeNamespaceId,
            string $completeMatchmakingTriggerScriptId,
            string $description = null,
            NotificationSetting $joinNotification = null,
            NotificationSetting $leaveNotification = null,
            NotificationSetting $completeNotification = null,
            LogSetting $logSetting = null,
    ) {
        parent::__construct("Matchmaking_Namespace_" . $name);

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $description;
        $this->enableRating = $enableRating;
        $this->createGatheringTriggerType = $createGatheringTriggerType;
        $this->createGatheringTriggerRealtimeNamespaceId = $createGatheringTriggerRealtimeNamespaceId;
        $this->createGatheringTriggerScriptId = $createGatheringTriggerScriptId;
        $this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
        $this->completeMatchmakingTriggerRealtimeNamespaceId = $completeMatchmakingTriggerRealtimeNamespaceId;
        $this->completeMatchmakingTriggerScriptId = $completeMatchmakingTriggerScriptId;
        $this->joinNotification = $joinNotification;
        $this->leaveNotification = $leaveNotification;
        $this->completeNotification = $completeNotification;
        $this->logSetting = $logSetting;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Matchmaking::Namespace";
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->enableRating != null) {
            $properties["EnableRating"] = $this->enableRating;
        }
        if ($this->createGatheringTriggerType != null) {
            $properties["CreateGatheringTriggerType"] = $this->createGatheringTriggerType->toString();
        }
        if ($this->createGatheringTriggerRealtimeNamespaceId != null) {
            $properties["CreateGatheringTriggerRealtimeNamespaceId"] = $this->createGatheringTriggerRealtimeNamespaceId;
        }
        if ($this->createGatheringTriggerScriptId != null) {
            $properties["CreateGatheringTriggerScriptId"] = $this->createGatheringTriggerScriptId;
        }
        if ($this->completeMatchmakingTriggerType != null) {
            $properties["CompleteMatchmakingTriggerType"] = $this->completeMatchmakingTriggerType->toString();
        }
        if ($this->completeMatchmakingTriggerRealtimeNamespaceId != null) {
            $properties["CompleteMatchmakingTriggerRealtimeNamespaceId"] = $this->completeMatchmakingTriggerRealtimeNamespaceId;
        }
        if ($this->completeMatchmakingTriggerScriptId != null) {
            $properties["CompleteMatchmakingTriggerScriptId"] = $this->completeMatchmakingTriggerScriptId;
        }
        if ($this->joinNotification != null) {
            $properties["JoinNotification"] = $this->joinNotification->properties();
        }
        if ($this->leaveNotification != null) {
            $properties["LeaveNotification"] = $this->leaveNotification->properties();
        }
        if ($this->completeNotification != null) {
            $properties["CompleteNotification"] = $this->completeNotification->properties();
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
     * @var array<RatingModel> $ratingModels
     */
    public function masterData(
            array $ratingModels,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $ratingModels,
        ))->addDependsOn(
            $this
        );
        return $this;
    }
}
