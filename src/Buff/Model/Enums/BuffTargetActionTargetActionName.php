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

namespace Gs2Cdk\Buff\Model\Enums;


enum BuffTargetActionTargetActionName {
    case GS2_EXPERIENCE_ADD_EXPERIENCE_BY_USER_ID;
    case GS2_EXPERIENCE_SUB_EXPERIENCE;
    case GS2_EXPERIENCE_SUB_EXPERIENCE_BY_USER_ID;
    case GS2_INVENTORY_ACQUIRE_BIG_ITEM_BY_USER_ID;
    case GS2_INVENTORY_ACQUIRE_ITEM_SET_BY_USER_ID;
    case GS2_INVENTORY_ACQUIRE_SIMPLE_ITEMS_BY_USER_ID;
    case GS2_INVENTORY_CONSUME_BIG_ITEM;
    case GS2_INVENTORY_CONSUME_BIG_ITEM_BY_USER_ID;
    case GS2_INVENTORY_CONSUME_ITEM_SET;
    case GS2_INVENTORY_CONSUME_ITEM_SET_BY_USER_ID;
    case GS2_INVENTORY_CONSUME_SIMPLE_ITEMS;
    case GS2_INVENTORY_CONSUME_SIMPLE_ITEMS_BY_USER_ID;
    case GS2_LIMIT_COUNT_UP;
    case GS2_LIMIT_COUNT_UP_BY_USER_ID;
    case GS2_MONEY2_DEPOSIT_BY_USER_ID;
    case GS2_MONEY2_WITHDRAW;
    case GS2_MONEY2_WITHDRAW_BY_USER_ID;
    case GS2_MONEY_DEPOSIT_BY_USER_ID;
    case GS2_MONEY_WITHDRAW;
    case GS2_MONEY_WITHDRAW_BY_USER_ID;
    case GS2_STAMINA_CONSUME_STAMINA;
    case GS2_STAMINA_CONSUME_STAMINA_BY_USER_ID;
    case GS2_STAMINA_RECOVER_STAMINA_BY_USER_ID;

    public function toString(): String {
        switch ($this) {
            case self::GS2_EXPERIENCE_ADD_EXPERIENCE_BY_USER_ID:
                return "Gs2Experience:AddExperienceByUserId";
            case self::GS2_EXPERIENCE_SUB_EXPERIENCE:
                return "Gs2Experience:SubExperience";
            case self::GS2_EXPERIENCE_SUB_EXPERIENCE_BY_USER_ID:
                return "Gs2Experience:SubExperienceByUserId";
            case self::GS2_INVENTORY_ACQUIRE_BIG_ITEM_BY_USER_ID:
                return "Gs2Inventory:AcquireBigItemByUserId";
            case self::GS2_INVENTORY_ACQUIRE_ITEM_SET_BY_USER_ID:
                return "Gs2Inventory:AcquireItemSetByUserId";
            case self::GS2_INVENTORY_ACQUIRE_SIMPLE_ITEMS_BY_USER_ID:
                return "Gs2Inventory:AcquireSimpleItemsByUserId";
            case self::GS2_INVENTORY_CONSUME_BIG_ITEM:
                return "Gs2Inventory:ConsumeBigItem";
            case self::GS2_INVENTORY_CONSUME_BIG_ITEM_BY_USER_ID:
                return "Gs2Inventory:ConsumeBigItemByUserId";
            case self::GS2_INVENTORY_CONSUME_ITEM_SET:
                return "Gs2Inventory:ConsumeItemSet";
            case self::GS2_INVENTORY_CONSUME_ITEM_SET_BY_USER_ID:
                return "Gs2Inventory:ConsumeItemSetByUserId";
            case self::GS2_INVENTORY_CONSUME_SIMPLE_ITEMS:
                return "Gs2Inventory:ConsumeSimpleItems";
            case self::GS2_INVENTORY_CONSUME_SIMPLE_ITEMS_BY_USER_ID:
                return "Gs2Inventory:ConsumeSimpleItemsByUserId";
            case self::GS2_LIMIT_COUNT_UP:
                return "Gs2Limit:CountUp";
            case self::GS2_LIMIT_COUNT_UP_BY_USER_ID:
                return "Gs2Limit:CountUpByUserId";
            case self::GS2_MONEY2_DEPOSIT_BY_USER_ID:
                return "Gs2Money2:DepositByUserId";
            case self::GS2_MONEY2_WITHDRAW:
                return "Gs2Money2:Withdraw";
            case self::GS2_MONEY2_WITHDRAW_BY_USER_ID:
                return "Gs2Money2:WithdrawByUserId";
            case self::GS2_MONEY_DEPOSIT_BY_USER_ID:
                return "Gs2Money:DepositByUserId";
            case self::GS2_MONEY_WITHDRAW:
                return "Gs2Money:Withdraw";
            case self::GS2_MONEY_WITHDRAW_BY_USER_ID:
                return "Gs2Money:WithdrawByUserId";
            case self::GS2_STAMINA_CONSUME_STAMINA:
                return "Gs2Stamina:ConsumeStamina";
            case self::GS2_STAMINA_CONSUME_STAMINA_BY_USER_ID:
                return "Gs2Stamina:ConsumeStaminaByUserId";
            case self::GS2_STAMINA_RECOVER_STAMINA_BY_USER_ID:
                return "Gs2Stamina:RecoverStaminaByUserId";
        }
        return "unknown";
    }
}
