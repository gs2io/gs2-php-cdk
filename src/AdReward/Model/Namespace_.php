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
namespace Gs2Cdk\AdReward\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\AdReward\Model\AdMob;
use Gs2Cdk\AdReward\Model\UnityAd;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\AdReward\Ref\NamespaceRef;

use Gs2Cdk\AdReward\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private ?AdMob $admob = null;
    private ?UnityAd $unityAd = null;
    private ?string $description = null;
    private ?NotificationSetting $changePointNotification = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "AdReward_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->admob = $options?->admob ?? null;
        $this->unityAd = $options?->unityAd ?? null;
        $this->description = $options?->description ?? null;
        $this->changePointNotification = $options?->changePointNotification ?? null;
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
        return "GS2::AdReward::Namespace";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->admob != null) {
            $properties["Admob"] = $this->admob?->properties(
            );
        }
        if ($this->unityAd != null) {
            $properties["UnityAd"] = $this->unityAd?->properties(
            );
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->changePointNotification != null) {
            $properties["ChangePointNotification"] = $this->changePointNotification?->properties(
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
