<?php
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

namespace Gs2Cdk\Lottery\Model\Enum;

enum PrizeType {
    case ACTION;
    case PRIZE_TABLE;

    public function toString(): String {
        switch ($this) {
            case self::ACTION:
                return "action";
            case self::PRIZE_TABLE:
                return "prize_table";
        }
        return "unknown";
    }
}
