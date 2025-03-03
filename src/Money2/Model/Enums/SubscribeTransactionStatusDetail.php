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


enum SubscribeTransactionStatusDetail {
    case ACTIVE_ACTIVE;
    case ACTIVE_CONVERTED_FROM_TRIAL;
    case ACTIVE_IN_TRIAL;
    case ACTIVE_IN_INTRO_OFFER;
    case GRACE_CANCELED;
    case GRACE_GRACE_PERIOD;
    case GRACE_ON_HOLD;
    case INACTIVE_EXPIRED;
    case INACTIVE_REVOKED;

    public function toString(): String {
        switch ($this) {
            case self::ACTIVE_ACTIVE:
                return "active@active";
            case self::ACTIVE_CONVERTED_FROM_TRIAL:
                return "active@converted_from_trial";
            case self::ACTIVE_IN_TRIAL:
                return "active@in_trial";
            case self::ACTIVE_IN_INTRO_OFFER:
                return "active@in_intro_offer";
            case self::GRACE_CANCELED:
                return "grace@canceled";
            case self::GRACE_GRACE_PERIOD:
                return "grace@grace_period";
            case self::GRACE_ON_HOLD:
                return "grace@on_hold";
            case self::INACTIVE_EXPIRED:
                return "inactive@expired";
            case self::INACTIVE_REVOKED:
                return "inactive@revoked";
        }
        return "unknown";
    }
}
