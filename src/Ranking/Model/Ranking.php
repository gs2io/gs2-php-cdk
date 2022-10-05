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

namespace Gs2Cdk\Ranking\Model;


use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class Ranking {
	public int $rank;
	public int $index;
	public string $userId;
	public int $score;
	public ?string $metadata;
	public int $createdAt;

    public function __construct(
            int $rank,
            int $index,
            string $userId,
            int $score,
            int $createdAt,
            string $metadata = null,
    ) {
        $this->rank = $rank;
        $this->index = $index;
        $this->userId = $userId;
        $this->score = $score;
        $this->metadata = $metadata;
        $this->createdAt = $createdAt;
    }

    public function properties(): array {
        $properties = [];
        if ($this->rank != null) {
            $properties["Rank"] = $this->rank;
        }
        if ($this->index != null) {
            $properties["Index"] = $this->index;
        }
        if ($this->userId != null) {
            $properties["UserId"] = $this->userId;
        }
        if ($this->score != null) {
            $properties["Score"] = $this->score;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->createdAt != null) {
            $properties["CreatedAt"] = $this->createdAt;
        }
        return $properties;
    }
}
