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
namespace Gs2Cdk\Grade\Model;
use Gs2Cdk\Grade\Model\Options\AcquireActionRateOptions;
use Gs2Cdk\Grade\Model\Options\AcquireActionRateModeIsDoubleOptions;
use Gs2Cdk\Grade\Model\Options\AcquireActionRateModeIsBigOptions;
use Gs2Cdk\Grade\Model\Enum\AcquireActionRateMode;

class AcquireActionRate {
    private string $name;
    private AcquireActionRateMode $mode;
    private ?array $rates = null;
    private ?array $bigRates = null;

    public function __construct(
        string $name,
        AcquireActionRateMode $mode,
        ?AcquireActionRateOptions $options = null,
    ) {
        $this->name = $name;
        $this->mode = $mode;
        $this->rates = $options?->rates ?? null;
        $this->bigRates = $options?->bigRates ?? null;
    }

    public static function modeIsDouble(
        string $name,
        array $rates,
        ?AcquireActionRateModeIsDoubleOptions $options = null,
    ): AcquireActionRate {
        return (new AcquireActionRate(
            $name,
            AcquireActionRateMode::DOUBLE,
            new AcquireActionRateOptions(
                rates: $rates,
            ),
        ));
    }

    public static function modeIsBig(
        string $name,
        array $bigRates,
        ?AcquireActionRateModeIsBigOptions $options = null,
    ): AcquireActionRate {
        return (new AcquireActionRate(
            $name,
            AcquireActionRateMode::BIG,
            new AcquireActionRateOptions(
                bigRates: $bigRates,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["name"] = $this->name;
        }
        if ($this->mode != null) {
            $properties["mode"] = $this->mode?->toString(
            );
        }
        if ($this->rates != null) {
            $properties["rates"] = $this->rates;
        }
        if ($this->bigRates != null) {
            $properties["bigRates"] = $this->bigRates;
        }

        return $properties;
    }
}
