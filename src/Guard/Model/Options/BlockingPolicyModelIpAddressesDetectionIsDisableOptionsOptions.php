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
use Gs2Cdk\Guard\Model\Enum\BlockingPolicyModelDefaultRestriction;
use Gs2Cdk\Guard\Model\Enum\BlockingPolicyModelLocationDetection;
use Gs2Cdk\Guard\Model\Enum\BlockingPolicyModelLocationRestriction;
use Gs2Cdk\Guard\Model\Enum\BlockingPolicyModelAnonymousIpDetection;
use Gs2Cdk\Guard\Model\Enum\BlockingPolicyModelAnonymousIpRestriction;
use Gs2Cdk\Guard\Model\Enum\BlockingPolicyModelHostingProviderIpDetection;
use Gs2Cdk\Guard\Model\Enum\BlockingPolicyModelHostingProviderIpRestriction;
use Gs2Cdk\Guard\Model\Enum\BlockingPolicyModelReputationIpDetection;
use Gs2Cdk\Guard\Model\Enum\BlockingPolicyModelReputationIpRestriction;
use Gs2Cdk\Guard\Model\Enum\BlockingPolicyModelIpAddressesDetection;
use Gs2Cdk\Guard\Model\Enum\BlockingPolicyModelIpAddressRestriction;

class BlockingPolicyModelIpAddressesDetectionIsDisableOptions {
    public ?array $ipAddresses;
    
    public function __construct(
        ?array $ipAddresses = null,
    ) {
        $this->ipAddresses = $ipAddresses;
    }}
