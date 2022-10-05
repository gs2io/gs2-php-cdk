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

namespace Gs2Cdk\Deploy\Resource\Enum;

enum StackStatus {
    case CREATE_PROCESSING;
    case CREATE_COMPLETE;
    case UPDATE_PROCESSING;
    case UPDATE_COMPLETE;
    case CLEAN_PROCESSING;
    case CLEAN_COMPLETE;
    case DELETE_PROCESSING;
    case DELETE_COMPLETE;
    case ROLLBACK_INITIALIZING;
    case ROLLBACK_PROCESSING;
    case ROLLBACK_COMPLETE;

    public function toString(): String {
        switch ($this) {
            case self::CREATE_PROCESSING:
                return "CREATE_PROCESSING";
            case self::CREATE_COMPLETE:
                return "CREATE_COMPLETE";
            case self::UPDATE_PROCESSING:
                return "UPDATE_PROCESSING";
            case self::UPDATE_COMPLETE:
                return "UPDATE_COMPLETE";
            case self::CLEAN_PROCESSING:
                return "CLEAN_PROCESSING";
            case self::CLEAN_COMPLETE:
                return "CLEAN_COMPLETE";
            case self::DELETE_PROCESSING:
                return "DELETE_PROCESSING";
            case self::DELETE_COMPLETE:
                return "DELETE_COMPLETE";
            case self::ROLLBACK_INITIALIZING:
                return "ROLLBACK_INITIALIZING";
            case self::ROLLBACK_PROCESSING:
                return "ROLLBACK_PROCESSING";
            case self::ROLLBACK_COMPLETE:
                return "ROLLBACK_COMPLETE";
        }
        return "unknown";
    }
}
