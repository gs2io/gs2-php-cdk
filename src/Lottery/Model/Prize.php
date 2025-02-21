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
namespace Gs2Cdk\Lottery\Model;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Lottery\Model\Options\PrizeOptions;
use Gs2Cdk\Lottery\Model\Options\PrizeTypeIsActionOptions;
use Gs2Cdk\Lottery\Model\Options\PrizeTypeIsPrizeTableOptions;
use Gs2Cdk\Lottery\Model\Enums\PrizeType;

class Prize {
    private string $prizeId;
    private PrizeType $type;
    private int $weight;
    private ?array $acquireActions = null;
    private ?int $drawnLimit = null;
    private ?string $limitFailOverPrizeId = null;
    private ?string $prizeTableName = null;

    public function __construct(
        string $prizeId,
        PrizeType $type,
        int $weight,
        ?PrizeOptions $options = null,
    ) {
        $this->prizeId = $prizeId;
        $this->type = $type;
        $this->weight = $weight;
        $this->acquireActions = $options?->acquireActions ?? null;
        $this->drawnLimit = $options?->drawnLimit ?? null;
        $this->limitFailOverPrizeId = $options?->limitFailOverPrizeId ?? null;
        $this->prizeTableName = $options?->prizeTableName ?? null;
    }

    public static function typeIsAction(
        string $prizeId,
        int $weight,
        array $acquireActions,
        ?PrizeTypeIsActionOptions $options = null,
    ): Prize {
        return (new Prize(
            $prizeId,
            PrizeType::ACTION,
            $weight,
            new PrizeOptions(
                acquireActions: $acquireActions,
                drawnLimit: $options?->drawnLimit,
            ),
        ));
    }

    public static function typeIsPrizeTable(
        string $prizeId,
        int $weight,
        string $prizeTableName,
        ?PrizeTypeIsPrizeTableOptions $options = null,
    ): Prize {
        return (new Prize(
            $prizeId,
            PrizeType::PRIZE_TABLE,
            $weight,
            new PrizeOptions(
                prizeTableName: $prizeTableName,
                drawnLimit: $options?->drawnLimit,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->prizeId != null) {
            $properties["prizeId"] = $this->prizeId;
        }
        if ($this->type != null) {
            $properties["type"] = $this->type?->toString(
            );
        }
        if ($this->acquireActions != null) {
            $properties["acquireActions"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->acquireActions
            );
        }
        if ($this->drawnLimit != null) {
            $properties["drawnLimit"] = $this->drawnLimit;
        }
        if ($this->limitFailOverPrizeId != null) {
            $properties["limitFailOverPrizeId"] = $this->limitFailOverPrizeId;
        }
        if ($this->prizeTableName != null) {
            $properties["prizeTableName"] = $this->prizeTableName;
        }
        if ($this->weight != null) {
            $properties["weight"] = $this->weight;
        }

        return $properties;
    }
}
