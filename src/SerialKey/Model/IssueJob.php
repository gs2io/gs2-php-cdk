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
namespace Gs2Cdk\SerialKey\Model;
use Gs2Cdk\SerialKey\Model\Options\IssueJobOptions;
use Gs2Cdk\SerialKey\Model\Enum\IssueJobStatus;

class IssueJob {
    private string $name;
    private int $issuedCount;
    private int $issueRequestCount;
    private IssueJobStatus $status;
    private int $createdAt;
    private ?string $metadata = null;

    public function __construct(
        string $name,
        int $issuedCount,
        int $issueRequestCount,
        IssueJobStatus $status,
        int $createdAt,
        ?IssueJobOptions $options = null,
    ) {
        $this->name = $name;
        $this->issuedCount = $issuedCount;
        $this->issueRequestCount = $issueRequestCount;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->metadata = $options?->metadata ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->issuedCount != null) {
            $properties["issuedCount"] = $this->issuedCount;
        }
        if ($this->issueRequestCount != null) {
            $properties["issueRequestCount"] = $this->issueRequestCount;
        }
        if ($this->status != null) {
            $properties["status"] = $this->status?->toString(
            );
        }
        if ($this->createdAt != null) {
            $properties["createdAt"] = $this->createdAt;
        }

        return $properties;
    }
}
