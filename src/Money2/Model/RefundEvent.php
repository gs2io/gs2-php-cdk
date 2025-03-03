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
namespace Gs2Cdk\Money2\Model;
use Gs2Cdk\Money2\Model\AppleAppStoreVerifyReceiptEvent;
use Gs2Cdk\Money2\Model\GooglePlayVerifyReceiptEvent;
use Gs2Cdk\Money2\Model\Options\RefundEventOptions;
use Gs2Cdk\Money2\Model\Enums\RefundEventPlatform;

class RefundEvent {
    private string $contentName;
    private RefundEventPlatform $platform;
    private ?AppleAppStoreVerifyReceiptEvent $appleAppStoreRefundEvent = null;
    private ?GooglePlayVerifyReceiptEvent $googlePlayRefundEvent = null;

    public function __construct(
        string $contentName,
        RefundEventPlatform $platform,
        ?RefundEventOptions $options = null,
    ) {
        $this->contentName = $contentName;
        $this->platform = $platform;
        $this->appleAppStoreRefundEvent = $options?->appleAppStoreRefundEvent ?? null;
        $this->googlePlayRefundEvent = $options?->googlePlayRefundEvent ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->contentName != null) {
            $properties["contentName"] = $this->contentName;
        }
        if ($this->platform != null) {
            $properties["platform"] = $this->platform?->toString(
            );
        }
        if ($this->appleAppStoreRefundEvent != null) {
            $properties["appleAppStoreRefundEvent"] = $this->appleAppStoreRefundEvent?->properties(
            );
        }
        if ($this->googlePlayRefundEvent != null) {
            $properties["googlePlayRefundEvent"] = $this->googlePlayRefundEvent?->properties(
            );
        }

        return $properties;
    }
}
