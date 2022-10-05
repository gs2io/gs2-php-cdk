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

enum EventType {
    case CREATE_IN_PROGRESS;
    case CREATE_COMPLETE;
    case CREATE_FAILED;
    case UPDATE_IN_PROGRESS;
    case UPDATE_COMPLETE;
    case UPDATE_FAILED;
    case CLEAN_IN_PROGRESS;
    case CLEAN_COMPLETE;
    case CLEAN_FAILED;
    case DELETE_IN_PROGRESS;
    case DELETE_COMPLETE;
    case DELETE_FAILED;
    case ROLLBACK_IN_PROGRESS;
    case ROLLBACK_COMPLETE;
    case ROLLBACK_FAILED;

    public function toString(): String {
        switch ($this) {
            case self::CREATE_IN_PROGRESS:
                return "CREATE_IN_PROGRESS";
            case self::CREATE_COMPLETE:
                return "CREATE_COMPLETE";
            case self::CREATE_FAILED:
                return "CREATE_FAILED";
            case self::UPDATE_IN_PROGRESS:
                return "UPDATE_IN_PROGRESS";
            case self::UPDATE_COMPLETE:
                return "UPDATE_COMPLETE";
            case self::UPDATE_FAILED:
                return "UPDATE_FAILED";
            case self::CLEAN_IN_PROGRESS:
                return "CLEAN_IN_PROGRESS";
            case self::CLEAN_COMPLETE:
                return "CLEAN_COMPLETE";
            case self::CLEAN_FAILED:
                return "CLEAN_FAILED";
            case self::DELETE_IN_PROGRESS:
                return "DELETE_IN_PROGRESS";
            case self::DELETE_COMPLETE:
                return "DELETE_COMPLETE";
            case self::DELETE_FAILED:
                return "DELETE_FAILED";
            case self::ROLLBACK_IN_PROGRESS:
                return "ROLLBACK_IN_PROGRESS";
            case self::ROLLBACK_COMPLETE:
                return "ROLLBACK_COMPLETE";
            case self::ROLLBACK_FAILED:
                return "ROLLBACK_FAILED";
        }
        return "unknown";
    }
}
