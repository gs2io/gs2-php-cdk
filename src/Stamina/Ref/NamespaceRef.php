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

namespace Gs2Cdk\Stamina\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;

class NamespaceRef {
    public String $namespaceName;

    public function __construct(
            String $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function currentStaminaMaster(
    ): CurrentStaminaMasterRef {
        return new CurrentStaminaMasterRef(
            namespaceName: $this->namespaceName,
        );
    }

    public function maxStaminaTable(
            String $maxStaminaTableName,
    ): MaxStaminaTableRef {
        return new MaxStaminaTableRef(
            namespaceName: $this->namespaceName,
            maxStaminaTableName: $maxStaminaTableName,
        );
    }

    public function recoverIntervalTable(
            String $recoverIntervalTableName,
    ): RecoverIntervalTableRef {
        return new RecoverIntervalTableRef(
            namespaceName: $this->namespaceName,
            recoverIntervalTableName: $recoverIntervalTableName,
        );
    }

    public function recoverValueTable(
            String $recoverValueTableName,
    ): RecoverValueTableRef {
        return new RecoverValueTableRef(
            namespaceName: $this->namespaceName,
            recoverValueTableName: $recoverValueTableName,
        );
    }

    public function staminaModel(
            String $staminaName,
    ): StaminaModelRef {
        return new StaminaModelRef(
            namespaceName: $this->namespaceName,
            staminaName: $staminaName,
        );
    }

    public function recoverIntervalTableMaster(
            String $recoverIntervalTableName,
    ): RecoverIntervalTableMasterRef {
        return new RecoverIntervalTableMasterRef(
            namespaceName: $this->namespaceName,
            recoverIntervalTableName: $recoverIntervalTableName,
        );
    }

    public function maxStaminaTableMaster(
            String $maxStaminaTableName,
    ): MaxStaminaTableMasterRef {
        return new MaxStaminaTableMasterRef(
            namespaceName: $this->namespaceName,
            maxStaminaTableName: $maxStaminaTableName,
        );
    }

    public function recoverValueTableMaster(
            String $recoverValueTableName,
    ): RecoverValueTableMasterRef {
        return new RecoverValueTableMasterRef(
            namespaceName: $this->namespaceName,
            recoverValueTableName: $recoverValueTableName,
        );
    }

    public function staminaModelMaster(
            String $staminaName,
    ): StaminaModelMasterRef {
        return new StaminaModelMasterRef(
            namespaceName: $this->namespaceName,
            staminaName: $staminaName,
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
                "stamina",
                $this->namespaceName
            ]
        ))->str();
    }
}
