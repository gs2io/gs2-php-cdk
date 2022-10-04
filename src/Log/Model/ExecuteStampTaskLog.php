<?php /** @noinspection ALL */
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2Cdk\Log\Model;


use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class ExecuteStampTaskLog {
	public int $timestamp;
	public string $taskId;
	public string $service;
	public string $method;
	public string $userId;
	public string $action;
	public string $args;

    public function __construct(
            int $timestamp,
            string $taskId,
            string $service,
            string $method,
            string $userId,
            string $action,
            string $args,
    ) {
        $this->timestamp = $timestamp;
        $this->taskId = $taskId;
        $this->service = $service;
        $this->method = $method;
        $this->userId = $userId;
        $this->action = $action;
        $this->args = $args;
    }

    public function properties(): array {
        $properties = [];
        if ($this->timestamp != null) {
            $properties["Timestamp"] = $this->timestamp;
        }
        if ($this->taskId != null) {
            $properties["TaskId"] = $this->taskId;
        }
        if ($this->service != null) {
            $properties["Service"] = $this->service;
        }
        if ($this->method != null) {
            $properties["Method"] = $this->method;
        }
        if ($this->userId != null) {
            $properties["UserId"] = $this->userId;
        }
        if ($this->action != null) {
            $properties["Action"] = $this->action;
        }
        if ($this->args != null) {
            $properties["Args"] = $this->args;
        }
        return $properties;
    }
}
