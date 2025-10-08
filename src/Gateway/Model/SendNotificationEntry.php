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
namespace Gs2Cdk\Gateway\Model;
use Gs2Cdk\Gateway\Model\Options\SendNotificationEntryOptions;

class SendNotificationEntry {
    private string $userId;
    private string $issuer;
    private string $subject;
    private string $payload;
    private bool $enableTransferMobileNotification;
    private ?string $sound = null;

    public function __construct(
        string $userId,
        string $issuer,
        string $subject,
        string $payload,
        bool $enableTransferMobileNotification,
        ?SendNotificationEntryOptions $options = null,
    ) {
        $this->userId = $userId;
        $this->issuer = $issuer;
        $this->subject = $subject;
        $this->payload = $payload;
        $this->enableTransferMobileNotification = $enableTransferMobileNotification;
        $this->sound = $options?->sound ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->userId != null) {
            $properties["userId"] = $this->userId;
        }
        if ($this->issuer != null) {
            $properties["issuer"] = $this->issuer;
        }
        if ($this->subject != null) {
            $properties["subject"] = $this->subject;
        }
        if ($this->payload != null) {
            $properties["payload"] = $this->payload;
        }
        if ($this->enableTransferMobileNotification != null) {
            $properties["enableTransferMobileNotification"] = $this->enableTransferMobileNotification;
        }
        if ($this->sound != null) {
            $properties["sound"] = $this->sound;
        }

        return $properties;
    }
}
