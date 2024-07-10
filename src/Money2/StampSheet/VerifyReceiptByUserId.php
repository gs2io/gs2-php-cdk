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
 *
 * deny overwrite
 */
namespace Gs2Cdk\Money2\StampSheet;

use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;
use Gs2Cdk\Money2\Model\Receipt;

class VerifyReceiptByUserId extends ConsumeAction {

    public function __construct(
        string $namespaceName,
        string $contentName,
        string $receipt = "#{receipt}",
        ?string $userId = "#{userId}",
    ) {
        $properties = [];

        $properties["namespaceName"] = $namespaceName;
        $properties["contentName"] = $contentName;
        $properties["receipt"] = $receipt;
        $properties["userId"] = $userId;

        parent::__construct(
            "Gs2Money2:VerifyReceiptByUserId",
            $properties,
        );
    }
}
