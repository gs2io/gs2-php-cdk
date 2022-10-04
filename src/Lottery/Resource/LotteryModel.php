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

namespace Gs2Cdk\Lottery\Resource;

use Gs2Cdk\Lottery\Resource\Enum\LotteryModelMode;
use Gs2Cdk\Lottery\Resource\Enum\LotteryModelMethod;

class LotteryModel {
	public string $name;
	public ?string $metadata;
	public LotteryModelMode $mode;
	public LotteryModelMethod $method;
	public ?string $prizeTableName;
	public ?string $choicePrizeTableScriptId;

    public function __construct(
            string $name,
            LotteryModelMode $mode,
            LotteryModelMethod $method,
            string $metadata = null,
            string $prizeTableName = null,
            string $choicePrizeTableScriptId = null,
    ) {
        $this->name = $name;
        $this->metadata = $metadata;
        $this->mode = $mode;
        $this->method = $method;
        $this->prizeTableName = $prizeTableName;
        $this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
  }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->metadata != null) {
            $properties["Metadata"] = $this->metadata;
        }
        if ($this->mode != null) {
            $properties["Mode"] = $this->mode->toString();
        }
        if ($this->method != null) {
            $properties["Method"] = $this->method->toString();
        }
        if ($this->prizeTableName != null) {
            $properties["PrizeTableName"] = $this->prizeTableName;
        }
        if ($this->choicePrizeTableScriptId != null) {
            $properties["ChoicePrizeTableScriptId"] = $this->choicePrizeTableScriptId;
        }
        return $properties;
    }

    public function ref(
            String $namespaceName,
    ): LotteryModelRef {
        return new LotteryModelRef(
            $namespaceName,
            $this->name,
        );
    }
}
