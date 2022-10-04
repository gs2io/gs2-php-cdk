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

namespace Gs2Cdk\Distributor\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;

class NamespaceRef {
    public String $namespaceName;

    public function __construct(
            String $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function currentDistributorMaster(
    ): CurrentDistributorMasterRef {
        return new CurrentDistributorMasterRef(
            namespaceName: $this->namespaceName,
        );
    }

    public function distributorModel(
            String $distributorName,
    ): DistributorModelRef {
        return new DistributorModelRef(
            namespaceName: $this->namespaceName,
            distributorName: $distributorName,
        );
    }

    public function distributorModelMaster(
            String $distributorName,
    ): DistributorModelMasterRef {
        return new DistributorModelMasterRef(
            namespaceName: $this->namespaceName,
            distributorName: $distributorName,
        );
    }

    public function grn(): String {
        return (new Join(
            ":",
            [
                "grn",
                "gs2",
                GetAttr::region()->str(),
                GetAttr::ownerId()->str(),
                "distributor",
                $this->namespaceName
            ]
        ))->str();
    }
}
