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
namespace Gs2Cdk\Guard\Model;
use Gs2Cdk\Guard\Model\Options\BlockingPolicyModelOptions;
use Gs2Cdk\Guard\Model\Options\BlockingPolicyModelLocationDetectionIsEnableOptions;
use Gs2Cdk\Guard\Model\Options\BlockingPolicyModelLocationDetectionIsDisableOptions;
use Gs2Cdk\Guard\Model\Options\BlockingPolicyModelAnonymousIpDetectionIsEnableOptions;
use Gs2Cdk\Guard\Model\Options\BlockingPolicyModelAnonymousIpDetectionIsDisableOptions;
use Gs2Cdk\Guard\Model\Options\BlockingPolicyModelHostingProviderIpDetectionIsEnableOptions;
use Gs2Cdk\Guard\Model\Options\BlockingPolicyModelHostingProviderIpDetectionIsDisableOptions;
use Gs2Cdk\Guard\Model\Options\BlockingPolicyModelReputationIpDetectionIsEnableOptions;
use Gs2Cdk\Guard\Model\Options\BlockingPolicyModelReputationIpDetectionIsDisableOptions;
use Gs2Cdk\Guard\Model\Options\BlockingPolicyModelIpAddressesDetectionIsEnableOptions;
use Gs2Cdk\Guard\Model\Options\BlockingPolicyModelIpAddressesDetectionIsDisableOptions;
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

class BlockingPolicyModel {
    private array $passServices;
    private BlockingPolicyModelDefaultRestriction $defaultRestriction;
    private BlockingPolicyModelLocationDetection $locationDetection;
    private BlockingPolicyModelAnonymousIpDetection $anonymousIpDetection;
    private BlockingPolicyModelHostingProviderIpDetection $hostingProviderIpDetection;
    private BlockingPolicyModelReputationIpDetection $reputationIpDetection;
    private BlockingPolicyModelIpAddressesDetection $ipAddressesDetection;
    private ?array $locations = null;
    private ?BlockingPolicyModelLocationRestriction $locationRestriction = null;
    private ?BlockingPolicyModelAnonymousIpRestriction $anonymousIpRestriction = null;
    private ?BlockingPolicyModelHostingProviderIpRestriction $hostingProviderIpRestriction = null;
    private ?BlockingPolicyModelReputationIpRestriction $reputationIpRestriction = null;
    private ?array $ipAddresses = null;
    private ?BlockingPolicyModelIpAddressRestriction $ipAddressRestriction = null;

    public function __construct(
        array $passServices,
        BlockingPolicyModelDefaultRestriction $defaultRestriction,
        BlockingPolicyModelLocationDetection $locationDetection,
        BlockingPolicyModelAnonymousIpDetection $anonymousIpDetection,
        BlockingPolicyModelHostingProviderIpDetection $hostingProviderIpDetection,
        BlockingPolicyModelReputationIpDetection $reputationIpDetection,
        BlockingPolicyModelIpAddressesDetection $ipAddressesDetection,
        ?BlockingPolicyModelOptions $options = null,
    ) {
        $this->passServices = $passServices;
        $this->defaultRestriction = $defaultRestriction;
        $this->locationDetection = $locationDetection;
        $this->anonymousIpDetection = $anonymousIpDetection;
        $this->hostingProviderIpDetection = $hostingProviderIpDetection;
        $this->reputationIpDetection = $reputationIpDetection;
        $this->ipAddressesDetection = $ipAddressesDetection;
        $this->locations = $options?->locations ?? null;
        $this->locationRestriction = $options?->locationRestriction ?? null;
        $this->anonymousIpRestriction = $options?->anonymousIpRestriction ?? null;
        $this->hostingProviderIpRestriction = $options?->hostingProviderIpRestriction ?? null;
        $this->reputationIpRestriction = $options?->reputationIpRestriction ?? null;
        $this->ipAddresses = $options?->ipAddresses ?? null;
        $this->ipAddressRestriction = $options?->ipAddressRestriction ?? null;
    }

    public static function locationDetectionIsEnable(
        array $passServices,
        BlockingPolicyModelDefaultRestriction $defaultRestriction,
        BlockingPolicyModelAnonymousIpDetection $anonymousIpDetection,
        BlockingPolicyModelHostingProviderIpDetection $hostingProviderIpDetection,
        BlockingPolicyModelReputationIpDetection $reputationIpDetection,
        BlockingPolicyModelIpAddressesDetection $ipAddressesDetection,
        array $locations,
        BlockingPolicyModelLocationRestriction $locationRestriction,
        ?BlockingPolicyModelLocationDetectionIsEnableOptions $options = null,
    ): BlockingPolicyModel {
        return (new BlockingPolicyModel(
            $passServices,
            $defaultRestriction,
            BlockingPolicyModelLocationDetection::ENABLE,
            $anonymousIpDetection,
            $hostingProviderIpDetection,
            $reputationIpDetection,
            $ipAddressesDetection,
            new BlockingPolicyModelOptions(
                locations: $locations,
                locationRestriction: $locationRestriction,
                ipAddresses: $options?->ipAddresses,
            ),
        ));
    }

    public static function locationDetectionIsDisable(
        array $passServices,
        BlockingPolicyModelDefaultRestriction $defaultRestriction,
        BlockingPolicyModelAnonymousIpDetection $anonymousIpDetection,
        BlockingPolicyModelHostingProviderIpDetection $hostingProviderIpDetection,
        BlockingPolicyModelReputationIpDetection $reputationIpDetection,
        BlockingPolicyModelIpAddressesDetection $ipAddressesDetection,
        ?BlockingPolicyModelLocationDetectionIsDisableOptions $options = null,
    ): BlockingPolicyModel {
        return (new BlockingPolicyModel(
            $passServices,
            $defaultRestriction,
            BlockingPolicyModelLocationDetection::DISABLE,
            $anonymousIpDetection,
            $hostingProviderIpDetection,
            $reputationIpDetection,
            $ipAddressesDetection,
            new BlockingPolicyModelOptions(
                ipAddresses: $options?->ipAddresses,
            ),
        ));
    }

    public static function anonymousIpDetectionIsEnable(
        array $passServices,
        BlockingPolicyModelDefaultRestriction $defaultRestriction,
        BlockingPolicyModelLocationDetection $locationDetection,
        BlockingPolicyModelHostingProviderIpDetection $hostingProviderIpDetection,
        BlockingPolicyModelReputationIpDetection $reputationIpDetection,
        BlockingPolicyModelIpAddressesDetection $ipAddressesDetection,
        BlockingPolicyModelAnonymousIpRestriction $anonymousIpRestriction,
        ?BlockingPolicyModelAnonymousIpDetectionIsEnableOptions $options = null,
    ): BlockingPolicyModel {
        return (new BlockingPolicyModel(
            $passServices,
            $defaultRestriction,
            $locationDetection,
            BlockingPolicyModelAnonymousIpDetection::ENABLE,
            $hostingProviderIpDetection,
            $reputationIpDetection,
            $ipAddressesDetection,
            new BlockingPolicyModelOptions(
                anonymousIpRestriction: $anonymousIpRestriction,
                ipAddresses: $options?->ipAddresses,
            ),
        ));
    }

    public static function anonymousIpDetectionIsDisable(
        array $passServices,
        BlockingPolicyModelDefaultRestriction $defaultRestriction,
        BlockingPolicyModelLocationDetection $locationDetection,
        BlockingPolicyModelHostingProviderIpDetection $hostingProviderIpDetection,
        BlockingPolicyModelReputationIpDetection $reputationIpDetection,
        BlockingPolicyModelIpAddressesDetection $ipAddressesDetection,
        ?BlockingPolicyModelAnonymousIpDetectionIsDisableOptions $options = null,
    ): BlockingPolicyModel {
        return (new BlockingPolicyModel(
            $passServices,
            $defaultRestriction,
            $locationDetection,
            BlockingPolicyModelAnonymousIpDetection::DISABLE,
            $hostingProviderIpDetection,
            $reputationIpDetection,
            $ipAddressesDetection,
            new BlockingPolicyModelOptions(
                ipAddresses: $options?->ipAddresses,
            ),
        ));
    }

    public static function hostingProviderIpDetectionIsEnable(
        array $passServices,
        BlockingPolicyModelDefaultRestriction $defaultRestriction,
        BlockingPolicyModelLocationDetection $locationDetection,
        BlockingPolicyModelAnonymousIpDetection $anonymousIpDetection,
        BlockingPolicyModelReputationIpDetection $reputationIpDetection,
        BlockingPolicyModelIpAddressesDetection $ipAddressesDetection,
        BlockingPolicyModelHostingProviderIpRestriction $hostingProviderIpRestriction,
        ?BlockingPolicyModelHostingProviderIpDetectionIsEnableOptions $options = null,
    ): BlockingPolicyModel {
        return (new BlockingPolicyModel(
            $passServices,
            $defaultRestriction,
            $locationDetection,
            $anonymousIpDetection,
            BlockingPolicyModelHostingProviderIpDetection::ENABLE,
            $reputationIpDetection,
            $ipAddressesDetection,
            new BlockingPolicyModelOptions(
                hostingProviderIpRestriction: $hostingProviderIpRestriction,
                ipAddresses: $options?->ipAddresses,
            ),
        ));
    }

    public static function hostingProviderIpDetectionIsDisable(
        array $passServices,
        BlockingPolicyModelDefaultRestriction $defaultRestriction,
        BlockingPolicyModelLocationDetection $locationDetection,
        BlockingPolicyModelAnonymousIpDetection $anonymousIpDetection,
        BlockingPolicyModelReputationIpDetection $reputationIpDetection,
        BlockingPolicyModelIpAddressesDetection $ipAddressesDetection,
        ?BlockingPolicyModelHostingProviderIpDetectionIsDisableOptions $options = null,
    ): BlockingPolicyModel {
        return (new BlockingPolicyModel(
            $passServices,
            $defaultRestriction,
            $locationDetection,
            $anonymousIpDetection,
            BlockingPolicyModelHostingProviderIpDetection::DISABLE,
            $reputationIpDetection,
            $ipAddressesDetection,
            new BlockingPolicyModelOptions(
                ipAddresses: $options?->ipAddresses,
            ),
        ));
    }

    public static function reputationIpDetectionIsEnable(
        array $passServices,
        BlockingPolicyModelDefaultRestriction $defaultRestriction,
        BlockingPolicyModelLocationDetection $locationDetection,
        BlockingPolicyModelAnonymousIpDetection $anonymousIpDetection,
        BlockingPolicyModelHostingProviderIpDetection $hostingProviderIpDetection,
        BlockingPolicyModelIpAddressesDetection $ipAddressesDetection,
        BlockingPolicyModelReputationIpRestriction $reputationIpRestriction,
        ?BlockingPolicyModelReputationIpDetectionIsEnableOptions $options = null,
    ): BlockingPolicyModel {
        return (new BlockingPolicyModel(
            $passServices,
            $defaultRestriction,
            $locationDetection,
            $anonymousIpDetection,
            $hostingProviderIpDetection,
            BlockingPolicyModelReputationIpDetection::ENABLE,
            $ipAddressesDetection,
            new BlockingPolicyModelOptions(
                reputationIpRestriction: $reputationIpRestriction,
                ipAddresses: $options?->ipAddresses,
            ),
        ));
    }

    public static function reputationIpDetectionIsDisable(
        array $passServices,
        BlockingPolicyModelDefaultRestriction $defaultRestriction,
        BlockingPolicyModelLocationDetection $locationDetection,
        BlockingPolicyModelAnonymousIpDetection $anonymousIpDetection,
        BlockingPolicyModelHostingProviderIpDetection $hostingProviderIpDetection,
        BlockingPolicyModelIpAddressesDetection $ipAddressesDetection,
        ?BlockingPolicyModelReputationIpDetectionIsDisableOptions $options = null,
    ): BlockingPolicyModel {
        return (new BlockingPolicyModel(
            $passServices,
            $defaultRestriction,
            $locationDetection,
            $anonymousIpDetection,
            $hostingProviderIpDetection,
            BlockingPolicyModelReputationIpDetection::DISABLE,
            $ipAddressesDetection,
            new BlockingPolicyModelOptions(
                ipAddresses: $options?->ipAddresses,
            ),
        ));
    }

    public static function ipAddressesDetectionIsEnable(
        array $passServices,
        BlockingPolicyModelDefaultRestriction $defaultRestriction,
        BlockingPolicyModelLocationDetection $locationDetection,
        BlockingPolicyModelAnonymousIpDetection $anonymousIpDetection,
        BlockingPolicyModelHostingProviderIpDetection $hostingProviderIpDetection,
        BlockingPolicyModelReputationIpDetection $reputationIpDetection,
        BlockingPolicyModelIpAddressRestriction $ipAddressRestriction,
        ?BlockingPolicyModelIpAddressesDetectionIsEnableOptions $options = null,
    ): BlockingPolicyModel {
        return (new BlockingPolicyModel(
            $passServices,
            $defaultRestriction,
            $locationDetection,
            $anonymousIpDetection,
            $hostingProviderIpDetection,
            $reputationIpDetection,
            BlockingPolicyModelIpAddressesDetection::ENABLE,
            new BlockingPolicyModelOptions(
                ipAddressRestriction: $ipAddressRestriction,
                ipAddresses: $options?->ipAddresses,
            ),
        ));
    }

    public static function ipAddressesDetectionIsDisable(
        array $passServices,
        BlockingPolicyModelDefaultRestriction $defaultRestriction,
        BlockingPolicyModelLocationDetection $locationDetection,
        BlockingPolicyModelAnonymousIpDetection $anonymousIpDetection,
        BlockingPolicyModelHostingProviderIpDetection $hostingProviderIpDetection,
        BlockingPolicyModelReputationIpDetection $reputationIpDetection,
        ?BlockingPolicyModelIpAddressesDetectionIsDisableOptions $options = null,
    ): BlockingPolicyModel {
        return (new BlockingPolicyModel(
            $passServices,
            $defaultRestriction,
            $locationDetection,
            $anonymousIpDetection,
            $hostingProviderIpDetection,
            $reputationIpDetection,
            BlockingPolicyModelIpAddressesDetection::DISABLE,
            new BlockingPolicyModelOptions(
                ipAddresses: $options?->ipAddresses,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->passServices != null) {
            $properties["passServices"] = $this->passServices;
        }
        if ($this->defaultRestriction != null) {
            $properties["defaultRestriction"] = $this->defaultRestriction?->toString(
            );
        }
        if ($this->locationDetection != null) {
            $properties["locationDetection"] = $this->locationDetection?->toString(
            );
        }
        if ($this->locations != null) {
            $properties["locations"] = $this->locations;
        }
        if ($this->locationRestriction != null) {
            $properties["locationRestriction"] = $this->locationRestriction?->toString(
            );
        }
        if ($this->anonymousIpDetection != null) {
            $properties["anonymousIpDetection"] = $this->anonymousIpDetection?->toString(
            );
        }
        if ($this->anonymousIpRestriction != null) {
            $properties["anonymousIpRestriction"] = $this->anonymousIpRestriction?->toString(
            );
        }
        if ($this->hostingProviderIpDetection != null) {
            $properties["hostingProviderIpDetection"] = $this->hostingProviderIpDetection?->toString(
            );
        }
        if ($this->hostingProviderIpRestriction != null) {
            $properties["hostingProviderIpRestriction"] = $this->hostingProviderIpRestriction?->toString(
            );
        }
        if ($this->reputationIpDetection != null) {
            $properties["reputationIpDetection"] = $this->reputationIpDetection?->toString(
            );
        }
        if ($this->reputationIpRestriction != null) {
            $properties["reputationIpRestriction"] = $this->reputationIpRestriction?->toString(
            );
        }
        if ($this->ipAddressesDetection != null) {
            $properties["ipAddressesDetection"] = $this->ipAddressesDetection?->toString(
            );
        }
        if ($this->ipAddresses != null) {
            $properties["ipAddresses"] = $this->ipAddresses;
        }
        if ($this->ipAddressRestriction != null) {
            $properties["ipAddressRestriction"] = $this->ipAddressRestriction?->toString(
            );
        }

        return $properties;
    }
}
