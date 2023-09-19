<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;

class GenericCommand extends SystemCommand
{
    public function execute(): ServerResponse
    {
        $message = $this->getMessage();

        if (!is_null($this->getMyChatMember()))
        {
            $user_id = $this->getMyChatMember()->getChat()->getId();
            $status = $this->getMyChatMember()->getNewChatMember()->getStatus();
            if ($status == 'kicked')
                _log("user $user_id block bot", 'bot');
            else
                _log("user $user_id start bot", 'bot');
        }

        if (is_null($message)) return Request::emptyResponse();
        $user_id = $message->getFrom()->getId();
        $command = $message->getCommand();

        if (stripos($command, 'test') === 0)
        {
            return $this->replyToChat('Ok');
        }

        return Request::emptyResponse();
    }
}
