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
namespace Gs2Cdk\Chat\Model;
use Gs2Cdk\Chat\Model\Options\NotificationTypeOptions;

class NotificationType {
    private int $category;
    private bool $enableTransferMobilePushNotification;

    public function __construct(
        int $category,
        bool $enableTransferMobilePushNotification,
        ?NotificationTypeOptions $options = null,
    ) {
        $this->category = $category;
        $this->enableTransferMobilePushNotification = $enableTransferMobilePushNotification;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->category != null) {
            $properties["category"] = $this->category;
        }
        if ($this->enableTransferMobilePushNotification != null) {
            $properties["enableTransferMobilePushNotification"] = $this->enableTransferMobilePushNotification;
        }

        return $properties;
    }
}
