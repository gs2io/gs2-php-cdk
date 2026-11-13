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
namespace Gs2Cdk\Account\Model\Options;
use Gs2Cdk\Account\Model\ScopeValue;
use Gs2Cdk\Account\Model\OpenIdConnectSetting;
use Gs2Cdk\Account\Model\IssuedCodeSetting;
use Gs2Cdk\Account\Model\Enums\TakeOverTypeModelTakeOverMethod;

class TakeOverTypeModelOptions {
    public ?string $metadata;
    public ?OpenIdConnectSetting $openIdConnectSetting;
    public ?IssuedCodeSetting $issuedCodeSetting;
    
    public function __construct(
        ?string $metadata = null,
        ?OpenIdConnectSetting $openIdConnectSetting = null,
        ?IssuedCodeSetting $issuedCodeSetting = null,
    ) {
        $this->metadata = $metadata;
        $this->openIdConnectSetting = $openIdConnectSetting;
        $this->issuedCodeSetting = $issuedCodeSetting;
    }}

