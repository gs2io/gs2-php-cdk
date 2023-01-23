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

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;

use Gs2Cdk\Log\Ref\NamespaceRef;
use Gs2Cdk\Log\Model\Enum\NamespaceType;

use Gs2Cdk\Log\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private ?string $description = null;
    private ?NamespaceType $type = null;
    private ?string $gcpCredentialJson = null;
    private ?string $bigQueryDatasetName = null;
    private ?int $logExpireDays = null;
    private ?string $awsRegion = null;
    private ?string $awsAccessKeyId = null;
    private ?string $awsSecretAccessKey = null;
    private ?string $firehoseStreamName = null;

    public function __construct(
        Stack $stack,
        string $name,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Log_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $options?->description ?? null;
        $this->type = $options?->type ?? null;
        $this->gcpCredentialJson = $options?->gcpCredentialJson ?? null;
        $this->bigQueryDatasetName = $options?->bigQueryDatasetName ?? null;
        $this->logExpireDays = $options?->logExpireDays ?? null;
        $this->awsRegion = $options?->awsRegion ?? null;
        $this->awsAccessKeyId = $options?->awsAccessKeyId ?? null;
        $this->awsSecretAccessKey = $options?->awsSecretAccessKey ?? null;
        $this->firehoseStreamName = $options?->firehoseStreamName ?? null;
        $stack->addResource(
            $this,
        );
    }


    public function alternateKeys(
    ) {
        return "name";
    }

    public function resourceType(
    ): string {
        return "GS2::Log::Namespace";
    }

    public function properties(
    ): array {
        $properties = [];

        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->type != null) {
            $properties["Type"] = $this->type;
        }
        if ($this->gcpCredentialJson != null) {
            $properties["GcpCredentialJson"] = $this->gcpCredentialJson;
        }
        if ($this->bigQueryDatasetName != null) {
            $properties["BigQueryDatasetName"] = $this->bigQueryDatasetName;
        }
        if ($this->logExpireDays != null) {
            $properties["LogExpireDays"] = $this->logExpireDays;
        }
        if ($this->awsRegion != null) {
            $properties["AwsRegion"] = $this->awsRegion;
        }
        if ($this->awsAccessKeyId != null) {
            $properties["AwsAccessKeyId"] = $this->awsAccessKeyId;
        }
        if ($this->awsSecretAccessKey != null) {
            $properties["AwsSecretAccessKey"] = $this->awsSecretAccessKey;
        }
        if ($this->firehoseStreamName != null) {
            $properties["FirehoseStreamName"] = $this->firehoseStreamName;
        }

        return $properties;
    }

    public function ref(
    ): NamespaceRef {
        return (new NamespaceRef(
            $this->name,
        ));
    }

    public function getAttrNamespaceId(
    ): GetAttr {
        return (new GetAttr(
            null,
            null,
            "Item.NamespaceId",
        ));
    }
}
