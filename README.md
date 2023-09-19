# codeigniter4-php-telegram-bot-starter
This is a template straight from India to easily launch a Telegram bot with Codeigniter4

## How to install it

Use composer:
```
composer create-project iyamk/codeigniter4-php-telegram-bot-starter bot
```

## How to set it up

Open the .env file and change bot_api_key and bot_username there to your bot key and bot nickname
Also change app.baseURL to link to your site

Now upload all files to your hosting

Then go to the site and connect the webhook using the address: [YOUR_SITE]/bot_set

You will see a message that everything is successful

Now test the bot, run it and enter Hi

## Run via longpoll

Run longpool.sh from the project folder

This will run longpool with a frequency of 1 time per second without mysql

## Details

This template is designed for secure deployment of an apache server; if you install on nginx, then configure it yourself

This package costs $10, but I am giving it to you for free, so use it and read Sri Ramana