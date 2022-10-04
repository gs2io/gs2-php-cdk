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

namespace Gs2Cdk\Log\Resource;

use Gs2Cdk\Log\Resource\Enum\InsightStatus;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

use Gs2Cdk\Log\Ref\InsightRef;

class Insight extends CdkResource {

    public Stack $stack;
    public string $namespaceName;

    public function __construct(
            Stack $stack,
            string $namespaceName,
    ) {
        parent::__construct("Log_Insight_" . $name);

        $this->stack = $stack;
        $this->namespaceName = $namespaceName;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Log::Insight";
    }

    public function properties(): array {
        $properties = [];
        if ($this->namespaceName != null) {
            $properties["NamespaceName"] = $this->namespaceName;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): InsightRef {
        return new InsightRef(
            namespaceName: namespaceName,
            insightName: $this->name,
        );
    }

    public function getAttrInsightId(): GetAttr {
        return new GetAttr(
            key: "Item.InsightId"
        );
    }
}
