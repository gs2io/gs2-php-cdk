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

namespace Gs2Cdk\Formation\Model\Enum;


enum SlotWithSignaturePropertyType {
    case GS2_INVENTORY;
    case GS2_DICTIONARY;

    public function toString(): String {
        switch ($this) {
            case self::GS2_INVENTORY:
                return "gs2_inventory";
            case self::GS2_DICTIONARY:
                return "gs2_dictionary";
        }
        return "unknown";
    }
}
