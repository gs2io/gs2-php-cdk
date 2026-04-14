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
namespace Gs2Cdk\Log\Model;
use Gs2Cdk\Log\Model\Label;
use Gs2Cdk\Log\Model\Options\LogEntryOptions;
use Gs2Cdk\Log\Model\Enums\LogEntryStatus;

class LogEntry {
    private int $timestamp;
    private LogEntryStatus $status;
    private int $duration;
    private string $line;
    private ?array $labels = null;

    public function __construct(
        int $timestamp,
        LogEntryStatus $status,
        int $duration,
        string $line,
        ?LogEntryOptions $options = null,
    ) {
        $this->timestamp = $timestamp;
        $this->status = $status;
        $this->duration = $duration;
        $this->line = $line;
        $this->labels = $options?->labels ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->timestamp != null) {
            $properties["timestamp"] = $this->timestamp;
        }
        if ($this->status != null) {
            $properties["status"] = $this->status?->toString(
            );
        }
        if ($this->duration != null) {
            $properties["duration"] = $this->duration;
        }
        if ($this->line != null) {
            $properties["line"] = $this->line;
        }
        if ($this->labels != null) {
            $properties["labels"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->labels
            );
        }

        return $properties;
    }
}
