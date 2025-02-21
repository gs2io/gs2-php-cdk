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


enum BuffTargetModelTargetModelName {
    case GS2_EXCHANGE_INCREMENTAL_RATE_MODEL;
    case GS2_EXCHANGE_RATE_MODEL;
    case GS2_EXPERIENCE_EXPERIENCE_MODEL;
    case GS2_EXPERIENCE_STATUS;
    case GS2_FORMATION_MOLD;
    case GS2_IDLE_CATEGORY_MODEL;
    case GS2_IDLE_STATUS;
    case GS2_INVENTORY_BIG_INVENTORY_MODEL;
    case GS2_INVENTORY_BIG_ITEM_MODEL;
    case GS2_INVENTORY_INVENTORY;
    case GS2_INVENTORY_INVENTORY_MODEL;
    case GS2_INVENTORY_ITEM_MODEL;
    case GS2_INVENTORY_SIMPLE_INVENTORY_MODEL;
    case GS2_INVENTORY_SIMPLE_ITEM_MODEL;
    case GS2_LIMIT_COUNTER;
    case GS2_LIMIT_LIMIT_MODEL;
    case GS2_LOGIN_REWARD_BONUS_MODEL;
    case GS2_MISSION_MISSION_TASK_MODEL;
    case GS2_MONEY2_WALLET;
    case GS2_MONEY_WALLET;
    case GS2_QUEST_QUEST_MODEL;
    case GS2_SHOWCASE_DISPLAY_ITEM;
    case GS2_SHOWCASE_RANDOM_DISPLAY_ITEM_MODEL;
    case GS2_SKILL_TREE_NODE_MODEL;
    case GS2_STAMINA_STAMINA;
    case GS2_STAMINA_STAMINA_MODEL;

    public function toString(): String {
        switch ($this) {
            case self::GS2_EXCHANGE_INCREMENTAL_RATE_MODEL:
                return "Gs2Exchange:IncrementalRateModel";
            case self::GS2_EXCHANGE_RATE_MODEL:
                return "Gs2Exchange:RateModel";
            case self::GS2_EXPERIENCE_EXPERIENCE_MODEL:
                return "Gs2Experience:ExperienceModel";
            case self::GS2_EXPERIENCE_STATUS:
                return "Gs2Experience:Status";
            case self::GS2_FORMATION_MOLD:
                return "Gs2Formation:Mold";
            case self::GS2_IDLE_CATEGORY_MODEL:
                return "Gs2Idle:CategoryModel";
            case self::GS2_IDLE_STATUS:
                return "Gs2Idle:Status";
            case self::GS2_INVENTORY_BIG_INVENTORY_MODEL:
                return "Gs2Inventory:BigInventoryModel";
            case self::GS2_INVENTORY_BIG_ITEM_MODEL:
                return "Gs2Inventory:BigItemModel";
            case self::GS2_INVENTORY_INVENTORY:
                return "Gs2Inventory:Inventory";
            case self::GS2_INVENTORY_INVENTORY_MODEL:
                return "Gs2Inventory:InventoryModel";
            case self::GS2_INVENTORY_ITEM_MODEL:
                return "Gs2Inventory:ItemModel";
            case self::GS2_INVENTORY_SIMPLE_INVENTORY_MODEL:
                return "Gs2Inventory:SimpleInventoryModel";
            case self::GS2_INVENTORY_SIMPLE_ITEM_MODEL:
                return "Gs2Inventory:SimpleItemModel";
            case self::GS2_LIMIT_COUNTER:
                return "Gs2Limit:Counter";
            case self::GS2_LIMIT_LIMIT_MODEL:
                return "Gs2Limit:LimitModel";
            case self::GS2_LOGIN_REWARD_BONUS_MODEL:
                return "Gs2LoginReward:BonusModel";
            case self::GS2_MISSION_MISSION_TASK_MODEL:
                return "Gs2Mission:MissionTaskModel";
            case self::GS2_MONEY2_WALLET:
                return "Gs2Money2:Wallet";
            case self::GS2_MONEY_WALLET:
                return "Gs2Money:Wallet";
            case self::GS2_QUEST_QUEST_MODEL:
                return "Gs2Quest:QuestModel";
            case self::GS2_SHOWCASE_DISPLAY_ITEM:
                return "Gs2Showcase:DisplayItem";
            case self::GS2_SHOWCASE_RANDOM_DISPLAY_ITEM_MODEL:
                return "Gs2Showcase:RandomDisplayItemModel";
            case self::GS2_SKILL_TREE_NODE_MODEL:
                return "Gs2SkillTree:NodeModel";
            case self::GS2_STAMINA_STAMINA:
                return "Gs2Stamina:Stamina";
            case self::GS2_STAMINA_STAMINA_MODEL:
                return "Gs2Stamina:StaminaModel";
        }
        return "unknown";
    }
}
