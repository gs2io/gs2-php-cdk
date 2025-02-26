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
namespace Gs2Cdk\Matchmaking\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Matchmaking\Ref\NamespaceRef;
use Gs2Cdk\Matchmaking\Model\CurrentMasterData;
use Gs2Cdk\Matchmaking\Model\RatingModel;
use Gs2Cdk\Matchmaking\Model\SeasonModel;
use Gs2Cdk\Matchmaking\Model\Enums\NamespaceEnableDisconnectDetection;
use Gs2Cdk\Matchmaking\Model\Enums\NamespaceCreateGatheringTriggerType;
use Gs2Cdk\Matchmaking\Model\Enums\NamespaceCompleteMatchmakingTriggerType;
use Gs2Cdk\Matchmaking\Model\Enums\NamespaceEnableCollaborateSeasonRating;

use Gs2Cdk\Matchmaking\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private NamespaceCreateGatheringTriggerType $createGatheringTriggerType;
    private NamespaceCompleteMatchmakingTriggerType $completeMatchmakingTriggerType;
    private ?string $description = null;
    private ?bool $enableRating = null;
    private ?NamespaceEnableDisconnectDetection $enableDisconnectDetection = null;
    private ?int $disconnectDetectionTimeoutSeconds = null;
    private ?string $createGatheringTriggerRealtimeNamespaceId = null;
    private ?string $createGatheringTriggerScriptId = null;
    private ?string $completeMatchmakingTriggerRealtimeNamespaceId = null;
    private ?string $completeMatchmakingTriggerScriptId = null;
    private ?NamespaceEnableCollaborateSeasonRating $enableCollaborateSeasonRating = null;
    private ?string $collaborateSeasonRatingNamespaceId = null;
    private ?int $collaborateSeasonRatingTtl = null;
    private ?ScriptSetting $changeRatingScript = null;
    private ?NotificationSetting $joinNotification = null;
    private ?NotificationSetting $leaveNotification = null;
    private ?NotificationSetting $completeNotification = null;
    private ?NotificationSetting $changeRatingNotification = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        NamespaceCreateGatheringTriggerType $createGatheringTriggerType,
        NamespaceCompleteMatchmakingTriggerType $completeMatchmakingTriggerType,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Matchmaking_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->createGatheringTriggerType = $createGatheringTriggerType;
        $this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
        $this->description = $options?->description ?? null;
        $this->enableRating = $options?->enableRating ?? null;
        $this->enableDisconnectDetection = $options?->enableDisconnectDetection ?? null;
        $this->disconnectDetectionTimeoutSeconds = $options?->disconnectDetectionTimeoutSeconds ?? null;
        $this->createGatheringTriggerRealtimeNamespaceId = $options?->createGatheringTriggerRealtimeNamespaceId ?? null;
        $this->createGatheringTriggerScriptId = $options?->createGatheringTriggerScriptId ?? null;
        $this->completeMatchmakingTriggerRealtimeNamespaceId = $options?->completeMatchmakingTriggerRealtimeNamespaceId ?? null;
        $this->completeMatchmakingTriggerScriptId = $options?->completeMatchmakingTriggerScriptId ?? null;
        $this->enableCollaborateSeasonRating = $options?->enableCollaborateSeasonRating ?? null;
        $this->collaborateSeasonRatingNamespaceId = $options?->collaborateSeasonRatingNamespaceId ?? null;
        $this->collaborateSeasonRatingTtl = $options?->collaborateSeasonRatingTtl ?? null;
        $this->changeRatingScript = $options?->changeRatingScript ?? null;
        $this->joinNotification = $options?->joinNotification ?? null;
        $this->leaveNotification = $options?->leaveNotification ?? null;
        $this->completeNotification = $options?->completeNotification ?? null;
        $this->changeRatingNotification = $options?->changeRatingNotification ?? null;
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
        return "GS2::Matchmaking::Namespace";
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
        if ($this->enableRating != null) {
            $properties["EnableRating"] = $this->enableRating;
        }
        if ($this->enableDisconnectDetection != null) {
            $properties["EnableDisconnectDetection"] = $this->enableDisconnectDetection;
        }
        if ($this->disconnectDetectionTimeoutSeconds != null) {
            $properties["DisconnectDetectionTimeoutSeconds"] = $this->disconnectDetectionTimeoutSeconds;
        }
        if ($this->createGatheringTriggerType != null) {
            $properties["CreateGatheringTriggerType"] = $this->createGatheringTriggerType;
        }
        if ($this->createGatheringTriggerRealtimeNamespaceId != null) {
            $properties["CreateGatheringTriggerRealtimeNamespaceId"] = $this->createGatheringTriggerRealtimeNamespaceId;
        }
        if ($this->createGatheringTriggerScriptId != null) {
            $properties["CreateGatheringTriggerScriptId"] = $this->createGatheringTriggerScriptId;
        }
        if ($this->completeMatchmakingTriggerType != null) {
            $properties["CompleteMatchmakingTriggerType"] = $this->completeMatchmakingTriggerType;
        }
        if ($this->completeMatchmakingTriggerRealtimeNamespaceId != null) {
            $properties["CompleteMatchmakingTriggerRealtimeNamespaceId"] = $this->completeMatchmakingTriggerRealtimeNamespaceId;
        }
        if ($this->completeMatchmakingTriggerScriptId != null) {
            $properties["CompleteMatchmakingTriggerScriptId"] = $this->completeMatchmakingTriggerScriptId;
        }
        if ($this->enableCollaborateSeasonRating != null) {
            $properties["EnableCollaborateSeasonRating"] = $this->enableCollaborateSeasonRating;
        }
        if ($this->collaborateSeasonRatingNamespaceId != null) {
            $properties["CollaborateSeasonRatingNamespaceId"] = $this->collaborateSeasonRatingNamespaceId;
        }
        if ($this->collaborateSeasonRatingTtl != null) {
            $properties["CollaborateSeasonRatingTtl"] = $this->collaborateSeasonRatingTtl;
        }
        if ($this->changeRatingScript != null) {
            $properties["ChangeRatingScript"] = $this->changeRatingScript?->properties(
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
        if ($this->completeNotification != null) {
            $properties["CompleteNotification"] = $this->completeNotification?->properties(
            );
        }
        if ($this->changeRatingNotification != null) {
            $properties["ChangeRatingNotification"] = $this->changeRatingNotification?->properties(
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
        array $ratingModels,
        array $seasonModels,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $ratingModels,
            $seasonModels,
        ))->addDependsOn(
            $this,
        );
        return $this;
    }
}
