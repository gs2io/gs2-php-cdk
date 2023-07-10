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
namespace Gs2Cdk\Lottery\Model;
use Gs2Cdk\Lottery\Model\Options\LotteryModelOptions;
use Gs2Cdk\Lottery\Model\Options\LotteryModelMethodIsPrizeTableOptions;
use Gs2Cdk\Lottery\Model\Options\LotteryModelMethodIsScriptOptions;
use Gs2Cdk\Lottery\Model\Enum\LotteryModelMode;
use Gs2Cdk\Lottery\Model\Enum\LotteryModelMethod;

class LotteryModel {
    private string $name;
    private LotteryModelMode $mode;
    private LotteryModelMethod $method;
    private ?string $metadata = null;
    private ?string $prizeTableName = null;
    private ?string $choicePrizeTableScriptId = null;

    public function __construct(
        string $name,
        LotteryModelMode $mode,
        LotteryModelMethod $method,
        ?LotteryModelOptions $options = null,
    ) {
        $this->name = $name;
        $this->mode = $mode;
        $this->method = $method;
        $this->metadata = $options?->metadata ?? null;
        $this->prizeTableName = $options?->prizeTableName ?? null;
        $this->choicePrizeTableScriptId = $options?->choicePrizeTableScriptId ?? null;
    }

    public static function methodIsPrizeTable(
        string $name,
        LotteryModelMode $mode,
        ?LotteryModelMethodIsPrizeTableOptions $options = null,
    ): LotteryModel {
        return (new LotteryModel(
            $name,
            $mode,
            LotteryModelMethod::PRIZE_TABLE,
            new LotteryModelOptions(
                metadata: $options?->metadata,
                prizeTableName: $options?->prizeTableName,
            ),
        ));
    }

    public static function methodIsScript(
        string $name,
        LotteryModelMode $mode,
        ?LotteryModelMethodIsScriptOptions $options = null,
    ): LotteryModel {
        return (new LotteryModel(
            $name,
            $mode,
            LotteryModelMethod::SCRIPT,
            new LotteryModelOptions(
                metadata: $options?->metadata,
                choicePrizeTableScriptId: $options?->choicePrizeTableScriptId,
            ),
        ));
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
        if ($this->mode != null) {
            $properties["mode"] = $this->mode?->toString(
            );
        }
        if ($this->method != null) {
            $properties["method"] = $this->method?->toString(
            );
        }
        if ($this->prizeTableName != null) {
            $properties["prizeTableName"] = $this->prizeTableName;
        }
        if ($this->choicePrizeTableScriptId != null) {
            $properties["choicePrizeTableScriptId"] = $this->choicePrizeTableScriptId;
        }

        return $properties;
    }
}
