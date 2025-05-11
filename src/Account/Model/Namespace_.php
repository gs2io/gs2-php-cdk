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
namespace Gs2Cdk\Account\Model;

use Gs2Cdk\Core\Model\CdkResource;
use Gs2Cdk\Core\Model\Stack;
use Gs2Cdk\Core\Func\GetAttr;
use Gs2Cdk\Core\Model\ScriptSetting;
use Gs2Cdk\Core\Model\LogSetting;

use Gs2Cdk\Account\Ref\NamespaceRef;
use Gs2Cdk\Account\Model\CurrentMasterData;
use Gs2Cdk\Account\Model\TakeOverTypeModel;

use Gs2Cdk\Account\Model\Options\NamespaceOptions;

class Namespace_ extends CdkResource {
    private Stack $stack;
    private string $name;
    private ?string $description = null;
    private ?bool $changePasswordIfTakeOver = null;
    private ?bool $differentUserIdForLoginAndDataRetention = null;
    private ?ScriptSetting $createAccountScript = null;
    private ?ScriptSetting $authenticationScript = null;
    private ?ScriptSetting $createTakeOverScript = null;
    private ?ScriptSetting $doTakeOverScript = null;
    private ?ScriptSetting $banScript = null;
    private ?ScriptSetting $unBanScript = null;
    private ?LogSetting $logSetting = null;

    public function __construct(
        Stack $stack,
        string $name,
        ?NamespaceOptions $options = null,
    ) {
        parent::__construct(
            "Account_Namespace_" . $name
        );

        $this->stack = $stack;
        $this->name = $name;
        $this->description = $options?->description ?? null;
        $this->changePasswordIfTakeOver = $options?->changePasswordIfTakeOver ?? null;
        $this->differentUserIdForLoginAndDataRetention = $options?->differentUserIdForLoginAndDataRetention ?? null;
        $this->createAccountScript = $options?->createAccountScript ?? null;
        $this->authenticationScript = $options?->authenticationScript ?? null;
        $this->createTakeOverScript = $options?->createTakeOverScript ?? null;
        $this->doTakeOverScript = $options?->doTakeOverScript ?? null;
        $this->banScript = $options?->banScript ?? null;
        $this->unBanScript = $options?->unBanScript ?? null;
        $this->logSetting = $options?->logSetting ?? null;
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
        return "GS2::Account::Namespace";
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
        if ($this->changePasswordIfTakeOver != null) {
            $properties["ChangePasswordIfTakeOver"] = $this->changePasswordIfTakeOver;
        }
        if ($this->differentUserIdForLoginAndDataRetention != null) {
            $properties["DifferentUserIdForLoginAndDataRetention"] = $this->differentUserIdForLoginAndDataRetention;
        }
        if ($this->createAccountScript != null) {
            $properties["CreateAccountScript"] = $this->createAccountScript?->properties(
            );
        }
        if ($this->authenticationScript != null) {
            $properties["AuthenticationScript"] = $this->authenticationScript?->properties(
            );
        }
        if ($this->createTakeOverScript != null) {
            $properties["CreateTakeOverScript"] = $this->createTakeOverScript?->properties(
            );
        }
        if ($this->doTakeOverScript != null) {
            $properties["DoTakeOverScript"] = $this->doTakeOverScript?->properties(
            );
        }
        if ($this->banScript != null) {
            $properties["BanScript"] = $this->banScript?->properties(
            );
        }
        if ($this->unBanScript != null) {
            $properties["UnBanScript"] = $this->unBanScript?->properties(
            );
        }
        if ($this->logSetting != null) {
            $properties["LogSetting"] = $this->logSetting?->properties(
            );
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
            $this,
            "Item.NamespaceId",
            null,
        ));
    }

    public function masterData(
        array $takeOverTypeModels,
    ): Namespace_ {
        (new CurrentMasterData(
            $this->stack,
            $this->name,
            $takeOverTypeModels,
        ))->addDependsOn(
            $this,
        );
        return $this;
    }
}
