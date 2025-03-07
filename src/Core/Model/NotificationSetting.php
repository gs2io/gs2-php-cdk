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

namespace Gs2Cdk\Core\Model;

class NotificationSetting
{

    public String $gatewayNamespaceId;
    public ?String $enableTransferMobileNotification;
    public ?String $sound;

    public function __construct(
        NotificationSettingOptions $options = null,
    ) {
        $this->gatewayNamespaceId = $options?->gatewayNamespaceId ?? null;
        $this->enableTransferMobileNotification = $options?->enableTransferMobileNotification ?? null;
        $this->sound = $options?->sound ?? null;
    }

    public function properties(): array {
        $properties = [];

        if ($this->gatewayNamespaceId != null) {
            $properties["GatewayNamespaceId"] = $this->gatewayNamespaceId;
        }
        if ($this->enableTransferMobileNotification != null) {
            $properties["EnableTransferMobileNotification"] = $this->enableTransferMobileNotification;
        }
        if ($this->sound != null) {
            $properties["Sound"] = $this->sound;
        }

        return $properties;
    }
}