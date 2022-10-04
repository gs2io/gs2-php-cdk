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

class IssueStampSheetLog {
	public int $timestamp;
	public string $transactionId;
	public string $service;
	public string $method;
	public string $userId;
	public string $action;
	public string $args;
	public ?array $tasks;

    public function __construct(
            int $timestamp,
            string $transactionId,
            string $service,
            string $method,
            string $userId,
            string $action,
            string $args,
            array $tasks = null,
    ) {
        $this->timestamp = $timestamp;
        $this->transactionId = $transactionId;
        $this->service = $service;
        $this->method = $method;
        $this->userId = $userId;
        $this->action = $action;
        $this->args = $args;
        $this->tasks = $tasks;
    }

    public function properties(): array {
        $properties = [];
        if ($this->timestamp != null) {
            $properties["Timestamp"] = $this->timestamp;
        }
        if ($this->transactionId != null) {
            $properties["TransactionId"] = $this->transactionId;
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
        if ($this->tasks != null) {
            $properties["Tasks"] = $this->tasks;
        }
        return $properties;
    }
}
