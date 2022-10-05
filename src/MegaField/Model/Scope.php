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

namespace Gs2Cdk\MegaField\Model;


use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class Scope {
	public string $layerName;
	public float $r;
	public int $limit;

    public function __construct(
            string $layerName,
            float $r,
            int $limit,
    ) {
        $this->layerName = $layerName;
        $this->r = $r;
        $this->limit = $limit;
    }

    public function properties(): array {
        $properties = [];
        if ($this->layerName != null) {
            $properties["LayerName"] = $this->layerName;
        }
        if ($this->r != null) {
            $properties["R"] = $this->r;
        }
        if ($this->limit != null) {
            $properties["Limit"] = $this->limit;
        }
        return $properties;
    }
}
