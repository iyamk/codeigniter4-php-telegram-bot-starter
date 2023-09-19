<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Request;

class GenericmessageCommand extends SystemCommand
{
    protected $name = 'genericmessage';
    protected $description = 'Handle generic message';
    protected $version = '1.0.0';

    public function execute(): ServerResponse
    {
        $message = $this->getMessage();
        $message_text = $message->getText(true);
        if (is_null($message_text)) return Request::emptyResponse();
        $user_id = $message->getFrom()->getId();

        // Text commands
        if ($message_text == 'Hi')
        {
            return Request::sendMessage([
                'chat_id' => $user_id,
                'text' => 'Hello!'
            ]);
        }

        return Request::emptyResponse();
    }
}