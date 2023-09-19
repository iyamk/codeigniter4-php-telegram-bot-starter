<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;

class StartCommand extends SystemCommand
{
    protected $name = 'start';
    protected $description = 'Start command';
    protected $usage = '/start';
    protected $private_only = true;

    public function execute(): ServerResponse
    {

        $deep_linking_parameter = $this->getMessage()->getText(true);

        $message = $this->getMessage();
        $user_id = $message->getFrom()->getId();
        $first_name = $message->getFrom()->getFirstName();
        $last_name = $message->getFrom()->getLastName();

        return $this->replyToChat("<b>Welcome, $first_name!</b>", [
            'parse_mode' => 'html'
        ]);
    }
}