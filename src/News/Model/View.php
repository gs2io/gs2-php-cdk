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
namespace Gs2Cdk\News\Model;
use Gs2Cdk\News\Model\Content;
use Gs2Cdk\News\Model\Options\ViewOptions;

class View {
    private ?array $contents = null;
    private ?array $removeContents = null;

    public function __construct(
        ?ViewOptions $options = null,
    ) {
        $this->contents = $options?->contents ?? null;
        $this->removeContents = $options?->removeContents ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->contents != null) {
            $properties["contents"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->contents
            );
        }
        if ($this->removeContents != null) {
            $properties["removeContents"] = array_map(
                function ($v) {
                    return $v->properties(
                    );
                },
                $this->removeContents
            );
        }

        return $properties;
    }
}
