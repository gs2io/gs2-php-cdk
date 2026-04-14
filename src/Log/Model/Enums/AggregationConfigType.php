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

namespace Gs2Cdk\Log\Model\Enums;


enum AggregationConfigType {
    case COUNT;
    case UNIQUE;
    case SUM;
    case AVG;
    case MAX;
    case MIN;
    case P90;
    case P95;
    case P99;

    public function toString(): String {
        switch ($this) {
            case self::COUNT:
                return "count";
            case self::UNIQUE:
                return "unique";
            case self::SUM:
                return "sum";
            case self::AVG:
                return "avg";
            case self::MAX:
                return "max";
            case self::MIN:
                return "min";
            case self::P90:
                return "p90";
            case self::P95:
                return "p95";
            case self::P99:
                return "p99";
        }
        return "unknown";
    }
}
