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
namespace Gs2Cdk\Money2\Model\Options;
use Gs2Cdk\Money2\Model\AppleAppStoreSetting;
use Gs2Cdk\Money2\Model\GooglePlaySetting;
use Gs2Cdk\Money2\Model\FakeSetting;

class PlatformSettingOptions {
    public ?AppleAppStoreSetting $appleAppStore;
    public ?GooglePlaySetting $googlePlay;
    public ?FakeSetting $fake;
    
    public function __construct(
        ?AppleAppStoreSetting $appleAppStore = null,
        ?GooglePlaySetting $googlePlay = null,
        ?FakeSetting $fake = null,
    ) {
        $this->appleAppStore = $appleAppStore;
        $this->googlePlay = $googlePlay;
        $this->fake = $fake;
    }}

