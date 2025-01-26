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
use Gs2Cdk\Account\Model\Options\OpenIdConnectSettingOptions;

class OpenIdConnectSetting {
    private string $configurationPath;
    private string $clientId;
    private ?string $clientSecret = null;
    private ?string $appleTeamId = null;
    private ?string $appleKeyId = null;
    private ?string $applePrivateKeyPem = null;
    private ?string $doneEndpointUrl = null;
    private ?array $additionalScopeValues = null;
    private ?array $additionalReturnValues = null;

    public function __construct(
        string $configurationPath,
        string $clientId,
        ?OpenIdConnectSettingOptions $options = null,
    ) {
        $this->configurationPath = $configurationPath;
        $this->clientId = $clientId;
        $this->clientSecret = $options?->clientSecret ?? null;
        $this->appleTeamId = $options?->appleTeamId ?? null;
        $this->appleKeyId = $options?->appleKeyId ?? null;
        $this->applePrivateKeyPem = $options?->applePrivateKeyPem ?? null;
        $this->doneEndpointUrl = $options?->doneEndpointUrl ?? null;
        $this->additionalScopeValues = $options?->additionalScopeValues ?? null;
        $this->additionalReturnValues = $options?->additionalReturnValues ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->configurationPath != null) {
            $properties["configurationPath"] = $this->configurationPath;
        }
        if ($this->clientId != null) {
            $properties["clientId"] = $this->clientId;
        }
        if ($this->clientSecret != null) {
            $properties["clientSecret"] = $this->clientSecret;
        }
        if ($this->appleTeamId != null) {
            $properties["appleTeamId"] = $this->appleTeamId;
        }
        if ($this->appleKeyId != null) {
            $properties["appleKeyId"] = $this->appleKeyId;
        }
        if ($this->applePrivateKeyPem != null) {
            $properties["applePrivateKeyPem"] = $this->applePrivateKeyPem;
        }
        if ($this->doneEndpointUrl != null) {
            $properties["doneEndpointUrl"] = $this->doneEndpointUrl;
        }
        if ($this->additionalScopeValues != null) {
            $properties["additionalScopeValues"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->additionalScopeValues
            );
        }
        if ($this->additionalReturnValues != null) {
            $properties["additionalReturnValues"] = $this->additionalReturnValues;
        }

        return $properties;
    }
}
