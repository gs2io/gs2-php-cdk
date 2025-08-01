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
namespace Gs2Cdk\Chat\Model;
use Gs2Cdk\Chat\Model\Options\CategoryModelOptions;
use Gs2Cdk\Chat\Model\Enums\CategoryModelRejectAccessTokenPost;

class CategoryModel {
    private int $category;
    private ?CategoryModelRejectAccessTokenPost $rejectAccessTokenPost = null;

    public function __construct(
        int $category,
        ?CategoryModelOptions $options = null,
    ) {
        $this->category = $category;
        $this->rejectAccessTokenPost = $options?->rejectAccessTokenPost ?? null;
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->category != null) {
            $properties["category"] = $this->category;
        }
        if ($this->rejectAccessTokenPost != null) {
            $properties["rejectAccessTokenPost"] = $this->rejectAccessTokenPost?->toString(
            );
        }

        return $properties;
    }
}
