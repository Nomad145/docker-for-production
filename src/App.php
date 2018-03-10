<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Slack\SlackDriver;
use Dotenv\Dotenv;

namespace DockerForProduction;

/**
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class App
{
    public static function start() : void
    {
        $this->loadEnvironment();

        DriverManager::loadDriver(SlackDriver::class);

        $config = [
            'slack' => [
                'token' => getenv('SLACK_TOKEN')
            ]
        ];

        BotManFactory::create($config);
    }

    private static function loadEnvironment()
    {
        $dotenv = new Dotenv(__DIR__);
        $dotenv->load();
    }
}
