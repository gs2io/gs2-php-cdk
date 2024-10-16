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
namespace Gs2Cdk\Dictionary\Ref;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Func\Join;
use Gs2Cdk\Dictionary\Ref\EntryModelRef;
use Gs2Cdk\Dictionary\StampSheet\AddEntriesByUserId;
use Gs2Cdk\Dictionary\StampSheet\DeleteEntriesByUserId;
use Gs2Cdk\Dictionary\StampSheet\VerifyEntryByUserId;

class NamespaceRef {
    private string $namespaceName;

    public function __construct(
        string $namespaceName,
    ) {
        $this->namespaceName = $namespaceName;
    }

    public function entryModel(
        string $entryModelName,
    ): EntryModelRef {
        return (new EntryModelRef(
            $this->namespaceName,
            $entryModelName,
        ));
    }

    public function addEntries(
        ?array $entryModelNames = null,
        ?string $userId = "#{userId}",
    ): AddEntriesByUserId {
        return (new AddEntriesByUserId(
            $this->namespaceName,
            $entryModelNames,
            $userId,
        ));
    }

    public function deleteEntries(
        ?array $entryModelNames = null,
        ?string $userId = "#{userId}",
    ): DeleteEntriesByUserId {
        return (new DeleteEntriesByUserId(
            $this->namespaceName,
            $entryModelNames,
            $userId,
        ));
    }

    public function verifyEntry(
        string $entryModelName,
        string $verifyType,
        ?string $userId = "#{userId}",
    ): VerifyEntryByUserId {
        return (new VerifyEntryByUserId(
            $this->namespaceName,
            $entryModelName,
            $verifyType,
            $userId,
        ));
    }

    public function grn(
    ): string {
        return (new Join(
            ":",
            [
                "grn",
                "gs2",
                GetAttr::region(
                )->str(
                ),
                GetAttr::ownerId(
                )->str(
                ),
                "dictionary",
                $this->namespaceName,
            ],
        ))->str(
        );
    }
}
