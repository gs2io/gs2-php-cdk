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
namespace Gs2Cdk\Account\Model;
use Gs2Cdk\Account\Model\ScopeValue;
use Gs2Cdk\Account\Model\OpenIdConnectSetting;
use Gs2Cdk\Account\Model\IssuedCodeSetting;
use Gs2Cdk\Account\Model\Options\TakeOverTypeModelOptions;
use Gs2Cdk\Account\Model\Options\TakeOverTypeModelTakeOverMethodIsOpenIdConnectOptions;
use Gs2Cdk\Account\Model\Options\TakeOverTypeModelTakeOverMethodIsIssuedCodeOptions;
use Gs2Cdk\Account\Model\Enums\TakeOverTypeModelTakeOverMethod;

class TakeOverTypeModel {
    private int $type;
    private TakeOverTypeModelTakeOverMethod $takeOverMethod;
    private ?string $metadata = null;
    private ?OpenIdConnectSetting $openIdConnectSetting = null;
    private ?IssuedCodeSetting $issuedCodeSetting = null;

    public function __construct(
        int $type,
        TakeOverTypeModelTakeOverMethod $takeOverMethod,
        ?TakeOverTypeModelOptions $options = null,
    ) {
        $this->type = $type;
        $this->takeOverMethod = $takeOverMethod;
        $this->metadata = $options?->metadata ?? null;
        $this->openIdConnectSetting = $options?->openIdConnectSetting ?? null;
        $this->issuedCodeSetting = $options?->issuedCodeSetting ?? null;
    }

    public static function takeOverMethodIsOpenIdConnect(
        int $type,
        OpenIdConnectSetting $openIdConnectSetting,
        ?TakeOverTypeModelTakeOverMethodIsOpenIdConnectOptions $options = null,
    ): TakeOverTypeModel {
        return (new TakeOverTypeModel(
            $type,
            TakeOverTypeModelTakeOverMethod::OPEN_ID_CONNECT,
            new TakeOverTypeModelOptions(
                openIdConnectSetting: $openIdConnectSetting,
                metadata: $options?->metadata,
            ),
        ));
    }

    public static function takeOverMethodIsIssuedCode(
        int $type,
        IssuedCodeSetting $issuedCodeSetting,
        ?TakeOverTypeModelTakeOverMethodIsIssuedCodeOptions $options = null,
    ): TakeOverTypeModel {
        return (new TakeOverTypeModel(
            $type,
            TakeOverTypeModelTakeOverMethod::ISSUED_CODE,
            new TakeOverTypeModelOptions(
                issuedCodeSetting: $issuedCodeSetting,
                metadata: $options?->metadata,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->type != null) {
            $properties["type"] = $this->type;
        }
        if ($this->metadata != null) {
            $properties["metadata"] = $this->metadata;
        }
        if ($this->takeOverMethod != null) {
            $properties["takeOverMethod"] = $this->takeOverMethod?->toString(
            );
        }
        if ($this->openIdConnectSetting != null) {
            $properties["openIdConnectSetting"] = $this->openIdConnectSetting?->properties(
            );
        }
        if ($this->issuedCodeSetting != null) {
            $properties["issuedCodeSetting"] = $this->issuedCodeSetting?->properties(
            );
        }

        return $properties;
    }
}
