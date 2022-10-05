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

namespace Gs2Cdk\Matchmaking\Model;


use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class Ballot {
	public string $userId;
	public string $ratingName;
	public string $gatheringName;
	public int $numberOfPlayer;

    public function __construct(
            string $userId,
            string $ratingName,
            string $gatheringName,
            int $numberOfPlayer,
    ) {
        $this->userId = $userId;
        $this->ratingName = $ratingName;
        $this->gatheringName = $gatheringName;
        $this->numberOfPlayer = $numberOfPlayer;
    }

    public function properties(): array {
        $properties = [];
        if ($this->userId != null) {
            $properties["UserId"] = $this->userId;
        }
        if ($this->ratingName != null) {
            $properties["RatingName"] = $this->ratingName;
        }
        if ($this->gatheringName != null) {
            $properties["GatheringName"] = $this->gatheringName;
        }
        if ($this->numberOfPlayer != null) {
            $properties["NumberOfPlayer"] = $this->numberOfPlayer;
        }
        return $properties;
    }
}
