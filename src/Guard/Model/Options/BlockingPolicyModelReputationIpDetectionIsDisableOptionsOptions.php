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
namespace Gs2Cdk\Guard\Model\Options;
use Gs2Cdk\Guard\Model\Enums\BlockingPolicyModelDefaultRestriction;
use Gs2Cdk\Guard\Model\Enums\BlockingPolicyModelLocationDetection;
use Gs2Cdk\Guard\Model\Enums\BlockingPolicyModelLocationRestriction;
use Gs2Cdk\Guard\Model\Enums\BlockingPolicyModelAnonymousIpDetection;
use Gs2Cdk\Guard\Model\Enums\BlockingPolicyModelAnonymousIpRestriction;
use Gs2Cdk\Guard\Model\Enums\BlockingPolicyModelHostingProviderIpDetection;
use Gs2Cdk\Guard\Model\Enums\BlockingPolicyModelHostingProviderIpRestriction;
use Gs2Cdk\Guard\Model\Enums\BlockingPolicyModelReputationIpDetection;
use Gs2Cdk\Guard\Model\Enums\BlockingPolicyModelReputationIpRestriction;
use Gs2Cdk\Guard\Model\Enums\BlockingPolicyModelIpAddressesDetection;
use Gs2Cdk\Guard\Model\Enums\BlockingPolicyModelIpAddressRestriction;

class BlockingPolicyModelReputationIpDetectionIsDisableOptions {
    public ?array $ipAddresses;
    
    public function __construct(
        ?array $ipAddresses = null,
    ) {
        $this->ipAddresses = $ipAddresses;
    }}
