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
use Gs2Cdk\Money2\Model\Options\AppleAppStoreVerifyReceiptEventOptions;
use Gs2Cdk\Money2\Model\Enum\AppleAppStoreVerifyReceiptEventEnvironment;

class AppleAppStoreVerifyReceiptEvent {
    private AppleAppStoreVerifyReceiptEventEnvironment $environment;

    public function __construct(
        AppleAppStoreVerifyReceiptEventEnvironment $environment,
        ?AppleAppStoreVerifyReceiptEventOptions $options = null,
    ) {
        $this->environment = $environment;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->environment != null) {
            $properties["environment"] = $this->environment?->toString(
            );
        }

        return $properties;
    }
}
