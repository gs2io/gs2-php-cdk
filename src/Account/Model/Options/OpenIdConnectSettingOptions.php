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

class OpenIdConnectSettingOptions {
    public ?string $clientSecret;
    public ?string $appleTeamId;
    public ?string $appleKeyId;
    public ?string $applePrivateKeyPem;
    public ?string $doneEndpointUrl;
    public ?array $additionalScopeValues;
    public ?array $additionalReturnValues;
    
    public function __construct(
        ?string $clientSecret = null,
        ?string $appleTeamId = null,
        ?string $appleKeyId = null,
        ?string $applePrivateKeyPem = null,
        ?string $doneEndpointUrl = null,
        ?array $additionalScopeValues = null,
        ?array $additionalReturnValues = null,
    ) {
        $this->clientSecret = $clientSecret;
        $this->appleTeamId = $appleTeamId;
        $this->appleKeyId = $appleKeyId;
        $this->applePrivateKeyPem = $applePrivateKeyPem;
        $this->doneEndpointUrl = $doneEndpointUrl;
        $this->additionalScopeValues = $additionalScopeValues;
        $this->additionalReturnValues = $additionalReturnValues;
    }}

