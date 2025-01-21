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

namespace Gs2Cdk\Distributor\Model\Enum;


enum BatchRequestPayloadService {
    case ACCOUNT;
    case AD_REWARD;
    case AUTH;
    case BUFF;
    case CHAT;
    case DATASTORE;
    case DEPLOY;
    case DICTIONARY;
    case DISTRIBUTOR;
    case ENCHANT;
    case ENHANCE;
    case EXCHANGE;
    case EXPERIENCE;
    case FORMATION;
    case FRIEND;
    case GATEWAY;
    case GRADE;
    case GUARD;
    case GUILD;
    case IDENTIFIER;
    case IDLE;
    case INBOX;
    case INVENTORY;
    case JOB_QUEUE;
    case KEY;
    case LIMIT;
    case LOCK;
    case LOG;
    case LOGIN_REWARD;
    case LOTTERY;
    case MATCHMAKING;
    case MEGA_FIELD;
    case MISSION;
    case MONEY;
    case MONEY2;
    case NEWS;
    case QUEST;
    case RANKING;
    case RANKING2;
    case REALTIME;
    case SCHEDULE;
    case SCRIPT;
    case SEASON_RATING;
    case SERIAL_KEY;
    case SHOWCASE;
    case SKILL_TREE;
    case STAMINA;
    case STATE_MACHINE;
    case VERSION;

    public function toString(): String {
        switch ($this) {
            case self::ACCOUNT:
                return "account";
            case self::AD_REWARD:
                return "adReward";
            case self::AUTH:
                return "auth";
            case self::BUFF:
                return "buff";
            case self::CHAT:
                return "chat";
            case self::DATASTORE:
                return "datastore";
            case self::DEPLOY:
                return "deploy";
            case self::DICTIONARY:
                return "dictionary";
            case self::DISTRIBUTOR:
                return "distributor";
            case self::ENCHANT:
                return "enchant";
            case self::ENHANCE:
                return "enhance";
            case self::EXCHANGE:
                return "exchange";
            case self::EXPERIENCE:
                return "experience";
            case self::FORMATION:
                return "formation";
            case self::FRIEND:
                return "friend";
            case self::GATEWAY:
                return "gateway";
            case self::GRADE:
                return "grade";
            case self::GUARD:
                return "guard";
            case self::GUILD:
                return "guild";
            case self::IDENTIFIER:
                return "identifier";
            case self::IDLE:
                return "idle";
            case self::INBOX:
                return "inbox";
            case self::INVENTORY:
                return "inventory";
            case self::JOB_QUEUE:
                return "jobQueue";
            case self::KEY:
                return "key";
            case self::LIMIT:
                return "limit";
            case self::LOCK:
                return "lock";
            case self::LOG:
                return "log";
            case self::LOGIN_REWARD:
                return "loginReward";
            case self::LOTTERY:
                return "lottery";
            case self::MATCHMAKING:
                return "matchmaking";
            case self::MEGA_FIELD:
                return "megaField";
            case self::MISSION:
                return "mission";
            case self::MONEY:
                return "money";
            case self::MONEY2:
                return "money2";
            case self::NEWS:
                return "news";
            case self::QUEST:
                return "quest";
            case self::RANKING:
                return "ranking";
            case self::RANKING2:
                return "ranking2";
            case self::REALTIME:
                return "realtime";
            case self::SCHEDULE:
                return "schedule";
            case self::SCRIPT:
                return "script";
            case self::SEASON_RATING:
                return "seasonRating";
            case self::SERIAL_KEY:
                return "serialKey";
            case self::SHOWCASE:
                return "showcase";
            case self::SKILL_TREE:
                return "skillTree";
            case self::STAMINA:
                return "stamina";
            case self::STATE_MACHINE:
                return "stateMachine";
            case self::VERSION:
                return "version";
        }
        return "unknown";
    }
}
