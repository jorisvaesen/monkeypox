<?php
namespace App;

use App\Command\JsonCommand;
use Cake\Core\ConsoleApplicationInterface;
use Cake\Console\CommandCollection;

class Application implements ConsoleApplicationInterface
{
    /**
     * Load all the application configuration and bootstrap logic.
     *
     * @return void
     */
    public function bootstrap(): void
    {

    }


    /**
     * Define the console commands for an application.
     *
     * @param \Cake\Console\CommandCollection $commands The CommandCollection to add commands into.
     * @return \Cake\Console\CommandCollection The updated collection.
     */
    public function console(CommandCollection $commands): CommandCollection
    {
        $commands->add('json', JsonCommand::class);

        return $commands;
    }
}