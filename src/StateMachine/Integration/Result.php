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

namespace Gs2Cdk\StateMachine\Integration;

class Result {
    public string $name;
    public string $emitEventName;
    /** @var array<array<IVariable|string>> */
    public array $emitEventArgumentVariableNames;

    /**
     * @param string $name
     * @param string $emitEventName
     * @param array<array<IVariable|string>> $emitEventArgumentVariableNames
     */
    public function __construct(string $name, string $emitEventName, array $emitEventArgumentVariableNames) {
        $this->name = $name;
        $this->emitEventName = $emitEventName;
        $this->emitEventArgumentVariableNames = $emitEventArgumentVariableNames;
    }
}
