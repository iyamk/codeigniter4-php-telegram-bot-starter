<?php

namespace App\Controllers;

class Bot extends BaseController
{
    public function hook()
    {
        try {
            $telegram = new \Longman\TelegramBot\Telegram(getenv('bot_api_key'), getenv('bot_username'));

            $telegram->addCommandsPaths([
                APPPATH.'/BotCommands'
            ]);

            $telegram->useGetUpdatesWithoutDatabase();

            if (is_cli())
                $telegram->handleGetUpdates();
            else
                $telegram->handle();
        }
        catch (\Longman\TelegramBot\Exception\TelegramException $e)
        {
            _log($e->getMessage());
        }
        return '';
    }

    public function set()
    {
        try {
            $telegram = new \Longman\TelegramBot\Telegram(getenv('bot_api_key'), getenv('bot_username'));

            $hook_url = getenv('app.baseURL').'bot_hook';

            $options = [];
            if (getenv('self_signed_certificate') == 1)
                $options['certificate'] = ROOTPATH.'/crt/certificate.crt';

            $result = $telegram->setWebhook($hook_url, $options);

            if ($result->isOk()) {
                echo $result->getDescription();
            }
            else
                echo 'Error';
        } catch (\Longman\TelegramBot\Exception\TelegramException $e) {
            _log($e->getMessage());
        }
    }

    public function unset()
    {
        try {
            $telegram = new \Longman\TelegramBot\Telegram(getenv('bot_api_key'), getenv('bot_username'));

            $result = $telegram->deleteWebhook();

            echo $result->getDescription();
        } catch (\Longman\TelegramBot\Exception\TelegramException $e) {
            _log($e->getMessage());
        }
    }
}