<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Request;

class CallbackqueryCommand extends SystemCommand
{
    public function execute(): ServerResponse
    {
        $callback_query = $this->getCallbackQuery();
        $callback_data  = $callback_query->getData();
        $chat_id = $callback_query->getMessage()->getChat()->getId();
        $message_id = $callback_query->getMessage()->getMessageId();
        $user_id = $callback_query->getFrom()->getId();

        if ($callback_data == 'test')
        {
            return $callback_query->answer([
                'text' => 'testing',
                'show_alert' => true
            ]);
        }

        return Request::emptyResponse();
    }
}