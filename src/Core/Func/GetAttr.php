<?php /** @noinspection ALL */
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

namespace Gs2Cdk\Core\Func;

class GetAttr implements Func
{
    public String $key;

    public function __construct(
        CdkResource $resource = null,
        String $path = null,
        String $key = null,
    ) {
        if ($key == null) {
            $this->key = $resource->resourceName . "." . $path;
        } else {
            $this->key = $key;
        }
    }

    public function str(): String {
        return "!GetAttr " . $this->key;
    }

    public static function region(): GetAttr {
        return new GetAttr(
            key: "Gs2::Region"
        );
    }

    public static function ownerId(): GetAttr {
        return new GetAttr(
            key: "Gs2::OwnerId"
        );
    }
}