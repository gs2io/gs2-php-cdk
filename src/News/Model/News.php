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

namespace Gs2Cdk\News\Model;


use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

class News {
	public string $section;
	public string $content;
	public string $title;
	public ?string $scheduleEventId;
	public int $timestamp;
	public string $frontMatter;

    public function __construct(
            string $section,
            string $content,
            string $title,
            int $timestamp,
            string $frontMatter,
            string $scheduleEventId = null,
    ) {
        $this->section = $section;
        $this->content = $content;
        $this->title = $title;
        $this->scheduleEventId = $scheduleEventId;
        $this->timestamp = $timestamp;
        $this->frontMatter = $frontMatter;
    }

    public function properties(): array {
        $properties = [];
        if ($this->section != null) {
            $properties["Section"] = $this->section;
        }
        if ($this->content != null) {
            $properties["Content"] = $this->content;
        }
        if ($this->title != null) {
            $properties["Title"] = $this->title;
        }
        if ($this->scheduleEventId != null) {
            $properties["ScheduleEventId"] = $this->scheduleEventId;
        }
        if ($this->timestamp != null) {
            $properties["Timestamp"] = $this->timestamp;
        }
        if ($this->frontMatter != null) {
            $properties["FrontMatter"] = $this->frontMatter;
        }
        return $properties;
    }
}
