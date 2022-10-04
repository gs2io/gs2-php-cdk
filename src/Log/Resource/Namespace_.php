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

namespace Gs2Cdk\Log\Resource;

use Gs2Cdk\Log\Resource\Enum\NamespaceType;

use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Model\CdkResource;

use Gs2Cdk\Core\Model\TransactionSetting;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\NotificationSetting;
use Gs2Cdk\Core\Model\LogSetting;
use Gs2Cdk\Core\Model\Config;
use Gs2Cdk\Core\Model\AcquireAction;
use Gs2Cdk\Core\Model\ConsumeAction;

use Gs2Cdk\Log\Ref\NamespaceRef;

class Namespace_ extends CdkResource {

    public Stack $stack;
    public string $name;
    public string $type;
    public ?string $gcpCredentialJson;
    public ?string $bigQueryDatasetName;
    public ?int $logExpireDays;
    public ?string $awsRegion;
    public ?string $awsAccessKeyId;
    public ?string $awsSecretAccessKey;
    public ?string $firehoseStreamName;

    public function __construct(
            Stack $stack,
            string $name,
            string $type,
            string $gcpCredentialJson,
            string $bigQueryDatasetName,
            int $logExpireDays,
            string $awsRegion,
            string $awsAccessKeyId,
            string $awsSecretAccessKey,
            string $firehoseStreamName,
            string $description = null,
    ) {
        parent::__construct("Log_Namespace_" . $name);

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->gcpCredentialJson = $gcpCredentialJson;
        $this->bigQueryDatasetName = $bigQueryDatasetName;
        $this->logExpireDays = $logExpireDays;
        $this->awsRegion = $awsRegion;
        $this->awsAccessKeyId = $awsAccessKeyId;
        $this->awsSecretAccessKey = $awsSecretAccessKey;
        $this->firehoseStreamName = $firehoseStreamName;

        $stack->addResource($this);
    }

    public function resourceType(): String {
        return "GS2::Log::Namespace";
    }

    public function properties(): array {
        $properties = [];
        if ($this->name != null) {
            $properties["Name"] = $this->name;
        }
        if ($this->description != null) {
            $properties["Description"] = $this->description;
        }
        if ($this->type != null) {
            $properties["Type"] = $this->type->toString();
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
        return new NamespaceRef(
            namespaceName: $this->name,
        );
    }

    public function getAttrNamespaceId(): GetAttr {
        return new GetAttr(
            key: "Item.NamespaceId"
        );
    }
}
