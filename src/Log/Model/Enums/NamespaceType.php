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


enum NamespaceType {
    case GS2;
    case BIGQUERY;
    case FIREHOSE;

    public function toString(): String {
        switch ($this) {
            case self::GS2:
                return "gs2";
            case self::BIGQUERY:
                return "bigquery";
            case self::FIREHOSE:
                return "firehose";
        }
        return "unknown";
    }
}
