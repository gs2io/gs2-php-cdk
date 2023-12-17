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
namespace Gs2Cdk\StateMachine\Model;
use Gs2Cdk\StateMachine\Model\ChangeStateEvent;
use Gs2Cdk\StateMachine\Model\EmitEvent;
use Gs2Cdk\StateMachine\Model\Options\EventOptions;
use Gs2Cdk\StateMachine\Model\Options\EventEventTypeIsChangeStateOptions;
use Gs2Cdk\StateMachine\Model\Options\EventEventTypeIsEmitOptions;
use Gs2Cdk\StateMachine\Model\Enum\EventEventType;

class Event {
    private EventEventType $eventType;
    private ?ChangeStateEvent $changeStateEvent = null;
    private ?EmitEvent $emitEvent = null;

    public function __construct(
        EventEventType $eventType,
        ?EventOptions $options = null,
    ) {
        $this->eventType = $eventType;
        $this->changeStateEvent = $options?->changeStateEvent ?? null;
        $this->emitEvent = $options?->emitEvent ?? null;
    }

    public static function eventTypeIsChangeState(
        ChangeStateEvent $changeStateEvent,
        ?EventEventTypeIsChangeStateOptions $options = null,
    ): Event {
        return (new Event(
            EventEventType::CHANGE_STATE,
            new EventOptions(
                changeStateEvent: $changeStateEvent,
            ),
        ));
    }

    public static function eventTypeIsEmit(
        EmitEvent $emitEvent,
        ?EventEventTypeIsEmitOptions $options = null,
    ): Event {
        return (new Event(
            EventEventType::EMIT,
            new EventOptions(
                emitEvent: $emitEvent,
            ),
        ));
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->eventType != null) {
            $properties["eventType"] = $this->eventType?->toString(
            );
        }
        if ($this->changeStateEvent != null) {
            $properties["changeStateEvent"] = $this->changeStateEvent?->properties(
            );
        }
        if ($this->emitEvent != null) {
            $properties["emitEvent"] = $this->emitEvent?->properties(
            );
        }

        return $properties;
    }
}
