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
use Gs2Cdk\News\Model\Options\ContentOptions;

class Content {
    private string $section;
    private string $content;
    private string $frontMatter;

    public function __construct(
        string $section,
        string $content,
        string $frontMatter,
        ?ContentOptions $options = null,
    ) {
        $this->section = $section;
        $this->content = $content;
        $this->frontMatter = $frontMatter;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->section != null) {
            $properties["section"] = $this->section;
        }
        if ($this->content != null) {
            $properties["content"] = $this->content;
        }
        if ($this->frontMatter != null) {
            $properties["frontMatter"] = $this->frontMatter;
        }

        return $properties;
    }
}