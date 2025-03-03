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

namespace Gs2Cdk\Money2\Model\Enums;


enum RefundEventPlatform {
    case APPLE_APP_STORE;
    case GOOGLE_PLAY;
    case FAKE;

    public function toString(): String {
        switch ($this) {
            case self::APPLE_APP_STORE:
                return "AppleAppStore";
            case self::GOOGLE_PLAY:
                return "GooglePlay";
            case self::FAKE:
                return "fake";
        }
        return "unknown";
    }
}
